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
        
    }

    public function upsertDetailAnak($detail_anak_id, array $newDetail)
    {
        
    }

    public function deleteDetailAnak($detail_anak_id)
    {
        
    }
}