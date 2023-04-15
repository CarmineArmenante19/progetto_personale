<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillabòe=[
        'name',
        'brand',
        'description',
        'img',
        'price',
        'vendor',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
