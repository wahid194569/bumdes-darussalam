<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;


    // // bedanya fill dan guard
    // // yang boleh diisi secara massal
    // protected $fillable = [
    //     'id_admin',
    //     'nama',
    //     'email',
    //     'password'
    // ];

    //  // yang tidak boleh diisi secara massal
    protected $guarded = ['id_admin'];
}
