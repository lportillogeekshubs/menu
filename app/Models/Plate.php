<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'diners',
        'type',
    ];

    public function plateIngredients()
    {
        return $this->hasMany(PlateIngredient::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'plate_ingredients')
            ->withPivot('quantity');
    }
}
