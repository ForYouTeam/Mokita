<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Interfaces\GugatanRepoInterfaces;
use Illuminate\Http\Request;

class GugatanController extends Controller
{
    private GugatanRepoInterfaces $gugatanRepo;

    public function __construct(GugatanRepoInterfaces $gugatanRepo)
    {
        $this->gugatanRepo= $gugatanRepo;
    }

    public function getAllData()
    {
        $gugatan = $this->gugatanRepo->getAllGugatan();
        return response()->json($gugatan, $gugatan['code']);
    }
}
