<?php
 
namespace App\Http\Controllers;
 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class ProductcrudController extends Controller
{
    


    public function welcome()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }



    public function index()
    {
       
        $products= Product::with('User')->get();
       $products = Product::latest()->paginate(5);
     
        return view('index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    
    public function create()
    {
        $users = DB::table('users')->get();
        return view('create')->with('users',$users);
    }
 
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            'user_id' => 'required',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
     
        Product::create($input);
      
        return redirect()->route('index')
                        ->with('success','Product created successfully.');
    }
 
    
    public function show(Product $product)
    {
  
        return view('show',compact('product'));
    }
 
    
    public function edit(Product $product)
    {
        return view('edit',compact('product'));
    }
 
   
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }else{
            unset($input['photo']);
        }
           
        $product->update($input);
     
        return redirect()->route('index')
                        ->with('success','Product updated successfully');
    }
 
    
    public function destroy(Product $product)
    {
        $product->delete();
      
        return redirect()->route('index')
                        ->with('success','Product deleted successfully');
    }
}