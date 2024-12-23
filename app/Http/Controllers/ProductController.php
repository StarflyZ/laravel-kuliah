<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        foreach ($products as $p) {
            $directory = public_path('products/' . $p->product_id);
            if (File::exists($directory)) {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $p['filenames'] = $filenames;
            }
        }
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.formcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->product_id = $request->get('product_id');
        $data->name = $request->get('name');
        $data->save();

        return redirect()->route('product.index')->with('status', 'Data produk berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->save();
        return redirect()->route('product.index')->with('status', 'Data product berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('product.index')->with('status', 'Data product sukses dihapus !');
        } catch (\PDOException $e) {
            return redirect()->route('product.index')->with('status', 'Data product gagal dihapus !');
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('product.getEditForm', compact('product'))->render()
        ), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'type data is removed !'
        ), 200);
    }

    public function delPhoto(Request $request)
    {
        File::delete(public_path() . "/" . $request->filepath);
        return redirect()->route('products.index')->with('status', 'photo deleted');
    }
}
