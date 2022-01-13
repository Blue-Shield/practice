<?php

namespace App\Http\Controllers;
use App\Productattribute;
use App\Seosection;
use App\Productgallery;
use App\Attribute;
use App\Subcategory;
use App\Category;
use App\Product;
use App\User;
use Session;
use Storage;
use Auth;
use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function AdminRegister()
	{
		return view('Admin/Layout/Register');
	}
    public function AdminHome(){
    	return view('Admin/Pages/Home');
    } 
    public function AdminRegistration(request $request)
    {
    	$User = new User;
    	$User->name = $request->name;
    	$User->mobile = $request->mobile;
    	$User->email = $request->email;
    	$User->password = bcrypt($request->password);
    	$User->save();

    	return redirect('admin-login');
    }	

    public function AdminLogin()
    {
    	return view('Admin/Layout/Login');
    }
    public function AdminSignup(request $request)
    {
    	 $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        	Session::put('admin',$request->email);
            return redirect()->intended('admin-home');
        }
        else{
        	return back()->with('error-message','Invalid User ID or Password');
        }
    }
    public function AdminLogout()
    {
    	Auth::logout();
    	Session::forget('admin');
    	return redirect('admin-login');
    }
    public function AdminCategory()
    {
    	return view('Admin/Pages/Category');
    }
    public function AdminAddCategory()
    {
        return view('Admin/Pages/AddCategories');
    }
    public function AdminCategoryAdd(request $request)
    {
        $Category = new Category;
        if($request->hasfile('category_image'))
        {
            $image = $request->file('category_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/CategoryImage');
            $image->move($destinationPath, $image_name);
        }
        else
        {
             $image_name = 'dummy.jpg';
        }
        $Category->category_name = $request->category_name;
        $Category->category_image = $image_name;
        $Category->save();
        return redirect('admin-category')->with('success-message','Category Added Successfully..');
    }
    public function AdminEditCategory($id, request $request)
    {   
        $Category = DB::table('categories')->where('id',$id)->first();
        return view('Admin/Pages/EditCategory',compact('Category'));
    }
    public function AdminUpdateCategory($id, request $request)
    {
        $Category = Category::find($id);
        if($request->hasfile('category_image'))
        {
            $image = $request->file('category_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/CategoryImage');
            $image->move($destinationPath, $image_name);
            $Category->category_image = $image_name;
        }
        $Category->category_name = $request->category_name;
        $Category->save();
        return redirect('admin-category')->with('success-message','Category Edited Successfully..');
    }
    public function AdminDeleteCategory($id){
        $Delete = DB::table('categories')->where('id',$id)->delete();
        return redirect('admin-category')->with('success-message','Category Deleted Successfully');
    }
    public function AdminSubcategory() 
    {
        return view('Admin/Pages/Subcategory');
    }
    public function AdminAddSubcategory()
    {
        return view('Admin/Pages/AddSubcategory');
    }
    public function AdminSubcategoryAdd(request $request)
    {
        $Subcategory = new Subcategory;
        if($request->hasfile('subcategory_image'))
        {
            $image = $request->file('subcategory_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/SubcategoryImage');
            $image->move($destinationPath, $image_name);
        }
        else
        {
             $image_name = 'dummy.jpg';
        }
        $Subcategory->subcategory_name = $request->subcategory_name;
        $Subcategory->category_id = $request->category_id;
        $Subcategory->subcategory_image = $image_name;
        $Subcategory->save();
        return redirect('admin-sub-category')->with('success-message','Subcategory Added Successfully..');
    }
    public function AdminEditSubcategory($id)
    {
        $Subcategory = DB::table('subcategories')->where('id',$id)->first();
        return view('Admin/Pages/EditSubcategory', compact('Subcategory'));
    }
    public function AdminUpdateSubcategory($id, request $request)
    {
        $Subcategory = Subcategory::find($id);
        if($request->hasfile('subcategory_image'))
        {
            $image = $request->file('subcategory_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/SubcategoryImage');
            $image->move($destinationPath, $image_name);
            $Subcategory->subcategory_image = $image_name;
        }
        $Subcategory->subcategory_name = $request->subcategory_name;
        $Subcategory->category_id = $request->category_id;
        $Subcategory->save();
        return redirect('admin-sub-category')->with('success-message','Subcategory Updated Successfully..');
    }
    public function AdminDeleteSubcategory($id)
    {
        $Delete = DB::table('subcategories')->where('id',$id)->delete();
        return redirect('admin-sub-category')->with('success-message','Subcategory Deleted Successfully');
    }
    public function AdminGetProducts()
    {
        return view('Admin/Pages/AllProducts');
    }
    public function AddProduct()
    {
        return view('Admin/Pages/AddProduct');
    }
    public function GetSubcategory(request $request)
    {
       $Category = DB::table('categories')->where('id',$request->input('cat_id'))->first();
       $Subcategories = DB::table('subcategories')->where('category_id',$Category->id)->get();

       $data = '<select class="form-control" name="subcategory_id">';
       foreach($Subcategories as $Subcategory)
       {
          $data.='<option value="'.$Subcategory->id.'">'.$Subcategory->subcategory_name.'</option>';
       }
       $data .= '</select>';
       return response()->json($data);
    }
    public function ProductAdd(request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";exit;
        $Product = new Product;
        if($request->hasfile('product_image'))
        {
            $image = $request->file('product_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/ProductImage');
            $image->move($destinationPath, $image_name);
        }
        else
        {
             $image_name = 'dummy.jpg';
        }
        $Product->product_name = $request->product_name;
        $Product->type = $request->type;
        $Product->product_price = $request->product_price;
        $Product->product_spl_price = $request->product_spl_price;
        $Product->category_id = $request->category_id;
        $Product->subcategory_id = $request->subcategory_id;
        $Product->product_short_description = $request->product_short_description;
        $Product->product_description = $request->product_description;
        $Product->product_video_description = $request->product_video_description;
        $Product->product_image = $image_name;
        $Product->save();

        $lastId = DB::table('products')->orderBy('id', 'DESC')->first();        
        // if($request->type == 'simple')
        // {
           if($files = $request->file('image_gallery'))
            {
                foreach($files as $key=>$value)
                {
                    $Gallery = new ProductGallery;
                    $image = $value;
                    $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/Admin/GalleryImage');
                    $image->move($destinationPath, $image_name);
                    $Gallery->product_id = $lastId->id;
                    $Gallery->product_image = $image_name;
                    $Gallery->save();
                }
            } 
        // }
        // Attributes functionality
        // elseif($request->type == 'variable') 
        // {
            foreach ($request->attribute as $key => $attributes) {
                $ProductAttribute = new ProductAttribute;
                if(!empty($attributes['attr_image']))
                {
                    $image = $attributes['attr_image'];
                    $image_names = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/Admin/AttributeImage');
                    $image->move($destinationPath, $image_names);
                }
                // else{
                //     $image_names = "dummy.png";
                // }
                $ProductAttribute->product_id = $lastId->id;
                $ProductAttribute->attribute_name = $request->attribute_name;
                $ProductAttribute->attribute_value = $attributes['attr_name'];
               if(isset($image_names))
                {
                     $ProductAttribute->attribute_image = $image_names;
                      $ProductAttribute->attribute_price = $attributes['attr_price'];
                    $ProductAttribute->save();
                }
            }
        // }

        return redirect('get-products')->with('success-message','Product Added Successfully..');
    }

    public function EditProduct($id)
    {
        $Product = DB::table('products')->where('id',$id)->first();
        $Attributes = DB::table('productattributes')->where('product_id',$id)->get();
        $Gallery = DB::table('productgalleries')->where('product_id',$id)->get();
        return view('Admin/Pages/EditProduct',compact('Product','Attributes','Gallery'));
    }
    public function EditProductAttribute($id)
    {
        $Attribute = DB::table('productattributes')->where('id',$id)->first();
        return view('Admin/Pages/EditProductAttribute',compact('Attribute'));
    }
    public function UpdateAttribute($id, request $request){
        $ProductAttribute = ProductAttribute::find($id);
        if($request->hasfile('attribute_image'))
        {
            $image = $request->file('attribute_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/AttributeImage');
            $image->move($destinationPath, $image_name);
            $ProductAttribute->attribute_image = $image_name;
        }
        $ProductAttribute->attribute_name = $request->attribute_name;
        $ProductAttribute->attribute_value = $request->attribute_value;
        $ProductAttribute->attribute_price = $request->attribute_price;
        $ProductAttribute->save();

        $Product = DB::table('products')->where('id',$ProductAttribute->product_id)->first();
        $Attributes = DB::table('productattributes')->where('product_id',$ProductAttribute->product_id)->get();
        $Gallery = DB::table('productgalleries')->where('product_id',$ProductAttribute->product_id)->get();
        return view('Admin/Pages/EditProduct',compact('Product','Attributes','Gallery'));
    }
    public function DeleteGallery($id)
    {
        $Gallery = DB::table('productgalleries')->where('id',$id)->pluck('product_id');

        $Delete = DB::table('productgalleries')->where('id',$id)->delete();
        
        // $Product = DB::table('products')->where('id',$Gallery)->first();
        // $Attributes = DB::table('productattributes')->where('product_id',$Gallery)->get();
        // $Gallery = DB::table('productgalleries')->where('product_id',$Gallery)->get();
        // return view('Admin/Pages/EditProduct',compact('Product','Attributes','Gallery'));
        return redirect()->back();
    }
    public function UpdateProduct($id, request $request){
        // echo "<pre>";
        // print_r($request->all());
        // echo "<pre>";exit;

        $Product = Product::find($id);
        if($request->hasfile('product_image'))
        {
            $image = $request->file('product_image');
            $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Admin/ProductImage');
            $image->move($destinationPath, $image_name);
            $Product->product_image = $image_name;
        }

        $Product->product_name = $request->product_name;
        $Product->product_price = $request->product_price;
        $Product->product_spl_price = $request->product_spl_price;
        $Product->category_id = $request->category_id;
        $Product->subcategory_id = $request->subcategory_id;
        $Product->product_short_description = $request->product_short_description;
        $Product->product_description = $request->product_description;
        $Product->product_video_description = $request->product_video_description;
        $Product->save();

        // Gallery Section
        if($files = $request->file('image_gallery'))
        {
            foreach($files as $key=>$value)
            {
                $Gallery = new ProductGallery;
                $image = $value;
                $image_name = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/Admin/GalleryImage');
                $image->move($destinationPath, $image_name);
                $Gallery->product_id = $id;
                $Gallery->product_image = $image_name;
                $Gallery->save();
            }
        } 
        // Attrubute Section
        if(!empty($request->attribute))
        {
            foreach ($request->attribute as $key => $attributes) {
                $ProductAttribute = new Productattribute;
                if(!empty($attributes['attr_image']))
                {
                    $image = $attributes['attr_image'];
                    $image_names = rand(10,100).''.time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/Admin/AttributeImage');
                    $image->move($destinationPath, $image_names);
                }
                // else{
                //     $image_names = "dummy.png";
                // }
                $ProductAttribute->product_id = $id;
                $ProductAttribute->attribute_name = $request->attribute_name;
                $ProductAttribute->attribute_value = $attributes['attr_name'];
                if(isset($image_names))
                {
                     $ProductAttribute->attribute_image = $image_names;
                      $ProductAttribute->attribute_price = $attributes['attr_price'];
                    $ProductAttribute->save();
                }
               
            }
        }

        return redirect('get-products')->with('success-message','Product Edited Successfully');
    }
    public function DeleteProductAttribute($id)
    {
        $Delete = DB::table('productattributes')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function DeleteProduct($id)
    {
         DB::table('products')->where('id',$id)->delete();
         DB::table('productattributes')->where('product_id',$id)->delete();
         DB::table('productgalleries')->where('product_id',$id)->delete();
        return redirect('get-products')->with('success-message','Product Deleted Successfully');
    }


    public function AdminCareer()
    {
    	return view('Admin/Pages/Career');
    }
    public function DownloadResume($id)
    {
        $file = DB::table('candidates')->where('id',$id)->first();

    	$infoPath = pathinfo(public_path('Admin/'.$file->resume));
		$extension = $infoPath['extension'];

    	$pathToFile = public_path('Admin/'.$file->resume);
        $name =$file->resume;
        $headers = ['Content-Type: application/pdf'];

        return response()->download($pathToFile, $name, $headers);
    }
    public function GetReport()
    {
        return view('Admin/Pages/Report');
    }
    public function GetPartner()
    {
        return view('Admin/Pages/Partner');
    }
    public function GetOrder()
    {
        return view('Admin/Pages/Orders');
    }
    public function GetOrderDetails($orderId)
     {
        $Shippings = DB::table('shippings')->where('order_id',$orderId)->first();
        $Orders = DB::table('orders')->where('order_id',$orderId)->get();
        return view('Admin/Pages/SingleOrderinfo', compact('Shippings','Orders'));
     }
     public function ChangeOrderStatus($orderId)
     {
        $Update = DB::table('shippings')->where('order_id',$orderId)->update(['order_status' =>'delivered']);

        return back()->with('success-message','Updated successfuly..');
     }
     
     
     
     public function ProductAttributes()
     {
         return view('Admin/Pages/Attributes');
     }
     public function AddAttribute()
     {
        return view('Admin/Pages/AddAttributes'); 
     }
     public function AttributeAdd(request $request)
     {
         $Attribute = new Attribute;
         $Attribute->attribute_name = $request->attribute_name;
         $Attribute->save();
         return redirect('get-attribute')->with('success-message','Attribute added successfully');
     }
     public function EditAttribute($id)
     {
        $Attribute = DB::table('attributes')->where('id',$id)->first();   
        return view('Admin/Pages/EditAttributes',compact('Attribute'));
     }
     public function AttributeUpdate(request $request, $id)
     {
         $Attribute = Attribute::find($id);
         $Attribute->attribute_name = $request->attribute_name;
         $Attribute->save();
         return redirect('get-attribute')->with('success-message','Attribute Updated successfully');
     }
     public function DeleteAttribute($id)
     {
         DB::table('attributes')->where('id',$id)->delete();
         return redirect('get-attribute')->with('success-message','Attribute Deleted Successfully');
     }
     public function SeoSection()
     {
        return view('Admin/Pages/SeoSection');
     }
     public function Seo()
     {
        $Seo = DB::table('seosections')->orderBy('id','DESC')->get();
        return view('Admin/Pages/Seo',compact('Seo'));
     }
     public function AddSeoSection(request $request)
     {
        $Seo = new Seosection;
        $Seo->url = $request->url;
        $Seo->meta_title = $request->meta_title;
        $Seo->meta_description = $request->meta_description;
        $Seo->save();
        return redirect('seo')->with('success-message','Added Successfully');
     }
     public function EditSeo($id)
     {
        $Seo = Seosection::find($id);
        return view('Admin/Pages/EditSeo',compact('Seo'));
     }
     public function UpdateSeo($id,request $request)
     {
        $Seo = Seosection::find($id);
        $Seo->url = $request->url;
        $Seo->meta_title = $request->meta_title;
        $Seo->meta_description = $request->meta_description;
        $Seo->save();
        return redirect('seo')->with('success-message','Added Successfully');
     }
     public function DeleteSeo($id)
     {
        DB::table('seosections')->where('id',$id)->delete();
        return redirect('seo')->with('success-message','Deleted Successfully');
     }
    
} 
 