<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['code', 'name', 'description', 'image'];
    
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
