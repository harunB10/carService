<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = 'termin';

    protected $fillable = [
        'idMehanicar', 'title', 'startTime', 'end', 'idKorisnik',
    ];
}
