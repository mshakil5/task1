<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function home()
    {
        
        return view('welcome');
    }

    public function index()
    {
        
        return view('product');
    }

    public function store()
    {
        
        $products = Http::get('https://raw.githubusercontent.com/Bit-Code-Technologies/mockapi/main/purchase.json')->json();

    //    dd();

            foreach ($products as $key => $product) {
                    // dd($product['created_at']);
                    $data = new Product();
                    $data->name= $product['name'];
                    $data->order_no= $product['order_no'];
                    $data->user_phone= $product['user_phone'];
                    $data->product_code= $product['product_code'];
                    $data->product_name= $product['product_name'];
                    $data->product_price= $product['product_price'];
                    $data->purchase_quantity = $product['purchase_quantity'];
                    $data->save();
                
            }

        
        return view('product');
    }
}
