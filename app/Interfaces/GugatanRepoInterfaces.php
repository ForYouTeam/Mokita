<?php

namespace App\Interfaces;

interface GugatanRepoInterfaces 
{
    public function getAllGugatan();
    public function getGugatanById($gugatan_id);
    public function upsertGugatan($gugatan_id, array $newDetail);
    public function deleteGugatan($gugatan_id);
}