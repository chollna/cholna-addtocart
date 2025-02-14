<?php 
 
namespace App\Http\Controllers;
use App\Models\Order; 
use Illuminate\Http\Request;
 
class StripeController extends Controller
{
 
    public function session(Request $request)
    {
        //$user         = auth()->user();
        $productItems = [];
 
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        foreach (session('cart') as $id => $details) {
 
            $product_name = $details['product_name'];
            $total = $details['price'];
            $quantity = $details['quantity'];
 
            $two0 = "00";
            $unit_amount = "$total$two0";
 
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency'     => 'USD',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }
 
        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => "0001"
            ],
            'customer_email' => "cholnacholna2222@gmail.com", //$user->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);
     
        return redirect()->away($checkoutSession->url);
    }
 
    public function success()
    {
        return redirect()->route('order');
    }
 
    public function cancel()
    {
        return view('cancel');
    }




    public function store(Request $request)
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