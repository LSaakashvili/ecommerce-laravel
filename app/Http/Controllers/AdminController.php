<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderQuantity;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function Index()
    {
        $orders = Order::all();
        $users = User::all();

        return view('admin.index', [
            'orders' => $orders,
            'users' => $users
        ]);
    }

    function AddUser()
    {
        return view('admin.adduser');
    }

    function PostAddUser(Request $request)
    {
        // Validate Form

        $request->validate([
            'name' => 'required|min:4|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'user_type' => 'required'
        ]);

        // Create User

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);

        // If User Will Be Created Return Success Response

        return redirect()->back()->with([
            'success' => 'User succesfully created'
        ]);
    }
    
    function EditUsers() 
    {
        $users = User::all();

        return view('admin.editusers', [
            'users' => $users
        ]);
    }

    function RemoveUser($id)
    {
        if (User::find($id)) {
            User::find($id)->delete();

            return redirect()->to('/admin/edit/user')->with(['success' => 'User successfully removed']);
        }

        return redirect()->to('/admin/edit/user');
    }

    function EditUser($id) {
        if (User::find($id)) {
            $user = User::find($id);

            return view('admin.edituser', [
                'user' => $user
            ]);
        }

        return redirect()->to('/admin/edit/user');
    }

    function PostEditUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => ''
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;

        $user->save();

        return Redirect()->to('/admin/edit/user')->with(['success' => 'User succesfully modified']);
    }

    function AddProduct()
    {
        return view('admin.addproduct');
    }

    function PostAddProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|integer|min:10',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('/img'), $imageName);

        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $imageName;

        $product->save();

        return redirect()->to('/admin/add/product')->with(['success' => 'Product succesfully added']);
    }

    function EditProducts()
    {
        $products = Product::all();

        return view('admin.editproducts',[
            'products' => $products
        ]);
    }

    function RemoveProduct($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->to('/admin/edit/product')->with(['success' => 'Product successfully deleted']);
    }

    function EditProduct($id)
    {
        $product = Product::find($id);

        return view('admin.editproduct', ['product' => $product]);
    }
    
    function PostEditProduct(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|min:4',
            'price' => 'required|integer|min:10'
        ]);

        $product = Product::find($id);

        if (isset($request->image)) {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('/img'), $imageName);

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return redirect()->to('/admin/edit/product')->with(['success' => 'Product successfully updated']);
    }

    function OrdersView()
    {
        $orders = Order::all();

        return view('admin.orders', [
            'orders' => $orders
        ]);
    }

    function CompleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->back()->with(["success" => "Order successfully completed"]);
    }
}
