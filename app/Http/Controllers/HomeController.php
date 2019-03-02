<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use App\User;

use Auth;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('home',['orders'=>$orders]);
    }

    public function getProducts()
    {
        $products = Product::orderBy("created_at", "desc")->paginate(12);

        return view('welcome',["products"=>$products]);
    }

    public function addToCart(REQUEST $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getItemRemoveByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->removeByOne($id);

        Session::put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getItemRemoveAll($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->removeAll($id);

        if(count($cart->items)>0){
            Session::put('cart', $cart); 
        } else {
            Session::forget('cart');
        }
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getItemAddByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->addByOne($id);

        Session::put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            return view('cart',['products'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart',['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout()
    {        
        if(!Session::has('cart')){
            return view('cart',['products'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice; 

        return view('checkout',['total'=>$total]);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart')){
            return view('cart',['products'=> null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        // $order->user_id = Auth::id();
        // $order->save();
        // dd($order);
        Auth::user()->orders()->save($order);

        Session::forget('cart');

        return redirect()->route('/')->with('success','Successfully Purchased');
    }
}
