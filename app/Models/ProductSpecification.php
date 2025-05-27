<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $table = 'product_specification';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'case_style',
        'case_style_slug',
        'product_image',
        'name',
        'manufacturer',
        'product_description',
        'availability',
        'pricing',
        'rohs',
        'capacitance',
        'voltage',
        'voltage_rating',
        'termination',
        'pf',
        'lead_spacing',
        'length',
        'width',
        'height',
        'lead_wire',
        'tolerance',
        'package_case',
        'operating_temp',
        'max_operating_temp',
        'series',
        'qualification',
        'packaging',

        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
