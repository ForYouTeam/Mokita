<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\HakimRequest;
use App\Interfaces\HakimRepoInterfaces;
use App\Repositories\HakimRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HakimController extends Controller
{
    private HakimRepository $hakimrepo;
    public function __construct(HakimRepoInterfaces $hakimrepo)
    {
        $this->hakimrepo = $hakimrepo;
    }

    public function getAllData()
    {
        $hakim = $this->hakimrepo->getAllHakim();
        return response()->json($hakim, $hakim['code']);
    }

    public function getDataById($id)
    {
        $hakim = $this->hakimrepo->getHakimById($id);
        return response()->json($hakim, $hakim['code']);
    }

    public function upsertData(HakimRequest $request)
    {
        $hakim_id = $request->id | null;
        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $hakim = $this->hakimrepo->upsertHakim($hakim_id, $data);

        return response()->json($hakim, $hakim['code']);
    }

    public function deleteData($id)
    {
        $hakim = $this->hakimrepo->deleteHakim($id);
        return response()->json($hakim, $hakim['code']);
    }
}
