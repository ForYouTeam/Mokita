<?php

namespace App\Repositories;

use App\Interfaces\DetailAnakRepoInterfaces;
use App\Models\DetailAnakModel;

class DetailAnakRepository implements DetailAnakRepoInterfaces
{
    public function getAllDetailAnak()
    {
        $data = new DetailAnakModel;
        try {
            $detail = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'success to get data',
                'data' => $data->all()
            );
        } catch (\Throwable $th) {
            $detail = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $detail;
    }

    public function getDetailAnakById($detail_anak_id)
    {
        $data = new DetailAnakModel;
        try {
            $detail = array(
                'code' => 200,
                'message' => 'success to get data',
                'data' => $data->whereId($detail_anak_id)->get()
            );
        } catch (\Throwable $th) {
            $detail = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $detail;
    }

    public function upsertDetailAnak($detail_anak_id, array $newDetail)
    {
        $data = new DetailAnakModel;
        try {
            $detail = array(
                'code' => 200,
                'message' => 'success to proccess data'
            );
            if ($detail_anak_id) {
                $detail['data'] = $data->whereId($detail_anak_id)->update($newDetail);
            } else {
                $detail['data'] = $data->create($newDetail);
            }
    
        } catch (\Throwable $th) {
            $detail = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $detail;
    }

    public function deleteDetailAnak($detail_anak_id)
    {
        $data = new DetailAnakModel;
        try {
            $detail = array(
                'code' => 200,
                'message' => 'success to delete data',
                'data' => $data->whereId($detail_anak_id)->delete()
            );
        } catch (\Throwable $th) {
            $detail = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $detail;
    }
}