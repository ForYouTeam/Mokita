<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnakRequest;
use App\Interfaces\AnakRepoInterfaces;
use App\Interfaces\DetailAnakRepoInterfaces;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    private AnakRepoInterfaces $anakrepo;
    private DetailAnakRepoInterfaces $detailrepo;
    
    public function __construct(AnakRepoInterfaces $anakrepo, DetailAnakRepoInterfaces $detailrepo)
    {
        $this->anakrepo = $anakrepo;
        $this->detailrepo = $detailrepo;
    }

    public function getAllData()
    {
        $anak = $this->detailrepo->getAllDetailAnak();
        foreach ($anak['data'] as $key => $value) {
            $data = $this->anakrepo->getAllAnak($value->id);
            $anak['data'][$key]['anak'] = $data['data'];
        }

        return response()->json($anak, $anak['code']);
    }

    public function upsertData(AnakRequest $request)
    {
        
    }
}
