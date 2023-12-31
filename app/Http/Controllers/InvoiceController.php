<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function genreateInvoice($id){

        $transaction = Transaction::with('costumer', 'transactionItems', 'transactionItems.item')->findOrFail($id);

        // return to invoice.blade
        return view('pages.invoice', compact('transaction'));
    }

}
