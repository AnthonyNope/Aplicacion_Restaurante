<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Nombre de la tabla
    public $timestamps = false; // Si no usas created_at/updated_at
    protected $fillable = ['name', 'price', 'description', 'image', 'category'];
}
