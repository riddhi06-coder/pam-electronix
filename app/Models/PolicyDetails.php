<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_heading',
        'banner_image',
        'banner_title',
        'deleted_by',
    ];
}

