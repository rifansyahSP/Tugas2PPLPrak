<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;
    protected $fillable = ['nip', 'nama', 'email'];
    protected $table = 'crud';
    public $timestamps = false;
}
