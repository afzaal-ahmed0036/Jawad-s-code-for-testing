<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;
    
class ProductController extends Controller
{ 
 
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function createProduct()
    {
        return view('admin.products.create');
    }
    

    public function storeProduct(Request $request)
    {
    
        request()->validate([
            'name'     => 'required',
            'image'    => 'required|mimes:jpg,png,jpeg',
            'quantity' => 'required',
            'price'    => 'required',
            'detail'   => 'required',
        ]);
    
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,200)->save('image/product/'.$name_gen);

        $last_img = 'image/product/'.$name_gen;

        Product::insert([
            // 'slug' => SlugService::createSlug(Product::class, 'slug', $request->name),
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image'   =>  $last_img,
            'detail'  => $request->detail,
            'created_at' => Carbon::now()
        ]);
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
 
    public function Productshow($id)
    {
        $product = Product::find($id);
        return view('admin.products.show',compact('product'));
    }
    
    public function ProductEdit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));
    }
    
 
    public function updateProduct(Request $request, $id)
    {
         request()->validate([
            'name'     => 'required',
            'quantity' => 'required',
            'price'    => 'required',
            'detail'   => 'required',
        ]);
    
        $image = $request->file('image');
if($image)
{

    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,200)->save('image/product/'.$name_gen);

    $last_img = 'image/product/'.$name_gen;

    Product::find($id)->update([
        // 'slug' => SlugService::createSlug(Product::class, 'slug', $request->name),
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'image'   =>  $last_img,
        'detail'  => $request->detail,
        'created_at' => Carbon::now()
    ]);
    
    return redirect()->route('products.index')
                    ->with('success','Product updated successfully');
}
else{

    Product::find($id)->update([
        // 'slug' => SlugService::createSlug(Product::class, 'slug', $request->name),
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'detail'  => $request->detail,
        'created_at' => Carbon::now()
    ]);
    return redirect()->route('products.index')
    ->with('success','Product updated successfully');
}

    }
    

    public function ProductDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

    // user side functions 
    public function allProduct()
    {
        $products = Product::all();
        return view('pages.product' , compact('products'));
    }
    public function EachProduct($id)
    {
        $product = Product::find($id);
        return view('pages.productDetail' , compact('product'));
    }
}