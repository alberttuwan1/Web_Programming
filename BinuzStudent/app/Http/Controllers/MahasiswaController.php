<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function create() {

    }

    public function read() {
        $mahasiswa_read = Mahasiswa::simplePaginate(10);
        return view('read', compact('mahasiswa_read'));
    }

    public function delete(Request $request) {
        $mahasiswa_read = Mahasiswa::simplePaginate(10);
        return view('delete');
    }
}
