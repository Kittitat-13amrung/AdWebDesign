<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ["file", "created_at", "updated_at"];

    public function image() {
        return $this->belongsTo('Car');
    }
}
