<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;

class UserController extends Controller
{
    public function Home()
    {
    	return view('User/Pages/Home');
    }
   	
   	public function AddToCart(request $request)
   	{
   		
   	}
}
