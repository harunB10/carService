<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServisKorisnik extends Model
{
    protected $fillable = [
        'ocjena', 'created_at', 'updated_at', 'idUsersCars', 'idMehanicar', 'dijagnozaKvara', 'servis',
    ];

    protected $table = 'services';
}
