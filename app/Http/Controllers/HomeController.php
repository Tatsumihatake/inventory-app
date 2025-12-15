<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();
        $totalProducts = Product::count();

        return view('home', compact('totalCategories', 'totalSuppliers', 'totalProducts'));
    }
}