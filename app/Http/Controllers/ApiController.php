<?php

namespace App\Http\Controllers;
use App\Productattribute;
use App\Productgallery;
use App\Subcategory;
use App\Category;
use App\Product;
use App\User;
use Session;
use Storage;
use Auth;
use DB;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function GetCategories(){
        $Data = [];
        $Categories = DB::table('categories')->orderBy('id','DESC')->get();
        foreach($Categories as $Category)
        {
           $Data[] = array(
                'category_id' => $Category->id,
                'category_name' => $Category->category_name,
                'category_image' => url('/')."/Admin/CategoryImage/".$Category->category_image
               ); 
        }
        return response()->json(['data' => $Data, 'status' => 200]);
    }   
    public function GetTopCategories(){
        $Data = [];
        $Categories = DB::table('categories')->orderBy('id','ASC')->paginate(6);
        foreach($Categories as $Category)
        {
           $Data[] = array(
                'category_id' => $Category->id,
                'category_name' => $Category->category_name,
                'category_image' => url('/')."/Admin/CategoryImage/".$Category->category_image
               ); 
        }
        return response()->json(['data' => $Data, 'status' => 200]);
    }   
    public function productsByCategory($id)
    {
        $Data = [];
        $Products = DB::table('products')->where('category_id',$id)->orderBy('id','ASC')->get();
        foreach($Products as $Product)
        {
           $Data[] = array(
                'product_id' => $Product->id,
                'product_price' => $Product->product_price,
                'product_spl_price' => $Product->product_spl_price, 
                'product_name' =>substr($Product->product_name,0,40),
                'product_image' => url('/')."/Admin/ProductImage/".$Product->product_image,
                'product_title' => substr($Product->product_description,0,100), 
               );
        }
        return response()->json(['data' => $Data, 'status' => 200]);
    }
    public function productsById($id)
    {
        $Data = [];
        $Galleries = [];
        $Products = DB::table('products')->where('id',$id)->orderBy('id','ASC')->first();
        $Products_Category = DB::table('categories')->where('id',$Products->category_id)->first();
        $Products_gallery = DB::table('productgalleries')->where('product_id',$id)->orderBy('id','ASC')->get();
        foreach($Products_gallery as $Products_galleries)
        {
            $Galleries[] = url('/').'/Admin/GalleryImage/'.$Products_galleries->product_image;
        }
        $Data = array(
                'product_id' => $Products->id,
                'product_price' => $Products->product_price,
                'product_spl_price' => $Products->product_spl_price,
                'product_name' =>substr($Products->product_name,0,40),
                'product_category' =>$Products_Category->category_name,
                'product_image' => url('/')."/Admin/ProductImage/".$Products->product_image,
                'product_title' => $Products->product_description, 
                'product_gallery' => $Galleries
               );
        return response()->json(['data' => $Data, 'status' => 200]);
    }
    
} 
 