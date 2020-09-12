<?php

use App\Guru;
use App\Siswa;

function rangking5Besar(){
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s ->rataRataNilai = $s->rataRataNilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);

    return $siswa;
}

function totalSiswa()
{   
    return Siswa::count();
}

function totalGuru()
{   
    return Guru::count();
}