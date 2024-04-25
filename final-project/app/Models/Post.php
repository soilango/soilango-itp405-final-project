<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'username');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
