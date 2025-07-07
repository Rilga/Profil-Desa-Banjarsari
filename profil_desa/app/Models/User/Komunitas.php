<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komunitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'judul', 'deskripsi', 'cover', 'gambar', 'status', 'dibaca'
    ];

    protected $casts = [
        'gambar' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
