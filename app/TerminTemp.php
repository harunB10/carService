<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerminTemp extends Model
{
    protected $table = 'temp_termin';

    protected $fillable = [
        'idMehanicar', 'title', 'startTime', 'end', 'idKorisnik', 'vrstaServisa',
    ];
}
