<?php

namespace App\Repositories;

use App\Interfaces\GugatanRepoInterfaces;
use App\Models\GugatanModel;

class GugatanRepository implements GugatanRepoInterfaces
{
    public function getAllGugatan()
    {
        $data = new GugatanModel;
        try {
            $gugatan = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'success to get data',
                'data' => $data->all()
            );
        } catch (\Throwable $th) {
            $gugatan = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $gugatan;
    }

    public function getGugatanById($gugatan_id)
    {
        
    }

    public function upsertGugatan($gugatan_id, array $newDetail)
    {
        $data = new GugatanModel;
        try {
            $gugatan = array(
                'code' => 200,
                'message' => 'success to proccess data'
            );
            if (!$gugatan_id) {
                $data->create($newDetail);
            } else {
                $gugatan['data'] = $data->whereId($gugatan_id)->update($newDetail);
            }
        } catch (\Throwable $th) {
            $gugatan = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $gugatan;
    }

    public function deleteGugatan($gugatan_id)
    {
        
    }
}