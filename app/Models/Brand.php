<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status'
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = ucwords($value);
    }
}
