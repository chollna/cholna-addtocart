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

//         $products = Product::where('category', 'phone')->get(); 
// return view('welcome', compact('products'));

    }



    public function index()
    {
       
        $products= Product::with('User')->get();
       $products = Product::latest()->paginate(5);
     
        return view('index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 


    public function category(Request $request)
    {
        // Get category from request (default is empty)
        $category = $request->input('category', '');
    
        // Fetch products filtered by category if selected
        $query = Product::query();
    
        if (!empty($category)) {
            $query->where('category', $category);
        }
    
        $products = $query->get(); // Fetch products
    
        return view('category', compact('products', 'category'));
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
            'category' => 'required',
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
            'detail' => 'required',
            'price' => 'required',
            'category' => 'required',
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