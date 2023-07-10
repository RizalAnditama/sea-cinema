<?php

namespace App\Controllers;

use App\Models\HomeModel;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SEA Cinema",
            'data' => $this->getFilm(),
            'popular' => $this->getFilm([1, 2, 3, 4, 5, 10]),
        ];
        // dd($data['data']);
        return view('home', $data);
    }

    public function explore(string $movie_name = null)
    {
        $data = [
            'title' => 'Explore | SEA Cinema',
            'data' => $this->getFilm(),
            'popular' => $this->getFilm([1, 2, 3, 4, 5, 10]),
        ];

        if ($this->request->getGet('keyword')) {
            $this->search($this->request->getGet('keyword'));
        }

        if ($movie_name) {
            $data = [
                'title' => $movie_name . "|SEA Cinema",
                'data' => $this->getFilm($movie_name)[0],
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

    public function getFilm($id = 0, $limit = null)
    {
        $model = new HomeModel();

        if (is_array($id)) {
            return $model->db->table('film')->whereIn('id', $id)->get()->getResultArray();
        }
        if (is_string($id)) {
            return $model->db->table('film')->where('name', $id)->get()->getResultArray();
        }
        if ($limit) {
            return $model->db->table('film')->limit($limit)->get()->getResultArray();
        }

        return $model->findAll();
    }
}
