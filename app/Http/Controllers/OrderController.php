<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function placeOrder()
    {
        $cart = session()->get('cart', []);

        // if (!$cart || count($cart) == 0) {
        //     return redirect()->back()->with('error', 'Your cart is empty.');
        // }

        // Create a new order
        $order = new Order();
        $order->user_id = Auth::id(); // Ensure the user is logged in
        $order->total_price = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
        $order->status = 'Pending';
        $order->save();

        // Insert each cart item into OrderItems table
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['price'] * $item['quantity']
            ]);
        }

        // Clear the cart after placing order
        session()->forget('cart');

        return redirect()->route('clearcart')->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        // Retrieve all orders with user and order items
        $orders = Order::with('user', 'orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }
    // Retrieve Orders and Order Items
    // public function showOrder($orderId)
    // {
    //     // Find the order by ID
    //     $order = Order::with('orderItems.product')->where('id', $orderId)->first();

    //     if (!$order) {
    //         return redirect()->route('orders.index')->with('error', 'Order not found.');
    //     }

    //     // Fetch user details
    //     $user = $order->user; // Assuming the relationship is set in the Order model (user)

    //     return view('order.show', [
    //         'order' => $order,
    //         'user' => $user
    //     ]);




      


    // }
}
