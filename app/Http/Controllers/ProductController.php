<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\photho;
use Illuminate\Contracts\Support\Jsonable;
use App\size;
use Yajra\Datatables\Datatables;
use App\sub_category;
use Illuminate\Support\Facades\DB;
use App\Traits\UploadTrait;


class ProductController extends Controller
{
     use UploadTrait;   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $photho=photho::find($request->id);
        $product=product::all();
        $product=$product->unique('company');
        $subcategories =sub_category::all();
        return view('product.create',['photho'=>$photho,'products'=>$product,'subcategories'=>$subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product=new product;
        $product->design_no=$request->design_no;
        $product->company=$request->company;
        $product->category=$request->category;
        $product->sub_categories_id=$request->sub_category_girl;      
        $product->base_price=$request->base_price;
        $product->photho_path=$request->path;
        $product->save();
        $incr_price=$request->inc_price;
        $base_price=$request->base_price;
        $sizes=$request->size;
        for ($i=0; $i <count($sizes) ; $i++) { 
            $price=($i*$incr_price)+$base_price;
            size::create(['size'=>$sizes[$i],'price'=>$price ,'product_id'=>$product->id]);

        }
       
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
     public function addproduct(){
        // dd("jdfhcjn");
        $product=product::all();
        $product=$product->unique('company');
        $subcategories =sub_category::all();
        return view('product.createw',['products'=>$product,'subcategories'=>$subcategories]);
    }
         public function storeproduct(Request $request){
        // dd($request->all());
        if($request->hasFile('photho')){
            $photho=$this->uploadOne($request->file('photho')); 
        }
         $product=new product;
        $product->design_no=$request->design_no;
        $product->company=$request->company;
        $product->category=$request->category;
        $product->sub_categories_id=$request->sub_category_girl;      
        $product->base_price=$request->base_price;
        $product->photho_path=$photho->path;
        $product->save();
        $incr_price=$request->inc_price;
        $base_price=$request->base_price;
        $sizes=$request->size;
        for ($i=0; $i <count($sizes) ; $i++) { 
            $price=($i*$incr_price)+$base_price;
            size::create(['size'=>$sizes[$i],'price'=>$price ,'product_id'=>$product->id]);

        }
       
        return redirect('/product');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $product=product::all();
        return Datatables::of($product)
            ->addColumn('thumbnail', function (product $product) {
            return '<img width=60px; height=80px; src="'.$product->photho_path.'">';
            })
            ->addColumn('size', function(product $product) {
                $size=$product->size->pluck('size');
                return $size;
            })
            ->addColumn('sub_category', function(product $product) {
                $sub_category= $product->subcategory->sub_category;
                return $sub_category;
            })
            ->addColumn('price', function(product $product) {
                $size=$product->size->pluck('price');
                return $size;
            })
            ->addColumn('delete', function(product $product) {
                return '<button id="'.$product->id.'" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function(product $product) {
                return '<button id="'.$product->photho_path.'" class="view fa fa-search-plus btn-sm btn-success" data-toggle="modal" data-target="#viewModal"></button>';
            })
            ->addColumn('edit', function(product $product) {
                return '<button id="'.$product->id.'" class="add fa fa-plus btn-sm btn-success" data-toggle="modal" data-target="#addModal"></button>';
            })
            ->rawColumns(['delete','view', 'thumbnail','edit'])
            ->make(true);
    }

    public function search(Request $request){
        if ($request->sub_category_girl===null) {
          $request['sub_category']=$request->sub_category_boy; 
        }
        else{
            $request['sub_category']=$request->sub_category_girl; 
        }
    //     $item=$request->size;
    // $product=product::with(['size' => function ($query) {
    //     $query->where('size', '=',28);
    // }])
    // ->Categoryof($request->category)->
    // SubCategoryof($request->sub_category)
    // ->orderBy('created_at')->dd();
    // ddd($product);
$product = DB::table('products')
            ->join('sizes', 'products.id', '=', 'sizes.product_id')
            ->join('sub_category', 'products.sub_categories_id', '=', 'sub_category.id')
            ->select('products.*', 'sizes.*','sub_category.sub_category')
            ->where('category',$request->category)
            ->where('sub_category',$request->sub_categor)
            ->whereIn('size',$request->size)
            // ->orderBy('created_at','desc')
            ->get();
        // ddd($product);

        return view('search',['product'=>$product]);
    }
   
   
}
