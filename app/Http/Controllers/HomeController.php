<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Store;

class HomeController extends Controller
{
    private $product;
    private $store;
    private $category;

    public function __construct(Product $product, Store $store, Category $category)
    {
        $this->product  = $product;
        $this->store    = $store;
        $this->category = $category;
    }
  
    public function index()
    {
        $products = $this->product->limit(6)->orderBy('id', 'DESC')->get();

        $stores = $this->store->limit(3)->orderBy('id', 'DESC')->get();

        return view('welcome', compact('products', 'stores'));
    }

    public function single($slug) 
    {
        $product = $this->product->whereSlug($slug)->first();

        return view('single', compact('product'));
    }
}
