<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Esta línea ya estaba
use Illuminate\Support\Facades\DB; // Asegúrate de que esta línea esté incluida

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            ['name' => 'Ensalada César', 'price' => 5.99, 'description' => 'Clásica ensalada con aderezo César y crutones.', 'image' => '/imagenes/Pizza/ensaladacesar.png', 'category' => 'entradas'],
            ['name' => 'Sopa de Tomate', 'price' => 4.99, 'description' => 'Deliciosa sopa de tomate con albahaca fresca.', 'image' => '/imagenes/Pizza/Sopadetomate.png', 'category' => 'entradas'],
            ['name' => 'BBQ y Tocinetas', 'price' => 14.99, 'description' => 'Pizza con salsa BBQ y trozos de tocineta crujiente.', 'image' => '/imagenes/Pizza/Bacon&BBQ.png', 'category' => 'platos-principales'],
            ['name' => 'Pollo y Piña', 'price' => 15.99, 'description' => 'Una combinación perfecta de pollo y piña.', 'image' => '/imagenes/Pizza/chiken&pineapple.png', 'category' => 'platos-principales'],
            ['name' => 'Salchicha y Tocinetas', 'price' => 15.99, 'description' => 'Pizza con salchicha y tocineta, una delicia de sabores.', 'image' => '/imagenes/Pizza/Bacon&sausage.png', 'category' => 'platos-principales'],
            ['name' => 'Jamón y Cangrejo', 'price' => 16.99, 'description' => 'Exótica combinación de jamón y cangrejo.', 'image' => '/imagenes/Pizza/HamandCrabstick.png', 'category' => 'platos-principales'],
            ['name' => 'Hawaiana', 'price' => 16.99, 'description' => 'La tradicional pizza hawaiana con piña y jamón.', 'image' => '/imagenes/Pizza/Hawaiian.png', 'category' => 'platos-principales'],
            ['name' => 'Margarita', 'price' => 13.99, 'description' => 'Pizza clásica con salsa de tomate y mozzarella fresca.', 'image' => '/imagenes/Pizza/magherita.png', 'category' => 'platos-principales'],
            ['name' => 'Pepperoni', 'price' => 13.99, 'description' => 'Pizza con rebanadas de pepperoni perfectamente horneado.', 'image' => '/imagenes/Pizza/Pepperoni.png', 'category' => 'platos-principales'],
            ['name' => 'Puerco Deluxe', 'price' => 18.99, 'description' => 'Pizza con una selección premium de carne de cerdo.', 'image' => '/imagenes/Pizza/Porkdeluxe.png', 'category' => 'platos-principales'],
            ['name' => 'Marina', 'price' => 19.99, 'description' => 'Pizza con una deliciosa mezcla de mariscos.', 'image' => '/imagenes/Pizza/SuperSeafood.png', 'category' => 'platos-principales'],
            ['name' => 'Vegana', 'price' => 19.99, 'description' => 'Pizza vegana con ingredientes frescos y saludables.', 'image' => '/imagenes/Pizza/Veggie.png', 'category' => 'platos-principales'],
            ['name' => 'Coreana', 'price' => 17.99, 'description' => 'Sabores coreanos en una pizza única y exótica.', 'image' => '/imagenes/Pizza/TomYunggoon.png', 'category' => 'platos-principales'],
            ['name' => 'Coca-Cola', 'price' => 1.49, 'description' => 'Refrescante Coca-Cola para acompañar tu comida.', 'image' => '/imagenes/Pizza/coca.png', 'category' => 'bebidas'],
            ['name' => 'Agua Mineral', 'price' => 1.49, 'description' => 'Agua mineral para refrescarte.', 'image' => '/imagenes/Pizza/agua.png', 'category' => 'bebidas'],
            ['name' => 'Cheesecake', 'price' => 3.99, 'description' => 'Tarta de queso con una base crujiente.', 'image' => '/imagenes/Pizza/cheesecake.png', 'category' => 'postres'],
            ['name' => 'Brownie', 'price' => 3.49, 'description' => 'Delicioso brownie de chocolate.', 'image' => '/imagenes/Pizza/brownie.png', 'category' => 'postres'],
        ]);
    }
}
