<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product = Product::create($request->all());
        return redirect()->route('product.index')
        ->with('success' , 'Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product->update($request->all());
        return redirect()->route('product.index')
        ->with('success','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
        ->with('success' , 'Product Deleted successfully');
    }

    public function trash(){
        // $products = Product::withTrashed()->latest()->paginate(4); من خلالها سيتم إحضار الأعمدة المحذوفة وغير المحذوفة من الأخير للأسفل
        $products = Product::onlyTrashed()->latest()->paginate(4); // من خلالها سيتم فقط إحضاء الأعمدة المحذوفة فقط
        return view('product.trash' , compact('products'));
    }
    public function softDelete($id){
        // يأخذ id لمعرفة أي product أريد أن أقوم بحذفه
        //نريد أن يدخل للـ product table ويقوم بإيجاد الـ id ومن ثم يتم حذفه
        // وسيتم الحذف من خلال الـ softDeletes كما هو معرف من خلال الـ Model
        $product = Product::find($id)->delete();
        return redirect()->route('product.index')
        ->with('success','product softDeleted successfully');
    }
        public function backFromTrash($id){
        // حيث أنه سيقوم بالبحث بين الملفات المحذوفة فقط
        // ومن ثم البحث عن الـ id المساوي للـ id الذي تم إرساله
        // وإيجاد أول عنصر مطابق
        // ومن ثم استعادته
        $product = Product::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->route('product.index')
        ->with('success','Product Backed Successfully');
    }

    public function deleteForEver($id){
        // نريد أن يتم البحث بين المنتجات التي تم حذفها
        // والمطابقة مع الـ Id الذي تم إرساله للـ function
        $product = Product::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('Trash')
        ->with('success' , 'Product Deleted successfully');;

    }
}
