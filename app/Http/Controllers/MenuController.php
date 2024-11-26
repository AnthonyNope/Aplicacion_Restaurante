<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Modelo que corresponde a la tabla 'menu'
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Método para la API
    public function getMenu()
    {
        $menuItems = Menu::all(); // Obtener todos los productos del menú desde la base de datos
        return response()->json($menuItems); // Retornar los datos en formato JSON
    }

    // Método para renderizar la vista del menú
    public function index()
    {
        $menuItems = Menu::all(); // Recuperar todos los elementos del menú
        return view('menu.index', compact('menuItems')); // Retornar la vista con los datos
    }
}
