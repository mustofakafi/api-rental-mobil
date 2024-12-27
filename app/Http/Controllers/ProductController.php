<?php

namespace App\Http\Controllers;

use App\Models\db_mobil;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class productController extends Controller
{
    public function index()
    {
        $rental_mobil = db_mobil::all();
        
        return view('products.index', compact(['rental_mobil']));
    }

    public function create()
    {
        return view('products.create');
    }

    public function simpan(Request $request)
    {
       db_mobil::create($request->all());
       return redirect('/product');
    }
    public function edit($id)
    {
        
        $product = db_mobil::find($id);
        
        if (!$product) {
            return response()->json(['message' => 'Data not found'], 404);
        }

    }
    public function update(Request $request, $id)
    {
        $product = db_mobil::find($id);
        $product->update($request->all());
        return redirect('/product');
    }
    public function destroy($id)
    {
        $product = db_mobil::find($id);
        $product->delete();
        return redirect('/product');
    }
}
