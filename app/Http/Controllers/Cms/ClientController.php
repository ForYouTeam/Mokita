<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Interfaces\ClientRepoInterfaces;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private ClientRepoInterfaces $clientrepo;
    public function __construct(ClientRepoInterfaces $clientrepo)
    {
        $this->clientrepo = $clientrepo;
    }

    public function getAllData()
    {
        $client = $this->clientrepo->getAllClient();
        return response()->json($client, $client['code']);
    }

    public function getDataById($id)
    {
        $client = $this->clientrepo->getClientById($id);
        return response()->json($client, $client['code']);
    }

    public function upsertData(ClientRequest $request)
    {
        $client_id = $request->id | null;
        $data = $request->all();
        $data['updated_at'] = Carbon::now();
        $client = $this->clientrepo->upsertClient($client_id, $data);

        return response()->json($client, $client['code']);
    }
}
