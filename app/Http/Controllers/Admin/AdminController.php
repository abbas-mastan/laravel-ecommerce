<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }
    public function brands() 
    {
        return view('admin.brands');
    }
    public function products() 
    {
        return view('admin.products.index');
    }
    public function addProduct($id = -1) 
    {
        return view('admin.products.add');
    }
}
