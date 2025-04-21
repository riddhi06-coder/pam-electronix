<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeIntro extends Model
{
    use HasFactory;

    protected $table = 'home_intro';
    public $timestamps = false;

    protected $fillable = [
        'banner_image',
        'description',
        'section_heading',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
