<?php

namespace App\Repositories;

use App\Interfaces\PerkaraRepoInterfaces;
use App\Models\PerkaraModel;

class PerkaraRepository implements PerkaraRepoInterfaces
{
    public function getAllPerkara()
    {
        $data = new PerkaraModel;
        try {
            $perkara = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'sucess to get data',
                'data' => $data->all()
            );
        } catch (\Throwable $th) {
            $perkara = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }   

        return $perkara;
    }

    public function getPerkaraById($perkara_id)
    {
        
    }

    public function upsertPerkara($perkara_id, array $newDetail)
    {
        
    }

    public function deletePerkara($perkara_id)
    {
        
    }
}