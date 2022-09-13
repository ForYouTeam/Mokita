<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Interfaces\PerkaraRepoInterfaces;
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
}
