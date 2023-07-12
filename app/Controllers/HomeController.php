<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\MovieModel;

class HomeController extends BaseController
{
    public function test()
    {
        $data = [
            'title' => 'Testing site | SEA Cinema',
        ];

        return view('test', $data);
    }

    public function index()
    {
        $model = new MovieModel();
        $data = [
            'title' => "SEA Cinema",
            'data' => $model->getFilm(),
            'popular' => $model->getFilm([1, 2, 3, 4, 5, 10]),
        ];
        // dd($data['data']);
        return view('home', $data);
    }

    public function explore(string $movie_name = null)
    {
        $model = new MovieModel();
        $data = $model->where('name', $movie_name)->first();
        if (session()->get('isLoggedIn') && session()->get('user_age') < $data['age_rating']) {
            session()->setFlashdata('validation', "You're not old enough for this movie (check age rating)");
        }

        $data = [
            'title' => 'Explore | SEA Cinema',
            'data' => $model->getFilm(),
            'popular' => $model->getFilm([1, 2, 3, 4, 5, 10]),
        ];

        if ($this->request->getGet('keyword')) {
            $this->search($this->request->getGet('keyword'));
        }

        if ($movie_name) {
            $data = [
                'title' => $movie_name . "| SEA Cinema",
                'data' => $model->getFilm($movie_name)[0],
            ];
            // dd($data['data']);
            return view('exploreDetail', $data);
        }
        return view('explore', $data);
    }

    public function search($keyword)
    {
        $model = new HomeModel();
        $keys = explode(" ", $keyword);

        $sql = "SELECT * FROM film WHERE name LIKE '%$keyword%' ";

        foreach ($keys as $k) {
            $sql .= " OR name LIKE '%$k%' ";
        }
        // dd($sql);

        $data = [
            'title' => "'$keyword' | SEA Cinema",
            'data' => $model->db->query($sql)->getResultArray(),
            'popular' => [],
        ];
        // dd($data);
        return view('explore', $data);
    }
}
