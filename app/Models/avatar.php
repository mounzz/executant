<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class avatar extends Model
{
    use HasFactory;

    public function avatar() {
        return $this->hasOne(User::class);
    }
}
