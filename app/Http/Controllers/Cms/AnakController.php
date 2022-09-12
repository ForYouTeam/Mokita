<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnakRequest;
use App\Interfaces\AnakRepoInterfaces;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    private AnakRepoInterfaces $anakrepo;
    
    public function __construct(AnakRepoInterfaces $anakrepo)
    {
        $this->anakrepo = $anakrepo;
    }

    public function getAllData($id_detail)
    {
        $anak = $this->anakrepo->getAllAnak($id_detail);
        return response()->json($anak, $anak['code']);
    }

    public function upsertData(AnakRequest $request)
    {
       
    }
}
