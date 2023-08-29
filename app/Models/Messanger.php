<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messanger extends Model
{
    use HasFactory;
    protected $table = 'messangers';
    protected $fillable = ['message'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
