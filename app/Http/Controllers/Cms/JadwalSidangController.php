<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Interfaces\JadwalSidangInterfaces;
use Illuminate\Http\Request;

class JadwalSidangController extends Controller
{
    private JadwalSidangInterfaces $jadwalrepo;
    public function __construct(JadwalSidangInterfaces $jadwalrepo)
    {
        $this->jadwalrepo = $jadwalrepo;
    }

    public function getAllData()
    {
        $jadwal = $this->jadwalrepo->getAllJadwal();
        return response()->json($jadwal, $jadwal['code']);
    }

    public function getDataById($id)
    {
        $jadwal = $this->jadwalrepo->getJadwalById($id);
        return response()->json($jadwal, $jadwal['code']);
    }
}
