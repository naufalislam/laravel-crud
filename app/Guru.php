<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama','telpon','alamat'];

    public function mapel()
    {
        // fungsi many to one
        //  belong = dimiliki, has = memiliki
        return $this->hasMany(Mapel::class);
    }
}
