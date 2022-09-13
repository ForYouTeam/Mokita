<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\GugatanRequest;
use App\Interfaces\GugatanRepoInterfaces;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GugatanController extends Controller
{
    private GugatanRepoInterfaces $gugatanRepo;

    public function __construct(GugatanRepoInterfaces $gugatanRepo)
    {
        $this->gugatanRepo= $gugatanRepo;
    }

    public function getAllData()
    {
        $gugatan = $this->gugatanRepo->getAllGugatan();
        return response()->json($gugatan, $gugatan['code']);
    }

    public function getDataById($id)
    {
        $gugatan = $this->gugatanRepo->getGugatanById($id);
        return response()->json($gugatan, $gugatan['code']);
    }

    public function upsertData(GugatanRequest $request)
    {
        $date = Carbon::now();
        $id = $request->id | null;

        $data = $request->only([
        'id_penggugat', 'id_tergugat', 'tgl_pernikahan', 'kecamatan',
        'kabupaten', 'no_akta_nikah', 'tinggal_1', 'tinggal_2', 'id_anak',
        'tgl_tidak_rukun', 'penyebab', 'puncak_konflik', 'lama_pisah',
        ]);
        $data['updated_at'] = $date;

        $gugatan = $this->gugatanRepo->upsertGugatan($id, $data);
        return response()->json($gugatan, $gugatan['code']);
    }
}
