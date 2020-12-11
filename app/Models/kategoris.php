<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoris extends Model
{
    use HasFactory;
    protected $guarded = ['idkat','created_at','updated_at'];
    public $table = "kategori";
}
