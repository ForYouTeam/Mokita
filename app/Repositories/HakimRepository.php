<?php

namespace App\Repositories;

use App\Interfaces\HakimRepoInterfaces;
use App\Models\HakimModel;

class HakimRepository implements HakimRepoInterfaces
{
    public function getAllHakim()
    {
        try {
            $data = new HakimModel;
            $hakim = array(
                'code' => 200,
                'total' => $data->count(),
                'message' => 'success to get data',
                'data' => $data->all(),
            );
        } catch (\Throwable $th) {
            $hakim = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $hakim;
    }

    public function getHakimById($hakim_id)
    {
        $data = new HakimModel;
        try {
            $hakim = array(
                'code' => 200,
                'message' => 'success to get data',
                'data' => $data->whereId($hakim_id)->get(),
            );
        } catch (\Throwable $th) {
            $hakim = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $hakim;
    }

    public function upsertHakim($hakim_id, array $newDetail)
    {
        $data = new HakimModel;
        try {
            $hakim = array(
                'code' => 200,
                'message' => 'success to proccess data',
            );
            if ($hakim_id) {
                $data->whereId($hakim_id)->update($newDetail);
            } else {
                $data->create($newDetail);
            }
        } catch (\Throwable $th) {
            $hakim = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $hakim;
    }

    public function deleteHakim($hakim_id)
    {
        $data = new HakimModel;
        try {
            $data->whereId($hakim_id)->delete();
            $hakim = array(
                'code' => 200,
                'message' => 'success deleting data'
            );
        } catch (\Throwable $th) {
            $hakim = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $hakim;
    }
}