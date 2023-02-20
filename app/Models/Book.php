<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'content',
        'img',
        'author_id'
    ];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id')->first();
    }

    public function getUserHasActionsAttribute() : bool {
        return Auth::user()->id === $this->author_id || Auth::user()->role === 'admin';
    }
}
