<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function account()
    {
        $model = new UserModel();
        $data = [
            'title' => 'Account | SEA Cinema',
            'user' => $model->find(session()->get('id')),
            'movie' => $this->history(session()->get('id')),
        ];
        // dd($data['movie']);

        return view('account', $data);
    }

    public function topup()
    {
        $model = new UserModel();
        $id = session()->get('id');
        $data = $model->find($id);
        $amount = $this->request->getPost('topup');
        $balance = $data['balance'];
        $balance_now = ['balance' => $balance + $amount];
        $model->update($id, $balance_now);
        return redirect()->back()->with('success', 'Top up successful!');
    }

    public function withdraw()
    {
        $model = new UserModel();
        $id = session()->get('id');
        $data = $model->find($id);
        $amount = $this->request->getPost('withdraw');
        $balance = $data['balance'];
        $balance_now = ['balance' => $balance - $amount];
        $model->update($id, $balance_now);
        return redirect()->back()->with('success', 'Withdrawal successful!');
    }

    public function history($id, $status = 'on')
    {
        $model = new UserModel();
        $historyModel = new HistoryModel();
        $data = $model->db->table('history')->join('user', 'user.id=history.user_id')->join('film', 'film.id=history.movie_id')->where('user_id', $id)->orderBy('date', 'DESC')->get()->getResultArray();
        $no = 0;
        foreach ($data as $key) {
            $user_id = $key['user_id'];
            $movie_id = $key['movie_id'];
            $seat_number = $key['seat_number'];
            $data[$no]['history_id'] = $historyModel->where([
                'user_id' => $user_id,
                'movie_id' => $movie_id,
                'seat_number' => $seat_number
            ])->first()['history_id'];
            $no++;
        }
        return $data;
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[6]|max_length[50]|alpha_numeric|is_exist[user.username]',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[username,password]',
            ];

            $errors = [
                'username' => [
                    'is_exist' => "Username doesn't exist",
                ],
                'password' => [
                    'validateUser' => "Username or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                session()->setFlashdata('error_login', $this->validator->getErrors());
                return redirect()->to('login')->withInput();
            }
            $model = new UserModel();

            $user = $model->where('username', $this->request->getVar('username'))->first();

            $this->setUserSession($user);
            return redirect()->back();
        }
        return view('login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'birthdate' => $user['birthdate'],
            'username' => $user['username'],
            'isLoggedIn' => true,
        ];
        $data['user_age'] = date_diff(date_create($data['birthdate']), date_create('now'))->y;

        session()->set($data);
        return true;
    }

    public function register()
    {
        $model = new UserModel();
        $data = [
            'title' => 'Sign up',
        ];

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'name' => 'required|min_length[2]|max_length[255]',
                'username' => 'required|min_length[5]|max_length[255]|alpha_numeric|is_unique[user.username]',
                'birthdate' => 'required|valid_date[Y-m-d]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata('error_register', $this->validator->getErrors());
                return redirect()->to('register')->withInput();
            }

            $newData = $this->request->getPost();
            $newData['password'] = password_hash($newData['password'], PASSWORD_DEFAULT);
            $insert = $model->insert($newData);
            $newData['id'] = $insert;
            $this->setUserSession($newData);
            return redirect()->back();
        }
        return view('register', $data);
    }

    public function profile()
    {
        $data = [];
        $model = new UserModel();

        $data['user'] = $model->where('id', session()->get('id'))->first();
        return view('profile', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
