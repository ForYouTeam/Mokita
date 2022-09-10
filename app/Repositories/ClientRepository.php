<?php

namespace App\Repositories;

use App\Interfaces\ClientRepoInterfaces;
use App\Models\ClientModel;

class ClientRepository implements ClientRepoInterfaces {
    public function getAllClient()
    {
        $data = new ClientModel;
        try {
            $client = array(
                'code' => 200,
                'count' => $data->count(),
                'message' => 'Success to get data',
                'data' => $data->all()
            );
        } catch (\Throwable $th) {
            $client = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        } 
        
        return $client;
    }

    public function getClientById($client_id)
    {
        $data = new ClientModel;
        try {
            $client = array(
                'code' => 200,
                'message' => 'Success to get data',
                'data' => $data->whereId($client_id)->get()
            );
        } catch (\Throwable $th) {
            $client = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $client;
    }

    public function upsertClient(array $new_detail)
    {
        
    }

    public function deleteClient($client_id)
    {
        
    }
}