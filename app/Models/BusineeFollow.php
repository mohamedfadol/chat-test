<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BusineeFollow extends Model
{
    use HasFactory;
    protected  $table = 'business_follow';
    protected $guarded = [];

    public $fillable=[
        'user_id',
        'business_id',
        'created_at',
    ];
}
