<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function view()
    {

        $products = Product::all();
            
        return view('index', [
            'products' => $products
        ]);

    }

}
