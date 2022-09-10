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
        
    }

    public function upsertHakim($hakim_id, array $newDetail)
    {
        
    }

    public function deleteHakim($hakim_id)
    {
        
    }
}