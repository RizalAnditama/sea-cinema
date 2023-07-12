<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\MovieModel;
use App\Models\UserModel;

class MovieController extends BaseController
{
    public function cancel($history_id)
    {
        $model = new HistoryModel();
        $userModel = new UserModel();
        $data = $model->where('history_id', $history_id)->join('user', 'user.id=history.user_id')->join('film', 'film.id=history.movie_id')->first();

        $cancel = $model->db->table('history')->update(['status' => 'cancel'], ['history_id' => $history_id]);
        if ($cancel) {
            $balance = $data['balance'];
            $refund = $data['ticket_price'];

            $total = ['balance' => $balance + $refund];
            $userModel->update($data['user_id'], $total);
        }
        return redirect()->back()->with('success', "1 ticket cancelled succesfully");
    }

    public function test()
    {
        if (session()->get('selected')) {
            $selected = session()->get('selected');
            if (count(array_filter(explode(',', $selected))) == session()->get('seat')) {
                return redirect()->to('receipt');
            }
        }

        $booked = $this->getSeat(10);
        $data = [
            'title' => 'Book | SEA Cinema',
            'booked' => array_column($booked, 'seat_number'),
        ];

        return view('test', $data);
    }

    public function book($name)
    {
        $model = new MovieModel();
        $data = $model->where('name', $name)->first();
        $movie_id = $data['id'];
        if (session()->get('isLoggedIn') && session()->get('user_age') < $data['age_rating']) {
            return redirect()->back()->with('validation', "You're not old enough for this movie (check age rating)");
        }
        $booked = $this->getSeat($movie_id);
        $data = [
            'title' => 'Book | SEA Cinema',
            'booked' => array_column($booked, 'seat_number'),
        ];

        if (count($data['booked']) == 64) {
            return redirect()->back()->with('validation', "Sorry, we're out of seat!");
        }

        session()->remove(['book', 'seat', 'movie_name', 'movie_id', 'selected']);
        session()->set([
            'movie_name' => $name,
            'movie_id' => $movie_id
        ]);

        return view('book', $data);
    }

    public function seat($seat_id = null)
    {
        if (session()->get('selected')) {
            $selected = session()->get('selected');
            if (count(array_filter(explode(',', $selected))) == session()->get('seat')) {
                return redirect()->to('receipt');
            }
        } else {
            $selected = '';
        }

        if (isset($seat_id)) {
            if (!session()->get('selected')) {
                session()->set('selected', "$seat_id,");
            } else {
                $lalu = session()->get('selected');
                session()->set('selected', "$lalu,$seat_id");
            }

            return redirect()->back();
        }

        if (!session()->get('seat') && $this->request->getMethod('post')) {
            $seat = $_POST['seat'];
            session()->set('seat', $seat);
        }

        $booked = $this->getSeat(session()->get('movie_id'));
        $data = [
            'title' => 'Pick seats | SEA Cinema',
            'selected' => array_filter(explode(',', $selected)),
            'booked' => array_column($booked, 'seat_number'),
            'seat' => session()->get('seat') ?? '',
        ];

        return view('seat', $data);
    }
    // {
    //     d(session()->get('seat'));
    //     if ($this->request->getMethod('post')) {
    //         $seat = $this->request->getPost('seat');
    //         session()->set('seat', $seat);
    //     }
    //     d(session()->get('seat'));

    //     if (session()->get('selected')) {
    //         $selected = session()->get('selected');
    //         if (count(array_filter(explode(',', $selected))) == session()->get('seat')) {
    //             return redirect()->to('receipt');
    //         }
    //     }
    //     d(session()->get('seat'));

    //     if (isset($seat_id)) {
    //         // $seat = session()->get('seat');
    //         if (!session()->get('selected')) {
    //             session()->set('selected', "$seat_id,");
    //             d('a');
    //         } else {
    //             $lalu = session()->get('selected');
    //             session()->set('selected', "$lalu,$seat_id");
    //             d('b');
    //         }

    //         return redirect()->back();
    //     }

    //     $booked = $this->getSeat(session()->get('movie_id'));

    //     $data = [
    //         'title' => 'Pick seats | SEA Cinema',
    //         'booked' => array_column($booked, 'seat_number'),
    //     ];
    //     return view('seat', $data);
    // }

    public function receipt()
    {
        // dd(session()->get('id'));
        $model = new MovieModel();
        $userModel = new UserModel();
        $selected = array_filter(explode(',', session()->get('selected')));

        $data = [
            'title' => 'Receipt | ' . session()->get('movie_name'),
            'data' => $model->getFilm(session()->get('movie_name'))[0],
            'selected' => $selected,
            'userData' => $userModel->find(session()->get('id')),
        ];

        $total = $data['data']['ticket_price'] * count($selected);
        $data['total'] = $total;
        // dd($data['userData']['balance'] < $total);

        return view('receipt', $data);
    }

    public function pay()
    {
        $model = new HistoryModel();
        $userModel = new UserModel();
        $userData = $userModel->find(session()->get('id'));

        $selected = explode(',', $_POST['selected']);
        $total = $_POST['total'];
        foreach ($selected as $key) {
            $data = [
                'movie_id' => session()->get('movie_id'),
                'user_id' => session()->get('id'),
                'seat_number' => $key,
                'status' => 'on',
                'date' => date('Y-m-d H:i:s'),
            ];
            if (!$model->insert($data)) {
                return redirect()->back()->with('validation', 'Something went wrong, try again later');
            }
        }
        if (!$userModel->update(session()->get('id'), ['balance' => $userData['balance'] - $total])) {
            return redirect()->back()->with('validation', 'Something went wrong, try again later');
        }

        return redirect()->to('explore/' . session()->get('movie_name'))->with('success', 'Payment successful');
    }

    public function getSeat($movie_id)
    {
        $model = new HistoryModel();
        // $available = $model->where('movie_id', $movie_id)->join('user', 'user.id=history.user_id')->join('film', 'film.id=history.movie_id')->where("status!='on'")->findAll();
        $booked = $model->where('movie_id', $movie_id)->join('user', 'user.id=history.user_id')->join('film', 'film.id=history.movie_id')->where("status!='cancel'")->findAll();

        return $booked;
    }
}
