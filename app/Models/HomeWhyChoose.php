<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWhyChoose extends Model
{
    use HasFactory;

    protected $table = 'home_choose';
    public $timestamps = false;

    protected $fillable = [
        'banner_heading',
        'banner_title',
        'detailed_description',
        'section_heading',

        'section_image',
        'section_images',
        'section_titles',
        'section_descriptions',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
