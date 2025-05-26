<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;

    protected $table = 'product_description';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'banner_image',
        'product_image',
        'product_description',


        'characteristics_heading',
        'characteristics_description',
        'capacitance_heading',
        'capacitance_description',
        'voltage_heading',
        'voltage_description',
        'leads_heading',
        'leads_description',
        'special_heading',

        'special_description',
        'special_image',
        'header',
        'case_style',
        'operating_heading',
        'operating_description',
        'marking_heading',
        'marking_description',
        'ordering_heading',
        'image',
        'style_heading',
        'style_description',

        'info_header',
        'info_details',
        'print_image',
        

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
