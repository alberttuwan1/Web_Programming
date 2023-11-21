<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function create(Request $request) {
        
        $request->validate([
            'name' => 'required|min:3',
            'major' => 'required|in:Computer Science and Mathematics,Computer Science,Data Science,Visual Communication Design,Interior Design,Film',
            'GPA' => 'required|numeric|between:1.00,4.00|regex:/^\d\.\d\d$/'
        ]);

        $faculty = 'School of Computer Science';
        if(in_array($request->major, ['Visual Communication Design','Interior Design','Film'])){
            $faculty = 'School of Design';
        }

        DB::table('mahasiswas')->insert([
            'name' => $request->name,
            'major' => $request->major,
            'faculty' => $faculty,
            'DOB' => $request->DOB,
            'GPA' => $request->GPA
        ]);
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
