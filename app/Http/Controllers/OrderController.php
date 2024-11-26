<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        // Validación de los datos del pedido
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'order_items' => 'required|array',
            'order_items.*.id' => 'required|exists:menu,id', // Validar que el plato exista
            'order_items.*.quantity' => 'required|integer|min:1',
        ]);

        // Crear el pedido
        $order = Order::create([
            'customer_name' => $validatedData['customer_name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'total' => 0, // Lo calcularemos más adelante
        ]);

        $total = 0;

        // Agregar los artículos al pedido
        foreach ($validatedData['order_items'] as $item) {
            $menu = \App\Models\Menu::find($item['id']);
            $subtotal = $menu->price * $item['quantity'];

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $menu->price,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        // Actualizar el total del pedido
        $order->update(['total' => $total]);

        // Responder con éxito
        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order,
            'items' => $order->items,
        ], 201);
    }
}
