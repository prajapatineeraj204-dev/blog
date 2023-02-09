<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;


class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsToMany(Like::class, 'likes','id');
    }

    public function userid(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
