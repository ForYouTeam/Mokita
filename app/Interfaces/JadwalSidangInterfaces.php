<?php

namespace App\Interfaces;

interface JadwalSidangInterfaces {
    public function getAllJadwal();
    public function getJadwalById($jadwal_id);
    public function upsertJadwal($jadwal_id, array $newDetail);
    public function deleteJadwal($jadwal_id);
}