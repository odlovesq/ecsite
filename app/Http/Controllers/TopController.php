<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TopController extends Controller
{
    public function index()
    {
        return view('top', [
            'products' => Product::newArrival()->orderByDesc('created_at')->get()
        ]);
    }
}
