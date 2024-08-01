<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Logic to fetch cart items and calculate total items and price
        $cartItems = []; // Replace with logic to fetch cart items
        $totalItems = count($cartItems);
        $totalPrice = 0; // Replace with logic to calculate total price

        // Return view with cart items and total information
        return view('cart', compact('cartItems', 'totalItems', 'totalPrice','orders'));
    }
}

