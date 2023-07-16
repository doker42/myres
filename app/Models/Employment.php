<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $fillable = [
        'dateRange',
        'companyName',
        'companyLink',
        'typeJob',
        'position',
        'library',
        'langs',
        'stack',
        'additions'
    ];
}
