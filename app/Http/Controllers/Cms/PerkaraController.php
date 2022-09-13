<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerkaraRequest;
use App\Interfaces\PerkaraRepoInterfaces;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerkaraController extends Controller
{
    private PerkaraRepoInterfaces $perkararepo;

    public function __construct(PerkaraRepoInterfaces $perkararepo)
    {
        $this->perkararepo = $perkararepo;
    }

    public function getAllData()
    {
        $perkara = $this->perkararepo->getAllPerkara();
        return response()->json($perkara, $perkara['code']);
    }

    public function upsertData(PerkaraRequest $request)
    {
        $date = Carbon::now();
        $id = $request->id | null;
        $data = $request->only([
            'id_hakim', 'nama_pengacara', 'nama_penitra', 'id_gugatan',
            'status', 'id_jadwal_sidang'
        ]);
        $data['updated_at'] = $date;

        $perkara = $this->perkararepo->upsertPerkara($id, $data);
        return response()->json($perkara, $perkara['code']);
    }
}
