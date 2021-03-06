<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'extracto',
        'contenido',
        'acceso',
        'caducable_comentable',
        'fecha',
        'id_user'
    ];

    protected $casts = ['caducable_comentable' => 'array'];
    public function usuarios()
    {
        return $this->hasMany(User::class, 'id', 'id_user');
    }
}
