<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    //
    public function index(){
        $product=Product::paginate(3);

        return view('home.homepage', compact('product'));
    }
    public function redirect(){

        $usertype= Auth::user()->usertype;

        if ($usertype=='1'){
            return view('admin.home');
        }
        else {
            $product=Product::paginate(3);
            return view('home.homepage',compact('product'));
        }
    }
    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }
    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $product= product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            if($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
            }
            else{
                $cart->price=$product->price * $request->quantity;
            }

            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    public function show_cart(){
        if(Auth::id()){
            $id= Auth::user()->id;
            $cart= cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
        else{
            return redirect('login');
        }
      
    }
    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();

    }
}

 