<?php

namespace App\Controllers;

use App\Models\HomeModel;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SEA Cinema",
            'data' => $this->getFilm('limit', 6),
            'popular' => $this->getFilm([1, 2, 3, 4, 5, 10]),
        ];
        // dd($data['data']);
        return view('home', $data);
    }

    public function explore()
    {
        $data = [
            'title' => "Explore|SEA Cinema",
            'data' => $this->getFilm(),
            'popular' => $this->getFilm([1, 2, 3, 4, 5, 10]),
        ];
        // dd($data['data']);
        return view('explore', $data);
    }

    public function getFilm($id = 'full', $limit = null)
    {
        $model = new HomeModel();

        if (is_array($id)) {
            return $model->db->table('film')->whereIn('id', $id)->get()->getResultArray();
        }
        if ($id === 'limit') {
            return $model->db->table('film')->limit($limit)->get()->getResultArray();
        }

        return $model->findAll();
    }
}
