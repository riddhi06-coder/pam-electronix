<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $table = 'specifications';
    public $timestamps = false;

    protected $fillable = [
        'banner_heading',
        'banner_image',
        'image',
        'detailed_description',

        'headers',
        'spec_ids',
        'spec_temp_coeff',
        'spec_capacitor_drift',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];
}
