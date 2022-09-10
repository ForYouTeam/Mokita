<?php

namespace App\Interfaces;

interface ClientRepoInterfaces {
    public function getAllClient();
    public function getClientById($client_id);
    public function upsertClient($client_id, array $new_detail);
    public function deleteClient($client_id);
}