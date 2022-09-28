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
                'data' => $data->whereId($client_id)->first()
            );
        } catch (\Throwable $th) {
            $client = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $client;
    }

    public function upsertClient($client_id, array $new_detail)
    {
        $data = new ClientModel;
        try {
            $client = array(
                'code' => 200,
                'message' => 'Success to proccess data',
            );
            if ($client_id) {
                $data->whereId($client_id)->update($new_detail);
            } else {
                $data->create($new_detail);
            }
            
        } catch (\Throwable $th) {
            $client = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $client;
    }

    public function deleteClient($client_id)
    {
        $data = new ClientModel;
        try {
            $data->whereId($client_id)->delete();
            $client = array(
                'code' => 200,
                'message' => 'Success to delete data',
            );
        } catch (\Throwable $th) {
            $client = array(
                'code' => 500,
                'message' => $th->getMessage()
            );
        }

        return $client;
    }
}