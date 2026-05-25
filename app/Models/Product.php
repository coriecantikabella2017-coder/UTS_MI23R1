<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
//Click to create DevDb database connection For Eloquent actions
class Product extends Model
{
public $timestamps = false;

protected $fillable = [
'kode_barang',
'nama_barang',
'satuan',
'harga',
];
}