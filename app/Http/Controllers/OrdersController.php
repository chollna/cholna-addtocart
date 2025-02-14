<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index1()
    {
    
        return view('welcome');
    }
    public function index(Request $request)
    {
        $request->validate([
    
            'product_detail' => 'required',
            'grand_total' => 'required',
           
        ]);
   
        $input = $request->all();
   
       
     
        Order::create($input);
      
        return redirect()->route('welcome')
                        ->with('success','Product created successfully.');
    }



    
}
