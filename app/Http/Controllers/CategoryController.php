<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // tampilkan semua costumer
        $categories = Category::all();
        // return ke view
        return view('pages.category.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // return ke view
        return view('pages.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        // insert data ke database
        Category::create([
            'name' => $request->name,
        ]);

        // redirect ke halaman costumer
        return redirect()->route('category.index')->with('add', 'Category successfully added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // cari costumer berdasarkan id
        $category = Category::findOrFail($id);

        // return ke view
        return view('pages.category.detail', ['category' => $category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // cari costumer berdasarkan id
        $category = Category::findOrFail($id);

        // return ke view
        return view('pages.category.edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        // cari costumer berdasarkan id
        $category = Category::findOrFail($id);

        // update data ke database
        $category->update([
            'name' => $request->name,
        ]);

        // redirect ke halaman costumer
        return redirect()->route('category.index')->with('edit', 'Category successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // cari costumer berdasarkan id
        $category = Category::findOrFail($id);


        try{
            // delete costumer
            $category->delete();
        }catch(\Exception $e){
            return redirect()->route('category.index')->with('fail', 'Category cannot be deleted because it is related to another table.');
        }


        // redirect ke halaman costumer
        return redirect()->route('category.index')->with('delete', 'Category successfully deleted.');

    }
}
