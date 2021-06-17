<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Session;
use Image;
use App\Category;
use App\Product;
use App\ProductAttribute;
use App\ProductsImage;
use DB;
use App\User;
use App\DeliveryAddress;
use Illuminate\Support\Str;
use App\Order;
use App\OrderProduct;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addProduct(Request $request){
        
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
           // if(!empty($data['category_id'])){
                //return redirect()->back()->with('flash_message_error','Under Category is Missing!');
            //}
            
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            //if(!empty($data['description'])){
                //$product->discription = '';
            //}else{
               
            //}
            $product->description = $data['description'];
            $product->details = $data['details'];
            $product->brand = $data['brand'];
            $product->old_price = $data['old_price'];
            $product->price = $data['price'];
            $product->product_status = $data['product_status'];
            

            //upload images
            if($request->hasFile('image')){
                 $image_tmp = Input::file('image');
                 if($image_tmp->isValid()){
                     //echo "Test"; die;
                     $extension =$image_tmp->getClientOriginalExtension();
                     $filename = rand(111,99999).'.'.$extension;
                     $large_image_path ='assets/dist/img/large/'.$filename;
                     $medium_image_path ='assets/dist/img/medium/'.$filename;
                     $small_image_path ='assets/dist/img/small/'.$filename;
                     $x_small_image_path ='assets/dist/img/x_small/'.$filename;
                     //resize the images
                     Image::make($image_tmp)->save($large_image_path);
                     Image::make($image_tmp)->resize(1000,1000)->save($medium_image_path);
                     Image::make($image_tmp)->resize(268,432)->save($small_image_path);
                     Image::make($image_tmp)->resize(125,156)->save($x_small_image_path);
                     //store the image name in products table
                     $product->image =$filename;
                 }
                
            }
           
            $product->save();
            return redirect('/products/view-product')->with('flash_message_success','Product has been added successfully!');

        }

        $categories=Category::where(['parent_id'=>0])->get();
        $categories_dropdown ="<option selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                $categories_dropdown .="<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
        return view('products.add_product')->with(compact('categories_dropdown'));
    }

    public function viewProduct(){
         //echo "Test"; die;
         $products = Product::orderBy('id','DESC')->get();
         $products = json_decode(json_encode($products));
         foreach($products as $key=>$val){
             $category_name =Category::where(['id'=>$val->category_id])->first();
             $products[$key]->$category_name = $category_name->name;
         }
        // echo "<pre>";print_r($products);die;
         return view('products.view_product')->with(compact('products'));
    }

    public function deleteProduct($id=null){
        if(!empty($id)){
            Product::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Product Deleted Successfully!');
        }
    }

    public function editProduct(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo"<pre>"; print_r($data);die;
            // Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'], 'product_name'=>$data['product_name'], 'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'price'=>$data['price'],'description'=>$data['description']
            //]);

            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    //echo "Test"; die;
                    $extension =$image_tmp->getClientOriginalExtension();
                     $filename = rand(111,99999).'.'.$extension;
                     $large_image_path ='assets/dist/img/large/'.$filename;
                     $medium_image_path ='assets/dist/img/medium/'.$filename;
                     $small_image_path ='assets/dist/img/small/'.$filename;
                     $x_small_image_path ='assets/dist/img/x_small/'.$filename;
                     //resize the images
                     Image::make($image_tmp)->save($large_image_path);
                     Image::make($image_tmp)->resize(312,400)->save($medium_image_path);
                     Image::make($image_tmp)->resize(270,380)->save($small_image_path);
                     Image::make($image_tmp)->resize(125,156)->save($x_small_image_path);
                     //store the image name in products table
                   
                   
            }
           }else{
               $filename = $data['current_image'];
           }
        
        Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'details'=>$data['details'],'brand'=>$data['brand'],'description'=>$data['description'],'old_price'=>$data['old_price'], 'product_status'=>$data['product_status'],'price'=>$data['price'],'image'=>$filename]);
       //echo"<pre>"; print_r($data);die;
        return redirect('/products/view-product')->with('flash_message_success','product add');
        }

            $productDetails = Product::where(['id'=>$id])->first();
            $categories=Category::where(['parent_id'=>0])->get();
            $categories_dropdown ="<option selected disabled>Select</option>";
            foreach($categories as $cat){
                if($cat->id==$productDetails->category_id)
                {
                    $selected = "selected";
                }else{
                    $selected = "";
                }
              
            $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                if($sub_cat->id==$productDetails->category_id)
                {
                    $selected = "selected";
                }else{ 
                    $selected = "";
                }
                $categories_dropdown .="<option value = '".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
            }
        }
            return view('products.edit_product')->with(compact('productDetails','categories_dropdown'));
    
    }
        
    //attribute section for products//
    Public function addAtributes(Request $request, $id=null){
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        //$productDetails = json_decode(json_encode($productDetails));
        // echo"<pre>"; print_r($productDetails);die;
        if($request->isMethod('post')){
            $data=$request->all();
               //echo"<pre>"; print_r($data);die;
               foreach($data['sku'] as $key =>$val){
                   if(!empty($val)){
                       $attribute = new ProductAttribute;
                       $attribute->product_id=$id;
                       $attribute->sku=$val;
                       $attribute->size=$data['size'][$key];
                       $attribute->price=$data['price'][$key];
                       $attribute->stock=$data['stock'][$key];
                       $attribute->save();
                   }
               }
               return redirect('products/add-atributes/'.$id)->with('flash_message_success', 'Product Attributes has been added successfully!');
        }
           
        return view('products.add_attributes')->with(compact('productDetails'));
    }
    public function deleteAttributes($id = null)
    {
        if(!empty($id)){
            ProductAttribute::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success','Attribute has been Deleted Successfully!');
        }
    }

    public function frontProducts($url = null){
      
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $categoryDetails = Category::where(['url'=>$url])->first();
        
        $productsAll = Product::where(['category_id'=>$categoryDetails->id])->orderBy('id','DESC')->get();
        return view('frontproducts.listing')->with(compact('userCart','categories','categoryDetails','productsAll','categorie'));
        //echo $categoryDetails->id; die;
    }
    public function product($id = null){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $productDetails = Product::with('attributes')->where('id',$id)->first();
            $productDetails = json_decode(json_encode($productDetails));

            $relatedProducts =Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->orderBy('id','DESC')->paginate(4);
          //s $relatedProducts = json_decode(json_encode($relatedProducts));
            //echo "<pre>"; print_r($relatedProducts);die;

            //echo "<pre>"; print_r($productDetails); die;
             $total_stock = ProductAttribute::where('product_id',$id)->sum('stock'); 
             $total_attr = ProductAttribute::where('product_id',$id)->sum('size'); 
            return view('frontproducts.deatils')->with(compact('total_attr','userCart','relatedProducts','total_stock','productDetails','categories','categorie'));
    }

    public function getProductPrice(Request $request){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $proArr = explode("-",$data['idSize']);
            
            $proArr = ProductAttribute::where(['product_id'=>$proArr[0],'size'=> $proArr[1]])->first();
            echo $proArr->price;
            echo "#";
            echo $proArr->stock;    
}  
    public function addtocart(Request $request){
        $data = $request->all();
       // echo "<pre>"; print_r($data); die;

       //Check Product Stock is available or not
       $product_size = explode("-",$data['size']);
       $getProductStock = ProductAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();

       if($getProductStock->stock<$data['quantity']){
           return redirect()->back()->with('flash_message_error','Required Quantity is Not');
       }

       if(empty(Auth::user()->email)){
            $data['user_email'] = '';
       }else{
            $data['user_email'] = Auth::user()->email;
       }

    $session_id = Session::get('session_id');
    if(empty($session_id)){
        $session_id = str_random(40);
        Session::put('session_id',$session_id);
    }

    $sizeArr = explode("-",$data['size']);

    $countproducts =  DB::table('cart')->where(['product_id'=>$data['product_id'],'product_color'=>$data['product_color'
],'size'=>$sizeArr[1],'session_id'=>$session_id])->count();

//echo $countproducts; die;
    if($countproducts>0){
        return redirect()->back()->with('flash_message_error','Product alredy exists in cart!');
    }else{
        DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'
    ],'price'=>$data['price'],'size'=>$sizeArr[1],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$session_id]);
    }
    

      
        
    return redirect('cart')->with('flash_message_success','Product has been added in Cart!');

    }

    public function cart(){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        

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
       // echo "<pre>"; print_r($userCart); die;
        return view('frontproducts.cart')->with(compact('categories','userCart','categorie'));
    }
    public function deleteCartProduct($id=null)
    {
      DB::table('cart')->where('id',$id)->delete();
      return redirect('cart')->with('flash_message_success','Product has been deleted from Cart!');
    }

    public function updateCartQuantity($id=null,$quantity=null){
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('flash_message_success','Product Quantity has been updated Successfully!');

    }

    public function checkout(Request $request){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::find($user_id);

        //check if shpping address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount>0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }

        //update cart table with user email
        $session_id = Session::get('session_id');
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data); die;
            /*if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['
            billing_state']) || empty($data['billing_country']) || empty($data['billing_pincode']) || empty($data['
            billing_telephone']) || empty($data['shipping_name'])  || empty($data['shipping_address'])  || empty($data['
            shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country'])  || empty($data['
            shipping_pincode']) || empty($data['shipping_telephone'])){
                return redirect()->back()->with('flash_message_error','Please fill all the fields to Checkout!');
            }*/

            //update user datails
                User::where('id',$user_id)->update(['name'=>$data['billing_name'], 'address'=>$data['billing_address'],
                'city'=>$data['billing_city'], 'state'=>$data['billing_state'],'country'=>$data['billing_country'],
                'pincode'=>$data['billing_pincode'], 'telephone'=>$data['billing_telephone']]);
                
                if($shippingCount>0){
                    DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'], 'address'=>$data['shipping_address'],
                    'city'=>$data['shipping_city'], 'state'=>$data['shipping_state'],'country'=>$data['shipping_country'],
                    'pincode'=>$data['shipping_pincode'], 'telephone'=>$data['shipping_telephone']]);

                }else{
                    $shipping = new DeliveryAddress;
                    $shipping->user_id = $user_id;
                    $shipping->user_email =$user_email;
                    $shipping->name = $data['shipping_name'];
                    $shipping->address = $data['shipping_address'];
                    $shipping->city = $data['shipping_city'];
                    $shipping->state = $data['shipping_state'];
                    $shipping->country = $data['shipping_country'];
                    $shipping->pincode = $data['shipping_pincode'];
                    $shipping->telephone = $data['shipping_telephone'];
                    $shipping->save();

                }
                //echo "Redirect to Order Review page"; die;
                return redirect()->action('ProductsController@orderReview');

            
        }
        return view('frontproducts.checkout')->with(compact('userCart','shippingDetails','categories','userDetails','categorie'));

    }

    public function orderReview(){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $userDetails = User::where('id',$user_id)->first();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        $shippingDetails = json_decode(json_encode($shippingDetails));
        //echo "<pre>"; print_r($shippingDetails); die;

        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach($userCart as $key =>$product){
        $productDetails =Product::where('id',$product->product_id)->first();
        $userCart[$key]->image = $productDetails->image;
        }
        //echo "<pre>"; print_r($userCart);die;
        return view('frontproducts.order_review')->with(compact('shippingDetails','categories','userDetails','userCart','categorie'));
    }

    public function placeOrder(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $user_id =Auth::user()->id;
            $user_email= Auth::user()->email;

            //Get Shipping Address of User
            $shippingDetails = DeliveryAddress::where(['user_email'=>$user_email])->first();
            //echo "<pre>"; print_r($data); die;
            
            if(empty($data['payment_method'])){
                $data['payment_method'] = '';
            }

            if(empty($data['total_amount'])){
                $data['total_amount'] = '';
            }

            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->telephone = $shippingDetails->telephone;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->total = $data['total_amount'];
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
            foreach($cartProducts as $pro){
                $cartPro = new OrderProduct;
                $cartPro->order_id = $order_id;
                $cartPro->user_id = $user_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();
            }

            Session::put('order_id',$order_id);
            Session::put('total',$data['total_amount']);
            // Redirect user to thanks page after saving order
            return redirect('/thanks');
            
        }

    }
    public function thanks(Request $request){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('frontproducts.thanks')->with(compact('userCart','categories','categorie'));

    }
    public function userOrders(){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $user_id = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$user_id)->orderBy('id','DESC')->get();
        /*$orders = json_decode(json_encode($orders));
        echo "<pre>"; print_r($orders); die;*/
        return view('frontproducts.users_orders')->with(compact('userCart','orders','categories','categorie'));

    }
    public function userOrderDetails($order_id){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        $user_id = AUth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        //echo "<pre>"; print_r($orderDetails); die;
        return view('frontproducts.user_order_details')->with(compact('userCart','orderDetails','categories','categorie'));
    }

    public function viewOrders(){
        $orders = Order::with('orders')->orderBy('id','DESC')->get();
        $orders = json_decode(json_encode($orders));
       // echo "<pre>"; print_r($orders); die;
        return view('orders.view_orders')->with(compact('orders'));

    }

    public function viewOrderDetails($order_id){
        
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        $orderDetails = json_decode(json_encode($orderDetails));
        //echo "<pre>"; print_r($orderDetails); die;
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        /*$userDetails = json_decode(json_encode($userDetails));
        echo "<pre>"; print_r($userDetails); die;*/
        return view('orders.order_details')->with(compact('orderDetails','userDetails'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            return redirect()->back()->with('flash_message_success','Order status has been updated successfully');
        }
    }

    public function searchProducts(Request $request){
        $categorie = Category::with('categories')->where(['parent_id'=>0])->limit(4)->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
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

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            $categories = Category::with('categories')->where(['parent_id'=>0])->get();

            $search_product = $data['product'];

            $productsAll = Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->get();
            
            return view('frontproducts.listing')->with(compact('userCart','categories','productsAll','productsAll','categorie','categories'));
        }
    }
}