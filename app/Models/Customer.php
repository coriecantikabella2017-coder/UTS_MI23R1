<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'telepon',
        'email'
    ];

    public function sales()
{
    return $this->hasMany(Sale::class);
}
}
