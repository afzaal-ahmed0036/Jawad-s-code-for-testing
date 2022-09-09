<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Cartitem;
use App\Models\OrderAddress;

class CartController extends Controller
{

    public function Product($id)
    {
        $product = Product::find($id);
        return view('pages.productDetail' , compact('product'));
    }

    public function cartItem()
    {
        if(Auth::user())
        {
            $userCarts = Cart::where('user_id' , Auth::user()->id)
            ->join('cart_items' , 'carts.id' , '=' , 'cart_items.cart_id')
            ->join('products' , 'products.id' , '=' , 'cart_items.product_id')->get();
            
            return view('pages.cart' , compact('userCarts'));
        }
        else
        {
            $userCarts = Cart::where('system_ip' , Request()->ip())
            ->join('cart_items' , 'carts.id' , '=' , 'cart_items.cart_id')
            ->join('products' , 'products.id' , '=' , 'cart_items.product_id')->get();
        
            return view('pages.cart' , compact('userCarts'));
        }
    }
    public function AddTOCart($id , Request $request)
    {

        $total_count = $request->qty;
        $total_amount = $request->unit_price * $total_count;
        $ip = $request->ip();
        $product = Product::find($id);
        $unit_price = $product->price;
        $quantity = $request->qty;

        $total_price = $unit_price * $quantity;

        $product_qty = $product->quantity - $quantity;
    
        if(Auth::user())
        {
        
            $user = Cart::where('user_id',Auth::user()->id)->first();
            $user_ip = Cart::where('system_ip' , $ip)->first();
            // dd($user);
            
        if($user != null)
        {
            // dd('djkjkd');
            $total_count = $total_count + $user->total_count;
            $total_amount = $total_amount + $user->total_amount;
           $cart = Cart::where('user_id' , Auth::user()->id)->first();
        //    dd($cart);
           $cart->update([
            'user_id'     => Auth::user()->id,
            'total_count' => $total_count,
            'total_amount' => $total_amount,

           ]);
           Cartitem::create([
            'cart_id'    => $cart->id,
            'product_id' => $id,
            'item_quantity'   => $quantity,
            'unit_price' => $product->price

         ]);

         Product::where('id' , $product->id)->update([
            'quantity' => $product_qty,
         ]);
        }
    elseif($user_ip != null)
        {
 
            $total_count = $total_count + $user->total_count;
            $total_amount = $total_amount + $user->total_amount;
            $cart = Cart::where('system_ip' , $ip)->first();
            $cart->update([
            'system_ip'     => $ip,
            'total_count' => $total_count,
            'total_amount' => $total_amount,

           ]);
           Cartitem::create([
            'cart_id'    => $cart->id,
            'product_id' => $id,
            'item_quantity'   => $quantity,
            'unit_price' => $product->price

         ]);
         Product::where('id' , $product->id)->update([
            'quantity' => $product_qty,
         ]);
        }
        else
        {

            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'total_count'  => $total_count,
                'total_amount'  => $total_price,
             ]);
        
        // dd($cart);

         Cartitem::create([
            'cart_id'    => $cart->id,
            'product_id' => $id,
            'item_quantity'   => $quantity,
            'unit_price' => $product->price

         ]);
         Product::where('id' , $product->id)->update([
            'quantity' => $product_qty,
         ]);
        }
        
         return redirect()->route('cart.product' , $product->id)->with('success' , 'Item added to cart');

        }
    else
        {
            $user_ip = Cart::where('system_ip' , $ip)->first();

            if($user_ip != null)
            {
   
                $total_count = $total_count + $user_ip->total_count;
                $total_amount = $total_amount + $user_ip->total_amount;

                $cart = Cart::where('system_ip' , $ip)->first();
                $cart->update([
                'system_ip'     => $ip,
                'total_count' => $total_count,
                'total_amount' => $total_amount,
    
               ]);
               Cartitem::create([

                'cart_id'   => $cart->id,
                'product_id' => $id,
                'item_quantity'   => $quantity,
                'unit_price' => $product->price
    
             ]);

             Product::where('id' , $product->id)->update([
                'quantity' => $product_qty,
             ]);

            }
           else
            {
               
                $cart = Cart::create([
                    'system_ip'     => $ip,
                    'total_count'   => $total_count,
                    'total_amount'  => $total_price,
             ]);
           
             Cartitem::create([

                'cart_id'   => $cart->id,
                'product_id' => $id,
                'item_quantity'   => $$quantity,
                'unit_price' => $product->price
    
             ]);

             Product::where('id' , $product->id)->update([
                'quantity' => $product_qty,
             ]);

            }
        $product = Product::find($id);        
      return redirect()->route('cart.product' , $product->id)->with('success' , 'Item added to cart');

        }
    }
    public function shippingAddress($id)
    {
      
        $cart = Cart::find($id); 
        $userCarts = Cart::where('user_id' , Auth::user()->id)
        ->join('cart_items' , 'carts.id' , '=' , 'cart_items.cart_id')
        ->join('products' , 'products.id' , '=' , 'cart_items.product_id')->get();
     
        return view('pages.order_place' ,compact('userCarts' , 'cart'));
      
    }
    public function storeShipping(Request $request)
    {
       $validate = $request->validate([
        'cart_id' => 'required',
        'apartment_no' => 'required',
        'area' => 'required',
        'address' => 'required',
        'phone_no' => 'required',
       ]);
       $total_amount = $request->cart_total;
   
      $record = OrderAddress::create($request->except('_token'));

      $order = OrderAddress::find($record->id);
    
      $userCarts = Cart::where('user_id' , Auth::user()->id)
      ->join('cart_items' , 'carts.id' , '=' , 'cart_items.cart_id')
      ->join('products' , 'products.id' , '=' , 'cart_items.product_id')->get();

      return view('pages.paypal' , compact('order' , 'userCarts' ,'total_amount'));

    }

}
