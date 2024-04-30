<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "description",
        "imagepath",
    ];
    public function categories()
    {
        return $this->hasMany(Product::class);
    }
}