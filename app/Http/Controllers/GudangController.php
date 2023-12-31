<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{

    public function index()
    {
        // tampilkan semua gudang
        $gudangs = Gudang::all();

        // return ke view
        return view('pages.gudang.index', ['gudangs' => $gudangs]);
    }

    public function create()
    {

        // return ke view
        return view('pages.gudang.create');

    }

    public function store(Request $request)
    {

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'location' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
        ]);

        // create slug

        // insert data ke database
        Gudang::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        // redirect ke halaman costumer
        return redirect()->route('gudang.index')->with('add', 'Gudang berhasil ditambahkan');
    }

    public function show($id)
    {
        // get data by id
        $gudang = Gudang::findOrFail($id);

        // return ke view
        return view('pages.gudang.detail', ['gudang' => $gudang]);
    }

    public function edit($id)
    {
        // get data by id
        $gudang = Gudang::findOrFail($id);

        // return ke view
        return view('pages.gudang.edit', ['gudang' => $gudang]);
    }

    public function update(Request $request, $id)
    {
        // get data by id
        $gudang = Gudang::findOrFail($id);

        // validasi data
        $request->validate([
            'name' => 'required|min:3|max:255',
            'location' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
            'type' => 'required|min:3|max:255',
        ]);


        // update data
        $gudang->update([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        // redirect ke halaman costumer
        return redirect()->route('gudang.index')->with('edit', 'Gudang berhasil diupdate');
    }

    public function destroy($id)
    {

        // get data by id
        $gudang = Gudang::findOrFail($id);

        // delete data
        try{
            // delete data
            $gudang->delete();
        }catch(\Exception $e){
            return redirect()->route('gudang.index')->with('fail', 'Gudang gagal dihapus');
        }



        // redirect ke halaman costumer
        return redirect()->route('gudang.index')->with('delete', 'Gudang berhasil dihapus');
    }
}
