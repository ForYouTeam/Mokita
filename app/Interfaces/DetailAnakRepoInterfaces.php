<?php

namespace App\Interfaces;

interface DetailAnakRepoInterfaces {
    public function getAllDetailAnak();
    public function getDetailAnakById($detail_anak_id);
    public function upsertDetailAnak($detail_anak_id, array $newDetail);
    public function deleteDetailAnak($detail_anak_id);
}