<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function CartList()
    {
        $cartItems = \Cart::getContent();

        return view('cart', compact('cartItems'));
    }

    function AddToCart($id)
    {
        $product = Product::find($id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image
            )
        ]);

        return redirect()->to('/')->with(['success' => 'Product successfully added in to cart']);
    }

    function RemoveCart($id) 
    {
        \Cart::remove($id);

        return redirect()->to('/cart')->with(['success' => 'Product succesfully removed']);
    }

    function ClearCart()
    {
        \Cart::clear();

        return redirect()->to('/cart')->with(['success' => 'Cart Successfully cleared']);
    }

    function BuyCart()
    {
        return view('buycart');
    }

    function PostBuyCart(Request $request)
    {
        $request->validate([
            'country' => 'min:3|string',
            'city' => 'min:3|string',
            'address' => 'min:5|string',
        ]);

        $cartItems = \Cart::getContent();
        
        foreach($cartItems as $item)
        {
            $order = new Order;

            $order->user = auth()->user()->name;
            $order->country = $request->country;
            $order->city = $request->city;
            $order->address = $request->address;
            $order->productname = $item->name;
            $order->productprice = $item->price;
            $order->productimage = $item->attributes->image;
            $order->productquantity = $item->quantity;
            
            \Cart::Clear();

            $order->save();
        }

        return redirect()->to('/')->with(['success' => 'Your order successfully received']);
    }

    function BuyProduct($id)
    {
        $product = Product::find($id);

        return view('buyproduct', [
            'product' => $product
        ]);
    }

    function PostBuyCartID(Request $request, $id) {
        $request->validate([
            'country' => 'min:3|string',
            'city' => 'min:3|string',
            'address' => 'min:5|string',
        ]);

        $item = Product::find($id);
        
        $order = new Order;

        $order->user = auth()->user()->name;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->address = $request->address;
        $order->productname = $item->name;
        $order->productprice = $item->price;
        $order->productimage = $item->image;
        $order->productquantity = 1;

        $order->save();

        return redirect()->to('/')->with(['success' => 'Your order successfully received']);
        }
}
