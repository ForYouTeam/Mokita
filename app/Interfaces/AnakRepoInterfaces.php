<?php

namespace App\Interfaces;

interface AnakRepoInterfaces {
    public function getAllAnak($id_detail);
    public function getAnakById($id_anak);
    public function upsertAnak($id_anak, array $newDetail);
    public function deleteAnak($id_anak);
}