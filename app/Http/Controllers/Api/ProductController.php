<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        return Product::paginate(10);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function showById(string $id)
    {
        return Product::findOrFail($id);
    }

    public function updateById(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json(["message" => "Editado com sucesso"], 200);
    }

    public function deleteById(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(["message" => "Deletado com sucesso"], 200);
    }
}
