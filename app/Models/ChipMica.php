<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChipMica extends Model
{
    use HasFactory;

    protected $table = 'chip_mica_details';
    public $timestamps = false;

    protected $fillable = [
        'banner_heading',
        'banner_image',
        'image',
        'detailed_description',
        'short_description',
        'table1_headers',
        'table1_data',
        'table2_headers',
        'table2_data',
        'table3_headers',
        'table3_data',
       

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

}
