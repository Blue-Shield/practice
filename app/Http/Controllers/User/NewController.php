<?php

namespace App\Http\Controllers\user;

use Nikolag\Square\Facades\Square;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MyTestMail2;
use App\Mail\MyTestMail;
use App\Order;
use App\Rating;
use App\Product;
use App\Shipping;
use App\User;
use Session;
use Auth;
use Mail; 
use DB;

class NewController extends Controller
{
   public function Home()
	 {
	    return view('User/Pages/Home');
	 }
	 public function GetCart()
	 {
	 	$Cart = Session::get('Cart');
	 	$CartTotal = 0;
	 	$Information = '
	 			<div class="dropdown cart-dropdown">
                <a href="javascript:void(0)" class="cart-toggle">
                   <i class="minicart-icon">
                      <span class="cart-count">'.count($Cart).'</span>
                   </i>
                </a>
                <div class="dropdown-box">
                   <div class="product product-cart-header">
                      <span class="product-cart-counts">'.count($Cart).' items</span>
                    
                   </div>
                   <div class="products scrollable">';
                   foreach($Cart as $Carts)
                   {
                   	if($Carts['product_attribute_image'] == "")
		              {
		                $image = url('/')."/public/Admin/ProductImage/".$Carts['product_image'];
		              }
		              else
		              {
		                $image = $Carts['product_attribute_image'];
		              }
                   	 $params = "'".$Carts["product_id"]."'";
                   	 $Information.='
               	 		<div class="product product-cart">
                         <div class="product-detail">
                            <a href="javascript:void(0)" class="product-name">
                            	'.$Carts["product_name"].'
                            </a>
                            <div class="price-box">
                               <span class="product-quantity">'.$Carts["product_qty"].'</span>
                               <span class="product-price">£'.$Carts["product_price"].'</span>
                            </div>
                         </div>
                         <figure class="product-media">
                            <a href="#">
                            <img src="'.$image.'" alt="product" width="90"
                               height="90" />
                            </a>
                            <button class="btn btn-link btn-close" onclick="removeCart('.$params.')">
                            <i class="fas fa-times"></i>
                            </button>
                         </figure>
                      </div>
                   	 '; 
                   	 $CartTotal = $CartTotal+$Carts["total_price"];
                   }

                   $Information.= '
                   	</div>
                   <div class="cart-total">
                      <label>Subtotal:</label>
                      <span class="price">£'.$CartTotal.'</span>
                   </div>
                   <div class="cart-action">
                      <a href="'.route("cart").'" class="btn btn-dark"><span>View Cart</span></a>
                   </div>
                </div>
             </div>
	 		';
	 		return $Information;
	 }
    
    
    public function getMobileCart(){
        $Cart = Session::get('Cart');
	 	$CartTotal = 0;
	 	$Information = '
                <div class="dropdown-box">
                   <div class="product product-cart-header">
                      <span class="product-cart-counts">'.count($Cart).' items</span>
                    
                   </div>
                   <div class="products scrollable">';
                   foreach($Cart as $Carts)
                   {
                   	if($Carts['product_attribute_image'] == "")
		              {
		                $image = url('/')."/public/Admin/ProductImage/".$Carts['product_image'];
		              }
		              else
		              {
		                $image = $Carts['product_attribute_image'];
		              }
                   	 $params = "'".$Carts["product_id"]."'";
                   	 $Information.='
               	 		<div class="product product-cart">
                         <div class="product-detail">
                            <a href="javascript:void(0)" class="product-name">
                            	'.$Carts["product_name"].'
                            </a>
                            <div class="price-box">
                               <span class="product-quantity">'.$Carts["product_qty"].'</span>
                               <span class="product-price">£'.$Carts["product_price"].'</span>
                            </div>
                         </div>
                         <figure class="product-media">
                            <a href="#">
                            <img src="'.$image.'" alt="product" width="90"
                               height="90" />
                            </a>
                            <i class="fas fa-times"></i>
                            </button>
                         </figure>
                      </div>
                   	 '; 
                   	 $CartTotal = $CartTotal+$Carts["total_price"];
                   }

                   $Information.= '
                   	</div>
                   <div class="cart-total">
                      <label>Subtotal:</label>
                      <span class="price">£'.$CartTotal.'</span>
                   </div>
                   <div class="cart-action">
                      <a href="'.route("cart").'" class="btn btn-dark"><span>View Cart</span></a>
                   </div>
                </div>
	 		';
	 		return $Information;
    }
    
	 public function CartPageUpdate()
	 {
	 	$Cart = Session::get('Cart');
	 	$CartTotal = 0;
	 	$CartInformation = '<table class="shop-table cart-table mt-2">
		  <thead>
		    <tr>
		      <th><span>Product</span></th>
		      <th></th>
		      <th><span>Price</span></th>
		      <th><span>quantity</span></th>
		      <th>Subtotal</th>
		    </tr>
		  </thead>
		  <tbody>';
		    foreach ($Cart as $key => $Carts) {
		    	if($Carts['product_attribute_image'] == "")
	              {
	                $image = url('/')."/public/Admin/ProductImage/".$Carts['product_image'];
	              }
	              else
	              {
	                $image = $Carts['product_attribute_image'];
	              }
		    	$CartId = "'".$Carts["product_id"]."'";
		    	$CartQty = "'".$Carts["product_qty"]."'";
		    	$CartTotal = $CartTotal+$Carts['total_price'];
		    	$CartInformation.= '<tr>
                    <td class="product-thumbnail">
                      <figure>
                        <a href="product-simple.html">
                          <img src="'.$image.'" width="80" height="80"
                          alt="product">
                        </a>
                        <a href="javascript:void(0)" class="product-remove" title="Remove this product" onclick="removeItemFromCartPage('.$CartId.')">
                          <i class="fas fa-times"></i>
                        </a>
                      </figure>
                    </td>
                    <td class="product-name">
                      <div class="product-name-section">
                        <a href="product-simple.html">'.$Carts["product_name"].'</a>
                      </div>
                    </td>
                    <td class="product-subtotal">
                      <span class="amount">£'.$Carts["product_price"].'</span>
                    </td>
                    <td class="product-quantity">
                    <div class="calculation calculation'.$Carts["product_id"].'">
                      <div class="input-group">
                        <button class="quantity-minus d-icon-minus" onclick="decreaseCart('.$CartId.','.$CartQty.')"></button>
                        <input class="form-control" type="number" value="'.$Carts["product_qty"].'">
                        <button class="quantity-plus d-icon-plus" onclick="increaseCart('.$CartId.')"></button>
                      </div>
                     </div>
                     <div class="calculation-gif calculation-gif'.$Carts["product_id"].'">
                        <img src="'.url('/').'/public/User/images/spinner.gif" />
                      </div>
                    </td>
                    <td class="product-price">
                      <span class="amount">£'.$Carts["total_price"].'</span>
                    </td>
                  </tr>';
		    }
		  $CartInformation.='</tbody>
		</table>';
		return response()->json(['CartInformation' => $CartInformation, 'CartTotal' =>(int)(($CartTotal*100))/100]);
	 }
	 public function AddToCart(request $request)
	 {
	 	// Session::forget('Cart');
	 	// return "Session Removed";exit;
	 	$id = $request->input('product_id');
	 	$Product = Product::find($id);

	 	$Cart = Session::get('Cart');

	 	// if(!$Cart) 
	 	// {
	 	// 	$Cart = [
	 	// 		$id => [
	 	// 			'product_id' => $id,
	 	// 			'product_name' => $Product->product_name,
	 	// 			'product_price' => $Product->product_spl_price,
	 	// 			'product_image' => $Product->product_image,
	 	// 			'product_qty' => 1,
	 	// 			'product_attribute_name' => '',
	 	// 			'product_attribute_value' => '',
	 	// 			'product_attribute_image' => null,
	 	// 			'total_price' => $Product->product_spl_price
	 	// 		]
	 	// 	];
	 	// 	Session::put('Cart', $Cart);
	 	// 	$Information =  $this->GetCart();
	 	// 	$MobileCart =  $this->getMobileCart();
	 	// 	return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'mobile_cart' => $MobileCart]);
	 	// }

	 	if(isset($Cart[$id]))
	 	{
	 		$Cart[$id]['product_qty']++;
	 		$Cart[$id]['total_price'] = $Cart[$id]['product_price']*$Cart[$id]['product_qty'];
	 		Session::put('Cart', $Cart);
	 		$Information =  $this->GetCart();
	 		$MobileCart =  $this->getMobileCart();
	 		return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'mobile_cart' => $MobileCart]);
	 	}

	 	$Cart[$id] = [
	 		'product_id' => $id,
			'product_name' => $Product->product_name,
			'product_price' => $Product->product_spl_price,
			'product_image' => $Product->product_image,
			'product_qty' => 1,
			'product_attribute_name' => '',
	 		'product_attribute_value' => '',
	 		'product_attribute_image' => null,
			'total_price' => $Product->product_spl_price
	 	];
	 	Session::put('Cart', $Cart);
	 	$Information =  $this->GetCart();
	 	return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information]);
	 }

	 public function RemoveCart(request $request)
	 {

	 	$Cart = Session::get('Cart');
	 	unset($Cart[$request->product_id]);
	 	Session::put('Cart', $Cart);
	 	$Information =  $this->GetCart();
	 	$CartInformation = $this->CartPageUpdate();
	 	$MobileCart =  $this->getMobileCart();
 		$JsonEncodeCart = json_encode($CartInformation);
 		$JsonDecodeCart = json_decode($JsonEncodeCart);
	 	return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 
	 	'CartInformation' => $JsonDecodeCart->original->CartInformation, 'cart_total' =>$JsonDecodeCart->original->CartTotal, 'Information' =>$Information]);
	 }
	 public function ProductByCategory($category_name,$id)
	 {
	 	$Products = DB::table('products')->where('category_id',$id)->get();
	 	$Category = DB::table('categories')->where('id',$id)->first();
	 	$CategoryName = $Category->category_name;
	 	return view('User/Pages/ProductByCategory',compact('Products','CategoryName'));
	 }
	 public function ProductBySubCategory($subcategory_name,$id)
	 {
	 	$Products = DB::table('products')->where('subcategory_id',$id)->get();
	 	$SubCategory = DB::table('subcategories')->where('id',$id)->first();
	 	$SubCategoryName = $SubCategory->subcategory_name;
	 	return view('User/Pages/ProductBySubCategory',compact('Products','SubCategoryName'));
	 }
	 public function Cart()
	 {
	 	return view('User/Pages/Cart');
	 }
	 public function IncreaseCart(request $request){
	 	$Cart = Session::get('Cart');
	 	$id = $request->product_id;
	 	$Cart[$id]['product_qty']++;
 		$Cart[$id]['total_price'] = $Cart[$id]['product_price']*$Cart[$id]['product_qty'];
 		Session::put('Cart', $Cart);
 		$CartInformation = $this->CartPageUpdate();
 		$JsonEncodeCart = json_encode($CartInformation);
 		$JsonDecodeCart = json_decode($JsonEncodeCart);
 		$Information =  $this->GetCart();
 		$MobileCart =  $this->getMobileCart();
 		return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'CartInformation' => $JsonDecodeCart->original->CartInformation, 'cart_total' =>$JsonDecodeCart->original->CartTotal, 'mobile_cart' => $MobileCart]);
	 }

	 public function ProductSinglePage($product_name,$id)
	 {
	 	$Products = DB::table('products')->where('id',$id)->orderBy('id','DESC')->first();
	 	$Product_Gallery = DB::table('productgalleries')->where('product_id',$id)->get();
	 	$Product_Single_Gallery = DB::table('productgalleries')->where('product_id',$id)->select('product_image')->first();
	 	$Product_Gallery_count = DB::table('productgalleries')->where('product_id',$id)->count();
	 	$Product_Attribute = DB::table('productattributes')->where('product_id',$id)->get();
	 	$Product_Attribute_count = DB::table('productattributes')->where('product_id',$id)->count();
	 	$Product_Attribute_Single = DB::table('productattributes')->where('product_id',$id)->first();
	 	if(isset($Product_Attribute_Single))
	 	{
	 		$Product_Attribute_name = $Product_Attribute_Single->attribute_name;
	 	}
	 	else
	 	{
	 		$Product_Attribute_name = '';
	 	}
	 	return view('User/Pages/ProductSinglePage',compact('Products','Product_Attribute','Product_Single_Gallery','Product_Gallery','Product_Attribute_name','Product_Gallery_count','Product_Attribute_count'));
	 }
	 public function AddToCartProductPage(request $request)
	 {
	 	$id = $request->input('product_id');
	 	$Product = Product::find($id);
	 	$Cart = Session::get('Cart');
	 	$Cart[$id] = [
	 		'product_id' => $id,
			'product_name' => $Product->product_name,
			'product_price' => $Product->product_spl_price,
			'product_image' => $Product->product_image,
			'product_qty' => 1,
			'product_attribute_name' => '',
	 		'product_attribute_value' => '',
	 		'product_attribute_image' => null,
			'total_price' => $Product->product_spl_price
	 	];
	 	Session::put('Cart',$Cart);
	 	$Information =  $this->GetCart();
	 	$MobileCart =  $this->getMobileCart();
 		return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'mobile_cart' => $MobileCart]);
	 }
	 public function AddToCartProductPageAttribute(request $request)
	 {
	   // return $request->all();exit;
	 	$id = $request->input('product_id');
	 	$attribute_name = $request->input('attribute_name');
	 	$attribute_image = $request->input('attribute_image');
	 	$attribute_value = $request->input('attribute_value');
	 	$attribute_price = $request->input('attribute_price');
	 	$Product = Product::find($id);
	 	$Cart = Session::get('Cart');
	 	if(!empty($Cart))
	 	{

	 	}

	 	$Cart[$id] = [
	 		'product_id' => $id,
			'product_name' => $Product->product_name,
			'product_price' => $attribute_price,
			'product_image' => $Product->product_image,
			'product_qty' => 1,
			'product_attribute_name' => $attribute_name,
	 		'product_attribute_value' => $attribute_value,
	 		'product_attribute_image' => $attribute_image,
			'total_price' => $attribute_price
	 	];
	 	Session::put('Cart',$Cart);
	 	$Information =  $this->GetCart();
	 	$MobileCart =  $this->getMobileCart();
 		return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'mobile_cart' => $MobileCart]);
	 }
	 public function DecreaseCart(request $request)
	 {
	 	$Cart = Session::get('Cart');
	 	$id = $request->product_id;
	 	$Cart[$id]['product_qty']--;
 		$Cart[$id]['total_price'] = $Cart[$id]['product_price']*$Cart[$id]['product_qty'];
 		Session::put('Cart', $Cart);
 		$CartInformation = $this->CartPageUpdate();
 		$JsonEncodeCart = json_encode($CartInformation);
 		$JsonDecodeCart = json_decode($JsonEncodeCart);
 		$Information =  $this->GetCart();
 		$MobileCart =  $this->getMobileCart();
 		$MobileCart =  $this->getMobileCart();
 		return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'CartInformation' => $JsonDecodeCart->original->CartInformation, 'cart_total' =>$JsonDecodeCart->original->CartTotal, 'mobile_cart' => $MobileCart]);
	 }
	 public function RemoveItemFromCart(request $request)
	 {
	 	$Cart = Session::get('Cart');
	 	unset($Cart[$request->product_id]);
	 	Session::put('Cart', $Cart);
	 	$Information =  $this->GetCart();
	 	$MobileCart =  $this->getMobileCart();
	 	$CartInformation = $this->CartPageUpdate();
 		$JsonEncodeCart = json_encode($CartInformation);
 		$JsonDecodeCart = json_decode($JsonEncodeCart);
	 	return response()->json(['message' => 'Cart Updated..', 'data' => $Cart, 'Information' =>$Information, 'CartInformation' => $JsonDecodeCart->original->CartInformation, 'cart_total' =>$JsonDecodeCart->original->CartTotal, 'mobile_cart' => $MobileCart]);
	 }
	 public function GetAttributeImage(request $request)
	 {
	 	$product_id = $request->input('product_id');
	 	$attribute_value = $request->input('attribute_value');

	 	$response = DB::table('productattributes')->where('product_id',$product_id)->where('attribute_value',$attribute_value)->first();
	 	$image = url('/').'/public/Admin/AttributeImage/'.$response->attribute_image;
	 	$price = $response->attribute_price;
	 	$Attribute_Image = $response->attribute_image;
	 	return response()->json(['image'=>$image, 'price'=>$price, 'attribute_image' => $Attribute_Image]);
	 }	
	 public function AboutUs()
	 {
	 	return view('User/Pages/AboutUs');
	 }
	 public function ContactUs()
	 {
	 	return view('User/Pages/ContactUs');
	 }
	 public function CallUs(request $request){
	 	// return $request->all();
	 	if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/CallImage');
            $image->move($destinationPath, $image_name);
        }
        else
        {
             $image_name = 'dummy.jpg';
        }
	 	$email = $request->email;
        $name = $request->name;
        $mobile = $request->mobile;
        $message = $request->message;
        $date = $request->date;
        $location = $request->location;
        $image = url('/')."/Admin/CallImage/".$image_name;

        $details = [
            'email' => $email,
            'name' => $name,
            'mobile' => $mobile,
            'message' => $message,
            'date' => $date,
            'location' => $location,
            'image' => $image
        ];

        Mail::to('sknausat97@gmail.com')->send(new MyTestMail($details));
        return back()->with('success-message','We will get back to you soon..');
	 }
	 public function Contact(request $request)
	 {
	 	$email = $request->email;
        $name = $request->name;
        $mobile = $request->mobile;
        $message = $request->message;
        $date = $request->date;

        $details = [
            'email' => $email,
            'name' => $name,
            'mobile' => $mobile,
            'message' => $message,
            'date' => $date
        ];

        Mail::to('sknausat97@gmail.com')->send(new MyTestMail2($details));
        return response()->json(['message' => 'We will get back to you soon...']);
	 }
	 public function UserLogin()
	 {
	 	return view('User/Pages/Login');
	 }
	 public function UserRegister(request $request)
	 {
	 	return view('User/Pages/Register');
	 }
	 public function UserRegistration(request $request)
	 {
	    $__isUserExist = DB::table('users')->where('email',$request->email)->count();
	    if($__isUserExist>0)
	    {
	        return back()->with('error-message','Email is alreay exist');
	    }
	 	$User = new User;
	 	$User->name = $request->name;
	 	$User->mobile = $request->mobile;
	 	$User->email = $request->email;
	 	$User->password = bcrypt($request->password);
	 	$User->user_type = $request->user_type;
	 	$User->save();
	 	return redirect('user-login')->with('success-message','Your are now registered');
	 }
	 public function Signin(request $request)
	 {
	 	$credentials = $request->only('email', 'password', 'user_type');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            Session::put('user',$request->email);
            return redirect()->intended('/');
        }
        else
        {
        	return redirect()->back()->with('error-message','User ID or Password is incorrect');
        }
	 }
	 public function Profile()
	 {
	 	$Shippings = DB::table('shippings')->where('user_id',Auth::user()->id)->select('order_id','total_price','order_status')->where('payment_status', '=', 'paid')->orderBy('id','DESC')->get();
	 	$isShipping = DB::table('shippings')->where('user_id',Auth::user()->id)->count();
	 	return view('User/Pages/Profile', compact('Shippings','isShipping'));
	 }
	 public function UpdatProfile(request $request)
	 {
	 	$user = User::find(Auth::user()->id);
	 	$user->name = $request->name;
	 	$user->mobile = $request->mobile;
	 	$user->email = $request->email;
	 	$user->address = $request->address;
	 	$user->save();
	 	return redirect()->back()->with('success-message','Updated Successfully..');
	 }
	 public function UserLogout()
	 {
	 	Session::forget('user');
	 	Auth::logout();
	 	return back();
	 }
	 public function RatingsSubmit(request $request)
	 {
	 	$number = DB::table('ratings')->where('product_id',$request->product_id)->orderBy('id','DESC')->first();
	 	if(!$number)
	 	{
	 		$totalRatings = 0;
	 	}
	 	else
	 	{
	 		$totalRatings = $number->total_ratings;
	 	}
	 	
	 	$Ratings = new Rating;
	 	$Ratings->product_id = $request->product_id;
	 	$Ratings->name = $request->name;
	 	$Ratings->email = $request->email;
	 	$Ratings->comment = $request->comment;
	 	$Ratings->total_ratings = $request->ratings + $totalRatings;
	 	$Ratings->save();
	 	return response()->json('We will review your ratings...');
	 }
	 public function Checkout()
	 {
	 	return view('User/Pages/Checkout');
	 }
	 public function GetStates(request $request)
	 {
	 	$States = DB::table('states')->where('country_id',$request->country_id)->get();
	 	$count = count($States);
	 	
	 	if($count != 1)
	 	{
	 		$data = '</label><select name="state" class="form-control" id="state" onchange="getPayment()" required><option value="">Select State</option>';
		 	foreach ($States as $key => $State) {
		 	 	$data .='<option value="'.$State->id.'">'.$State->name.'</option>';
		 	 } 
			$data.='</select>'; 
	 	}
	 	else
	 	{
	 		$data = '</label><select name="state" class="form-control" id="state" onclick="getPayment()">';
		 	foreach ($States as $key => $State) {
		 	 	$data .='<option value="'.$State->id.'">'.$State->name.'</option>';
		 	 } 
			$data.='</select>'; 
	 	}

	 	return response()->json($data);
	 }
	 public function GetPayment(request $request)
	 {
	 	$Cart = Session::get('Cart');
	 	$CartTotal = 0;
		foreach($Cart as $Carts)
		{
		  $CartTotal = $CartTotal+$Carts['total_price'];
		}

	 	$country = $request->input('country');
	 	$state = $request->input('state');
	 	$total = $request->input('sub_total');
	 	
	 	if($country == 230 && $state == 3866){ // If Inside UK and state is london
	 		$Delivery_type = '<label>Delivery Type*</label><select name="delivery_type" class="form-control" onchange="getDeliveyType(this.value)" required>
                          <option value="">Select</option>
                          <option value="postal">Postal</option>
                          <option value="home_delivery">Home Delivery</option>
                        </select>';
	 		return response()->json(['delivery_type' =>$Delivery_type]);
	 	}
	 	if($country == 230) // If only Inside Uk and state is not in london
	 	{
	 		$Delivery_type = '<label>Delivery Type*</label><input type="text" class="form-control" name="delivery_type" value="POSTAL" disabled />';
	 		if($total>0 && $total<15)
	 		{
	 			$delivery_charge = 0;
	 		}
	 		elseif($total>15 && $total<120)
	 		{
	 			$delivery_charge = $CartTotal*12.5/100;
	 		}
	 		elseif($total>120 && $total<200)
	 		{
	 			$delivery_charge = $CartTotal*15/100;
	 		}
	 		elseif($total>200)
	 		{
	 			$delivery_charge = $CartTotal*15/100;
	 		}

	 		else{
	 			$delivery_charge = null;
	 		}
	 		$total_amount = $CartTotal+$delivery_charge;
	 		return response()->json(['delivery_type' => $Delivery_type, 'payment' =>(int)(($delivery_charge*100))/100,'total' => (int)(($total_amount*100))/100]);
	 	}
	 	else // If outside of UK
	 	{
	 		$Delivery_type = '<label>Delivery Type*</label><input type="text" class="form-control" name="delivery_type" value="POSTAL" disabled />';
	 		if($total>0 && $total<15)
	 		{
	 			$delivery_charge = $CartTotal*10/100;
	 		}
	 		elseif($total>15 && $total<120)
	 		{
	 			$delivery_charge = $CartTotal*17.5/100;
	 		}
	 		elseif($total>120)
	 		{
	 			$delivery_charge = $CartTotal*20/100;
	 		}
	 		$total_amount = $CartTotal+$delivery_charge;
	 		return response()->json(['delivery_type' => $Delivery_type, 'payment' =>(int)(($delivery_charge*100))/100,'total' => (int)(($total_amount*100))/100]);
	 	}
	 }


	 public function GetPaymentLondon(request $request){
	 	// return $request->all();exit;
	 	$country = $request->input('country');
	 	$state = $request->input('state');
	 	$total = $request->input('sub_total');

	 	$Cart = Session::get('Cart');
	 	$CartTotal = 0;
		foreach($Cart as $Carts)
		{
		  $CartTotal = $CartTotal+$Carts['total_price'];
		}

	 	if($request->type == 'postal')
	 	{
	 		$Delivery_type = '<input type="text" class="form-control" name="delivery_type" value="POSTAL" disabled />';
	 		$delivery_charge = 0;
	 		if($total>0 && $total<10)
	 		{
	 			$delivery_charge = 0;
	 		}
	 		elseif($total>15 && $total<120)
	 		{
	 			$delivery_charge = $CartTotal*12.5/100;
	 		}
	 		elseif($total>120 && $total<200)
	 		{
	 			$delivery_charge = $CartTotal*15/100;
	 		}
	 		elseif($total>200)
	 		{
	 			$delivery_charge = $CartTotal*15/100;
	 		}
	 		$total_amount = $CartTotal+$delivery_charge;
	 		return response()->json(['delivery_type' => $Delivery_type, 'payment' =>(int)(($delivery_charge*100))/100,'total' => (int)(($total_amount*100))/100]);
	 	}

	 	if($request->type == 'home_delivery')
	 	{
	 		$Delivery_type = '<input type="text" class="form-control" name="delivery_type" value="HOME DELIVERY" disabled />';
	 		if($total>0 && $total<150)
	 		{
	 			$delivery_charge = $CartTotal*20/100;
	 		}
	 		elseif($total>150 && $total<300)
	 		{
	 			$delivery_charge = $CartTotal*30/100;
	 		}
	 		
	 		elseif($total>300)
	 		{
	 			$delivery_charge = $CartTotal*40/100;
	 		}
	 		$total_amount = $CartTotal+$delivery_charge;
	 		return response()->json(['delivery_type' => $Delivery_type, 'payment' =>(int)(($delivery_charge*100))/100,'total' => (int)(($total_amount*100))/100]);
	 	}
	 }

	 public function CheckoutSubmit(request $request)
	 {

	   // return $request->all();exit;
	    $LastInsertedId = DB::table('shippings')->orderBy('id','DESC')->first();
	    if(isset($LastInsertedId))
	    {
	        $LastInsertedIds = $LastInsertedId->id+1;
	    }
	    else{
	        $LastInsertedIds = 1;
	    }
	    
	 	$Cart = Session::get('Cart');
	 	$UserInfo = json_encode(Auth::user());
	 	$ShippingInfo = json_encode($request->all());
	 	$Carts = json_encode($Cart);

	 	$Shipping = new Shipping;
	 	$Shipping->order_id = 'EMS'.'0000'.$LastInsertedIds;
	 	$Shipping->product_info = $Carts;
	 	$Shipping->user_info = $UserInfo;
	 	$Shipping->user_id = Auth::user()->id;
	 	$Shipping->shipping_info = $ShippingInfo;
	 	$Shipping->total_price = $request->total;
	 	$Shipping->order_status = "pending";
	 	$Shipping->save();

    	Session::put('amount',$request->total);

        $TotalForPaypal = $Shipping->total_price;
	 	foreach($Cart as $Carts)
	 	{
	 		$product_attributes = array(
		 		'attribute_name' => $Carts['product_attribute_name'],
		 		'attribute_value' => $Carts['product_attribute_value'],
		 		'attribute_image' => $Carts['product_attribute_image']
		 	);

	 		$Order  = new Order;
		 	$Order->order_id = $Shipping->order_id;
		 	$Order->product_id = $Carts['product_id'];
		 	$Order->product_name = $Carts['product_name'];
		 	$Order->product_qty = $Carts['product_qty'];
		 	$Order->product_price = $Carts['product_price'];
		 	$Order->product_attributes = json_encode($product_attributes);
		 	$Order->save();
	 	}
	 	$Orders = DB::table('orders')->where('order_id',$Shipping->order_id)->get();
	 	$LastOrder  = DB::table('shippings')->orderBy('id','DESC')->first();
	 	Session::put('Orders',$Orders);
	 	Session::put('Shipping',$Shipping);
	 	Session::put('order_id',$LastOrder->id);
	 	if($request->payment_method == 'paypal')
	 	{
	 	    return redirect('paypal')->with( ['TotalForPaypal' => $TotalForPaypal] );
	 	}
	 	elseif($request->payment_method == 'square')
	 	{
	 	    return redirect('square');
	 	}
	 	
	 	DB::table('shippings')->where('id',$LastOrder->id)->update(['payment_status' => 'paid']);
	 	Session::forget('Cart');
	 	return redirect('thankyou')->with( ['Orders' => $Orders, 'Shipping' => $Shipping] );
	 }
	 public function ThankYou()
	 {
	 	return view('User/Pages/ThankYou');
	 }
	 
	 public function Square()
	 {
	 	return view('User/Pages/Form');
	 }

	 public function Charge(request $request)
	 {
	 	// echo $request->input('nonce');exit;
	 	$nonce = $request->input('nonce');
	 	$price = Session::get('amount');
// 	 	return $price;exit;
	 	$amount = $price*100; //Is in USD currency and is in smallest denomination (cents). ($amount = 5000 == 50 Dollars)

		// nonce reference => https://developer.squareup.com/docs/payment-form/payment-form-walkthrough
		// single-use token (nonce) generated by the client-side javascript library
		// $formNonce = $request->input('nonce');

		$location_id = 'WJNRFSZK90GAV'; //$location_id is id of a location from Square

		// optional, default=USD
		$currency = 'GBP'; //available currencies => https://developer.squareup.com/reference/square/objects/Currency

		// optional
		$note = 'This is my first payment to Square with this library'; //note about this charge

		// optional
		$reference_id = '25'; //some kind of reference id to an object or resource

		$options = [
		  'amount' => $amount,
		  'source_id' => $nonce,
		  'location_id' => $location_id,
		  'currency' => $currency,
		  'note' => $note,
		  'reference_id' => $reference_id
		];

		Square::charge($options);
		return $options;
	 }
	 public function output()
	 {
	 	$Order_id = Session::get('order_id');
	 	DB::table('shippings')->where('id',$Order_id)->update(['payment_status' => 'paid']);
	 	Session::forget('Cart');
	 	$Orders = Session::get('Orders');
	 	$Shipping = Session::get('Shipping');
	 	return redirect('thankyou')->with( ['Orders' => $Orders, 'Shipping' => $Shipping] );
	 }
	 
	  public function ReArrangeGallery(request $request)
     {
         $Product_Gallery = DB::table('productgalleries')->where('product_id',$request->product_id)->get();
         $figure='<div class="product-gallery pg-vertical sticky-sidebar"
                      data-sticky-options="minWidth: 767">
                          <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">';
        foreach($Product_Gallery as $Product_Galleries)
        {
         $figure.='
            <figure class="product-image">
                <div class="product-image-gallery">
                   <img src="'.url('/').'/public/Admin/GalleryImage/'.$Product_Galleries->product_image.'"
                      data-zoom-image="'.url('/').'/public/Admin/GalleryImage/'.$Product_Galleries->product_image.'" width="800" height="900">
                </div>
             </figure>
         ';   
        }
        $figure.='</div>
                  <div class="product-thumbs-wrap">
                     <div class="product-thumbs">';
        foreach($Product_Gallery as $Product_Galleries)
        {
            $figure.='<div class="product-thumb active">
                           <img src="'.url('/').'/public/Admin/GalleryImage/'.$Product_Galleries->product_image.'" alt="product thumbnail"
                              width="109" height="122">
                        </div>';
        }
            $figure.='</div>
             <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
             <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
          </div>
          <div class="product-label-group">
             <label class="product-label label-new">new</label>
          </div>
       </div>';
         
         return response()->json(['figure' =>$figure]);
     }
}
