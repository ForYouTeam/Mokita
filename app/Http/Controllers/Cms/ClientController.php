<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Interfaces\ClientRepoInterfaces;
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
}
