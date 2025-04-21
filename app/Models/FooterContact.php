<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContact extends Model
{
    use HasFactory;

    protected $table = 'footer_details';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'url',
        'social_media_platforms',
        'social_media_urls',
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
