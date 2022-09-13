<?php

namespace App\Interfaces;

interface PerkaraRepoInterfaces
{
    public function getAllPerkara();
    public function getPerkaraById($perkara_id);
    public function upsertPerkara($perkara_id, array $newDetail);
    public function deletePerkara($perkara_id);
}