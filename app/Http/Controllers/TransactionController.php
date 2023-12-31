<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionItems;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // transaksi dimana unpurchased dengan costumer
        $transaction_unpurchased = Transaction::with('costumer')->where('status', 'unpurchased')->get();

        // transaksi dimana purchased dengan costumer
        $transaction_purchased = Transaction::with('costumer')->where('status', 'purchased')->get();


        return view('pages.transaction.index', compact('transaction_unpurchased', 'transaction_purchased'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // all costumer
        $costumers = Costumer::all();

        // get all item
        $items = Item::all();

        return view('pages.transaction.create', compact('costumers', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validasi
        $request->validate([
            'costumer_id' => 'required',
            'items' => 'required',
        ]);

        // rubah items ke dalam bentuk array object
        $items = json_decode($request->items);


        // Fungsi untuk menghasilkan huruf acak
        function generateRandomLetter() {
            // ASCII value of 'A' is 65, 'Z' is 90
            return chr(rand(65, 90));
        }

        // Fungsi untuk menghasilkan angka acak
        function generateRandomNumber() {
            return rand(0, 9);
        }

        // Menghasilkan bagian huruf acak
        $randomLetters = generateRandomLetter() . generateRandomLetter() . generateRandomLetter();

        // Menghasilkan bagian angka acak
        $randomNumbers = generateRandomNumber() . generateRandomNumber() . generateRandomNumber();

        // Menggabungkan semua bagian
        $randomId = "ERP-" . $randomLetters . "-" . $randomNumbers . "-". $randomLetters;

        // buat transaksi
        $transaction = Transaction::create([
            'costumer_id' => $request->costumer_id,
            'transaksi_id' => $randomId,
            'status' => 'unpurchased',
        ]);


        // // looping item dan masukan ke tabel TransactionItems
        foreach ($items as $item) {

            // cari id item berdasarkan nama
            $id = Item::where('name', $item->name)->first()->id;

            TransactionItems::create([
                'transaction_id' => $transaction->id,
                'item_id' => $id,
                'qty' => $item->qty,
            ]);
        }

        // update status transaksi

        return redirect()->route('transaction.index')->with('add', 'Item successfully added.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        // get transaction with costumer
        $transaction = Transaction::with('costumer')->findOrFail($id);

        // get costumer
        $costumer = Costumer::findOrFail($transaction->costumer_id);

        // get transaction items with item
        $transaction_items = TransactionItems::with('item')->where('transaction_id', $id)->get();


        return view('pages.transaction.detail', compact('transaction', 'costumer', 'transaction_items'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // buah status menjadi purchased
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'status' => 'purchased',
        ]);

        return redirect()->route('transaction.index')->with('update', 'Transaction successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
