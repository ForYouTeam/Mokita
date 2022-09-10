<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Interfaces\HakimRepoInterfaces;
use App\Repositories\HakimRepository;
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
}
