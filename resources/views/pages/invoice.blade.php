<style>
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

#preview_table{
    min-width: 600px;
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

</style>

<div id="invoice">
    <div class="invoice overflow-auto">
        <div id="preview_table">
            <header>
                <div class="row">
                    <div class="col" id="company_logo">
                        <img id="image_id" src="{{asset('assets/images/logo.png')}}" style="width: 200px">
                    </div>
                    <div class="col company-details">
                        <h2 id="name">{{$transaction->costumer->name}}</h2>
                        <div id="address">{{$transaction->costumer->location}}</div>
                        <div id="contact">{{$transaction->costumer->number}}</div>
                        <div id="email">{{$transaction->costumer->email}}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-details">
                        <h1 id="invoice-id"></h1>
                        <div id="date">Date of Invoice:{{$transaction->updated_at}}</div>
                        <div id="duedate">Due Date:</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="text-left">SN</th>
                        <th class="text-left">Items</th>
                        <th class="text-right">Unit cost</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody id="preview">

                        {{-- looping transaction itens --}}
                        @foreach ($transaction->transactionItems as $item)
                        <tr>
                            {{-- iterationns --}}
                            <td class="no">{{$loop->iteration}}</td>
                            {{-- item name --}}
                            <td class="text-left desc"><h3>{{$item->item->name}}</h3></td>
                            {{-- item price --}}
                            <td class="unit">{{$item->item->price}}</td>
                            {{-- item quantity --}}
                            <td class="qty">{{$item->qty}}</td>
                            {{-- item total --}}
                            <td class="qty">{{$item->qty * $item->item->price}}</td>

                        </tr>
                    @endforeach

                    </tbody>


                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td id="total">{{ $transaction->getTotalTransaction() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Tax 15%</td>
                        <td id="taxtotal">{{ $transaction->getTotalTransaction() * 0.15 }}</td>

                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        {{-- sub total dikali pajak 15% --}}
                        <td id="grandtotal">{{ $transaction->getTotalTransaction() * 1.15 }}</td>

                    </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <div></div>
    </div>
</div>

<script>

    // jadikan id invoice sebuah file pdf
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        // jadikan id invoice sebuah file pdf
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    // panggil fungsi printDiv
    printDiv('invoice');

</script>
