<?php
namespace App\Http\Controllers;

use App\Models\db_mobil;
use Illuminate\Http\Request;

class productApiController extends Controller // Ubah nama class menggunakan PascalCase
{
    public function index()
    {
        $rental_mobil = db_mobil::all();
        return response()->json(['message' => 'Success', 'data' => $rental_mobil]);
    }

    public function show($id)
    {
        $product = db_mobil::find($id);
        if (!$product) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json(['message' => 'Success', 'data' => $product]);
    }

    public function simpan(Request $request)
    {
        $product = db_mobil::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $product]);
    }

    // Method untuk edit/update data
    public function update(Request $request, $id)
    {
    $product = db_mobil::find($id);

    if (!$product) {
        return response()->json(['message' => 'Data not found'], 404);
    }

    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'image_url' => 'required|url',
        'kapasitas_penumpang' => 'required|integer|min:1',
        'tarif_sewa' => 'required|numeric|min:0',
    ]);

    try {
        $product->update($validatedData);
        return response()->json([
            'message' => 'Success',
            'data' => $product,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Update failed',
            'error' => $e->getMessage(),
        ], 500);
    }
}
    // hapus data
    public function destroy($id)
    {
        $product = db_mobil::find($id);
        if (!$product) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Success', 'data' => null]);
    }
}