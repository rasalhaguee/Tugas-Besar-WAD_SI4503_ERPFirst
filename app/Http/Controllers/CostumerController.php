<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Exception;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // tampilkan semua costumer
        $costumers = Costumer::all();

        // return ke view
        return view('pages.costumer.index', ['costumers' => $costumers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // return ke view
        return view('pages.costumer.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:costumers',
            'address' => 'required|min:3|max:255',
            'phone' => 'required|numeric',
            'from' => 'required|min:3|max:255',
            'company' => 'required|min:3|max:255',
            'age' => 'required|numeric',
        ]);

        // create slug

        // insert data ke database
        Costumer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'from' => $request->from,
            'company' => $request->company,
            'age' => $request->age,
        ]);

        // return ke view
        return redirect()->route('costumer.index')->with('add', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // tampilkan costumer berdasarkan id
        $costumer = Costumer::findOrFail($id);

        // return ke view
        return view('pages.costumer.detail', ['costumer' => $costumer]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // tampilkan costumer berdasarkan id
        $costumer = Costumer::findOrFail($id);

        // return ke view
        return view('pages.costumer.edit', ['costumer' => $costumer]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:costumers,email,' . $id,
            'address' => 'required|min:3|max:255',
            'phone' => 'required|numeric',
            'from' => 'required|min:3|max:255',
            'company' => 'required|min:3|max:255',
            'age' => 'required|numeric',
        ]);

        // create slug
        // update data ke database
        Costumer::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'from' => $request->from,
            'company' => $request->company,
            'age' => $request->age,
        ]);

        // return ke view
        return redirect()->route('costumer.index')->with('edit', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus data lalu tampilkan peringatan sukses menghapus
        // jika eror karena constrains beri peringatan
        try{
            Costumer::findOrFail($id)->delete();
        }catch(Exception $e){
            return redirect()->route('costumer.index')->with('fail', 'Data gagal dihapus');
        }

        // return ke view
        return redirect()->route('costumer.index')->with('delete', 'Data berhasil dihapus');
    }
}
