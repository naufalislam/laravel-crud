<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama','jenis_kelamin','agama','alamat','avatar','user_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai']);
        // error tambahi with timestatmp
    }

    public function rataRataNilai()
    {
        // ambil nilai
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            $total += $mapel->pivot->nilai;
            $hitung ++;
        }
        return round($total/$hitung);
    }
}
