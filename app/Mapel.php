<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama','semester'];

    public function siswa()
    {
        // fungsi many to many
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function guru()
    {
        // has = memiliki, belong = di miliki
        return $this->belongsTo(Guru::class);
    }
}
