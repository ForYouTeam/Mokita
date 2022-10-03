<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnakRequest;
use App\Http\Requests\DetailAnakRequest;
use App\Interfaces\AnakRepoInterfaces;
use App\Interfaces\DetailAnakRepoInterfaces;
use Carbon\Carbon;
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

    public function getAllAnakData($id_detail)
    {
        $anak = $this->anakrepo->getAllAnak($id_detail);
        return response()->json($anak, $anak['code']);
    }

    public function getAllDataDetail()
    {
        $anak = $this->detailrepo->getAllDetailAnak();
        foreach ($anak['data'] as $key => $value) {
            $data = $this->anakrepo->getAllAnak($value->id);
            $anak['data'][$key]['anak'] = $data['data'];
        }

        return response()->json($anak, $anak['code']);
    }

    public function getDataByIdAnak($id)
    {
        $anak = $this->anakrepo->getAnakById($id);
        return response()->json($anak, $anak['code']);
    }

    public function getDataByIdDetail($id)
    {
        $detail = $this->detailrepo->getDetailAnakById($id);
        return response()->json($detail, $detail['code']);
    }

    public function upsertDataAnak(AnakRequest $request)
    {
        $date = Carbon::now();
        $idAnak = $request->id | null;

        $dataAnak = $request->only(['id_detail_anak', 'nama', 'tempat_lahir', 'tgl_lahir']);
        $dataAnak['updated_at'] = $date;

        $anak = $this->anakrepo->upsertAnak($idAnak, $dataAnak);

        return response()->json($anak, $anak['code']);
    }

    public function upsertDataDetail(DetailAnakRequest $request)
    {
        $date = Carbon::now();
        $idDetail = $request->id | null;
        
        $dataDetail = $request->only(['hak_asuh']);
        $dataDetail['updated_at'] = $date;

        $detail = $this->detailrepo->upsertDetailAnak($idDetail, $dataDetail);

        return response()->json($detail, $detail['code']);
    }

    public function deleteDataAnak($id)
    {
        $anak = $this->anakrepo->deleteAnak($id);
        return response()->json($anak, $anak['code']);
    }

    public function deleteDataDetail($id)
    {
        $detail = $this->detailrepo->deleteDetailAnak($id);
        return response()->json($detail, $detail['code']);
    }
}
