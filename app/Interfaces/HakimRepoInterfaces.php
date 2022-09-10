<?php

namespace App\Interfaces;

interface HakimRepoInterfaces {
    public function getAllHakim();
    public function getHakimById($hakim_id);
    public function upsertHakim($hakim_id, array $newDetail);
    public function deleteHakim($hakim_id);
}