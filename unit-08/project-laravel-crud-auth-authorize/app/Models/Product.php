<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'photo',
        'trademark_name',
        'trademark_email',
        'date_expiry',
        'type_stock',
        'type',
        'available_stock',
        'minimum_stock',
        'id_user',
        'type_product_unit',
    ];

    protected $casts = ['type' => 'array'];


    public function usuario(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'id_user');
    }/**/
}
