<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    private $loja;

    public function __construct(Loja $loja)
    {
        $this->loja = $loja;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->loja->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->loja->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     try {
    //         //retorna a loja com os produtos
    //         return $this->loja->with('produtos')->findOrFail($id);
    //     } catch (\Exception $e) {
    //         return response()->json(
    //             ['error' => true, 'message' => 'Loja não encontrada'],
    //             404
    //         );
    //     }
    // }
    // route model binding
    public function show(Loja $loja)
    {
        try {
            //retorna a loja com os produtos
            // return $loja->with('produtos')->findOrFail($loja->id); // retorna loja com produtos
            return $loja; // retorna loja

        } catch (\Exception $e) {
            return response()->json(
                ['error' => true, 'message' => 'Loja não encontrada'],
                404
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loja $loja)
    {
        try {
            $loja->update($request->all());
            return $loja;
        } catch (\Exception $e) {
            return response()->json(
                ['error' => true, 'message' => 'Loja não encontrada'],
                404
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loja $loja)
    {
        try {
            $loja->delete();
            return response()->json(
                ['error' => false, 'message' => 'Loja removida com sucesso'],
                200
            );
        } catch (\Exception $e) {
            return response()->json(
                ['error' => true, 'message' => 'Loja não encontrada'],
                404
            );
        }
    }
}
