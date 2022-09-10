<?php

namespace App\Repositories;

use App\Interfaces\JadwalSidangInterfaces;
use App\Models\JadwalSidangModel;

class JadwalSidangRepository implements JadwalSidangInterfaces
{
    public function getAllJadwal()
    {
        $data = new JadwalSidangModel();
        try {
            $jadwal = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'Success to get data',
                'data' => $data->all()
            );
        } catch (\Throwable $th) {
            $jadwal = array(
                'code' => 500,
                'message' => $th->getMessage(),
            );
        }

        return $jadwal;
    }

    public function getJadwalById($jadwal_id)
    {
        
    }

    public function upsertJadwal($jadwal_id, array $newDetail)
    {
        
    }

    public function deleteJadwal($jadwal_id)
    {
        
    }
}