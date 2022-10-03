<?php

namespace App\Models;

use App\Models\images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorie extends Model
{
    use HasFactory;
    public function categorie() {
    return $this->hasOne(images::class);
    }
}
