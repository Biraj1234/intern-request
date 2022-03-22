<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $table = 'posts';
    protected $fillable = ["title", "image", "description", "status", "user_id"];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
