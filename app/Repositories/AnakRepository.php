<?php

namespace App\Repositories;

use App\Interfaces\AnakRepoInterfaces;
use App\Models\AnakModel;

class AnakRepository implements AnakRepoInterfaces 
{    
    public function getAllAnak($id_detail)
    {
        $data = AnakModel::where('id_detail_anak', $id_detail);
        try {
            $anak = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'success to get data',
                'data' => $data->get()
            );
        } catch (\Throwable $th) {
            $anak = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $anak;
    }

    public function getAnakById($id_anak)
    {
        
    }

    public function upsertAnak($id_anak, array $newDetail)
    {
        
    }

    public function deleteAnak($id_anak)
    {
        
    }
}