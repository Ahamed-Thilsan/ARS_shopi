<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Auth;
use DB;
use Session;

class PagesController extends Controller
{
    public function index()
    {
        //In Ascending order (by default) inRandomOrder()
        $products_All = Product::orderBy('id','DESC')->skip(7)->take(8)->get();
        //in descending order
        $productsAll = Product::orderBy('id','DESC')->paginate(4);
         //in Randam order
        $productAll = Product::orderBy('id','DESC')->skip(4)->take(3)->get();
        //get all categories and subcategories
        $categories = Category::with('categories')->where(['parent_id'=>0])->skip(2)->take(10)->get();
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        //$categories = json_decode(json_encode($categories));
        //echo "<pre>"; print_r($categories); die;
        if(Auth::check()){
            $user_email =Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }

        foreach($userCart as $key =>$product){
        $productDetails =Product::where('id',$product->product_id)->first();
        $userCart[$key]->image = $productDetails->image;
        }

        return view('pages.index')->with(compact('userCart','productsAll','categories','categorie','productAll','products_All'));
    }




    public function mensclothing()
    {
        return view('pages.mensclothing');
    }
    public function liveStream(){
        if(Auth::check()){
            $user_email =Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }

        foreach($userCart as $key =>$product){
        $productDetails =Product::where('id',$product->product_id)->first();
        $userCart[$key]->image = $productDetails->image;
        }

        $categories = Category::with('categories')->where(['parent_id'=>0])->skip(0)->take(10)->get();
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
    
        return view('pages.live_stream')->with(compact('userCart','categories','categorie'));
    }
    public function aboutUs(){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->skip(0)->take(10)->get();
        if(Auth::check()){
            $user_email =Auth::user()->email;
            $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }

        foreach($userCart as $key =>$product){
        $productDetails =Product::where('id',$product->product_id)->first();
        $userCart[$key]->image = $productDetails->image;
        }

    
        return view('pages.about_us')->with(compact('userCart','categories','categorie'));
    }
}
