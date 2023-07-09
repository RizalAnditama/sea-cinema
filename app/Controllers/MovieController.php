<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\MovieModel;
use App\Models\UserModel;

class MovieController extends BaseController
{
    public function cancel($id)
    {
        $model = new HistoryModel();
        $userModel = new UserModel();
        $data = $model->where('history_id', $id)->join('user', 'user.id=history.user_id')->join('film', 'film.id=history.movie_id')->first();

        $cancel = $model->db->table('history')->update(['status' => 'cancel'], ['history_id' => $id]);
        if ($cancel) {
            $balance = $data['balance'];
            $refund = $data['ticket_price'];

            $total = ['balance' => $balance + $refund];
            $userModel->update($data['user_id'], $total);
        }
        return redirect()->back();
    }
}
