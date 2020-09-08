<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $fillable = [
        'status_name','publication_status'
    ];
}
