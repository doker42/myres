<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'link',
        'git_link',
        'img_name',
        'img_path',
        'skills',
        'description',
        'status'
    ];
}
