<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Makul;

class LaporanController extends Controller
{
    public function dosen()
    {
        $dosens = Dosen::all();
        return view('laporan.dosen', compact('dosens'));
    }

    public function makul()
    {
        $makuls = Makul::all();
        return view('laporan.makul', compact('makuls'));
    }
}
