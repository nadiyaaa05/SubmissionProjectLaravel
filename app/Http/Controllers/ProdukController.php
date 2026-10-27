<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /*
    public function index()
    {
        $produk = [
            ['id' =>  1, 'nama' => 'Keyboard', 'harga' => 150000, 'stok' => 12],
            ['id' =>  2, 'nama' => 'Mouse', 'harga' => 85000, 'stok' => 0],
        ];
        return view('produk.index',compact('produk'));
    }*/
      
    //14/10/2026
    public function index(){
        return view('produk.biio');
    }

    /*public function show($id) //parameter dari URL
    {
        abort_unless($id <= 2, 404);
        return view('produk.show',['id' =>$id]);
    }*/

    public function show($id){
        $data = $id;
        return view('produk.show', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100','harga'=> 'required|integer']);
            return redirect()->route('produk.index')->with('status','Tersimpan');
    }
}
