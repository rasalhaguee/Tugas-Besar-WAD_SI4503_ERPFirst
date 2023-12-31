<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gudang;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // get item with category and gudang
        $item = Item::with(['category', 'gudang'])->get();

        return view('pages.item.index', ['items' => $item]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // gudang
        $gudangs = Gudang::all();
        // category
        $categories = Category::all();

        return view('pages.item.create', ['gudangs' => $gudangs, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'category_id' => 'required',
            'gudang_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        // masukan gambar ke public/assets/images/sesuai kategori material atau product
        $image = $request->file('image');

        // ganti nama sesuai tanggal atau timestamp
        $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

        // pindahkan file ke folder public/assets/images/sesuai kategori material atau product
        $image->move(public_path('assets/images/item'), $image_name);

        // insert data ke database
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'gudang_id' => $request->gudang_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => '/assets/images/item/'.$image_name,
            'description' => $request->description,
        ]);

        // redirect ke halaman costumer
        return redirect()->route('item.index')->with('add', 'Item successfully added.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        // get item with category and gudang
        $item = Item::with(['category', 'gudang'])->findOrFail($id);

        return view('pages.item.detail', ['item' => $item]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        // get item with category and gudang
        $item = Item::with(['category', 'gudang'])->findOrFail($id);

        // gudang
        $gudangs = Gudang::all();
        // category
        $categories = Category::all();

        return view('pages.item.edit', ['item' => $item, 'gudangs' => $gudangs, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'category_id' => 'required',
            'gudang_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);

        // get item with category and gudang
        $item = Item::with(['category', 'gudang'])->findOrFail($id);

        // cek jika ada gambar yang diupload
        if ($request->hasFile('image')) {

            // masukan gambar ke public/assets/images/sesuai kategori material atau product
            $image = $request->file('image');

            // ganti nama sesuai tanggal atau timestamp
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();

            // hapus file lama
            unlink(public_path($item->image));

            // pindahkan file ke folder public/assets/images/sesuai kategori material atau product
            $image->move(public_path('assets/images/item'), $image_name);

            // update data ke database
            $item->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'gudang_id' => $request->gudang_id,
                'stock' => $request->stock,
                'price' => $request->price,
                'image' => '/assets/images/item/'.$image_name,
                'description' => $request->description,
            ]);

        } else {

            // update data ke database
            $item->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'gudang_id' => $request->gudang_id,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description,
            ]);

        }

        // redirect ke halaman costumer
        return redirect()->route('item.index')->with('edit', 'Item successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try{
                    // get item with category and gudang
        $item = Item::with(['category', 'gudang'])->findOrFail($id);

        $item->delete();
        // hapus file lama
        unlink(public_path($item->image));

        }catch(\Exception $e){
            return redirect()->route('item.index')->with('fail', 'Item successfully deleted.');
        }
        // delete data

        // redirect ke halaman costumer
        return redirect()->route('item.index')->with('delete', 'Item successfully deleted.');

    }
}
