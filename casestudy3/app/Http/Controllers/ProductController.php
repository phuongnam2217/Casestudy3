<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Image;
use App\Models\Material;
use App\Models\Plating;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $categories = Category::all();
        $products = $this->productService->getAll();
        return view('admin.products.index',compact('categories','products'));
    }

    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        $platings = Plating::all();
        return view('admin.products.create',compact('categories','materials','platings'));
    }


    public function store(ProductRequest $request)
    {
        $product = new Product();
        $this->productService->add($request,$product);
        return redirect()->route('products.index')->with('success','Create new product successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = Category::all();
        $materials = Material::all();
        $platings = Plating::all();
        return view('admin.products.edit',compact('product','categories','materials','platings'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->productService->findById($id);

        $this->productService->update($request,$product);

        return redirect()->route('products.index')->with('success','Edit product successfully');
    }


    public function destroy($id)
    {
        $product = $this->productService->findById($id);
        foreach ($product->images as $image){
            unlink('images/'.$image->image);
            $image->delete();
        }
        $product->delete();
        return back()->with('success','Delete Product Successfully');
    }

    public function changeStatus($id)
    {
        $product = $this->productService->findById($id);
        $this->productService->changeStatus($product);
        return back()->with('Change status successfully');
    }

    public function image($id)
    {
        $product = $this->productService->findById($id);
        return view('admin.products.upload',compact('product'));
    }

    public function upload(Request $request,$id)
    {
        $image = new Image();
        $file = $request->file('file');
        $fileName = time().".".$file->extension();
        $file->move(public_path('images'),$fileName);
        $image->image = $fileName;
        $image->product_id = $id;
        $image->save();
    }
    public function removeImage($id,$image_id)
    {
        $image = Image::where('id',$image_id)->where('product_id',$id)->first();
        unlink('images/'.$image->image);
        $image->delete();
        $product = $this->productService->findById($id);
        $output = "";
        foreach ($product->images as $image){
            $output .= '<div class="col-3">'.
                '<div class="card-body">'.
                '<img width="100%" src="'.asset('images')."/".$image->image.'" alt="">'.
                '</div>'.
                '<a href="javascript:void(0)" data-id="'.$product->id.'" data-target="'.$image->id.'" class="text-center d-block remove-image">Remove</a>'.
                '</div>';
        }
        return response()->json($output);
    }

}
