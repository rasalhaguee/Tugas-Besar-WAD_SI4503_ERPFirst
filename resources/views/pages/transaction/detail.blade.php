@include('templates.header')

@include('templates.sidebar')

<style>
    .icon-container {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 24px; /* Atur lebar ikon */
      height: 24px; /* Atur tinggi ikon */
      background-color: #dc3545; /* Warna latar belakang ikon */
      color: white; /* Warna teks untuk ikon */
      border-radius: 0.25rem; /* Bulatkan sudut */
    }
</style>
{{-- buatkan tampilan detail Item --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-3 fw-bold">Detail Transaksi</h1>
    </div>

    {{-- TAMPILKAN KESALAHAN YANG TERJADI --}}
    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <script>
                Swal.fire(
                    'Gagal Ditambahkan',
                    'Silahkan isi semua data dengan benar',
                    'error'
                )
            </script>
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- TAMPILKAN SUKSES MENAMBAHKAN --}}

    <div class="container mt-5">
       <form action="/transaction/{{ $transaction->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input id="items" type="hidden" name="id_transaction" value="{{ $transaction->id }}">

        <div class="form-group">
            <h4 class="mb-0">Nama Costumer</h4>
            <br/>
            <input name="price"  type="text" class="form-control" id="price" placeholder="Masukkan harga item" value="{{ $costumer->name }}">
        </div>

        <div className="bg- rounded mb-3">
            <div class="d-flex pr-3 align-items-center border-bottom py-3">
                <h3 class="mb-0">Item Transaksi</h3>
            </div>

            <div class="row mb-5" id="loop-item">

                @foreach ($transaction_items as $item)

                <div class="col-3 m-2 border border-dark">
                    <div class="row align-items-center justify-content-between bg-light p-2">
                        <!-- p-2 untuk padding, bg-light untuk background abu-abu -->
                        <div class="col">
                          <span>{{$item->item->name}}</span>
                          <span>({{$item->qty}})</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon-container delete-icon">&times;</div> <!-- Simbol X dengan latar belakang merah -->
                        </div>
                      </div>
                </div>

                @endforeach

            </div>
        </div>

        @if($transaction->status == "unpurchased")
        <button class="btn btn-primary mb-5" type="submit">Konfirmasi Terbayar</button>
        @endif
       </form>

        <a href="/invoice/{{ $transaction->id }}">
            <button class="btn btn-primary mb-5" type="submit">Cetak Invoice</button>
        </a>


    </div>



    <script>
        let itemsArray = [];

        const addItem = document.getElementById('add-item');

        addItem.addEventListener('click', () => {
            const inputItem = document.getElementById('input-item');
            inputItem.style.display = 'block';
        });

        const btnAddItem = document.getElementById('btn-add-item');

        btnAddItem.addEventListener('click', () => {
            const inputItem = document.getElementById('input-item');

            const nameItem = document.getElementById('name-item');
            const qtyItem = document.getElementById('qty-item');

            const nameItemValue = nameItem.value;
            const qtyItemValue = qtyItem.value;

            const item = {
                name: nameItemValue,
                qty: qtyItemValue
            }

            itemsArray.push(item);
            console.log(itemsArray)

            renderItem();

            // reset value
            nameItem.value = '';
            qtyItem.value = '';

            // masukan ke value id items
            const items = document.getElementById('items');
            items.value = JSON.stringify(itemsArray);

            inputItem.style.display = 'none';
        });

        const loopItem = document.getElementById('loop-item');

        function renderItem () {
            let html = '';
            itemsArray.forEach((item) => {
                html += `
                <div class="col-3 m-2 border border-dark">
                    <div class="row align-items-center justify-content-between bg-light p-2">
                        <!-- p-2 untuk padding, bg-light untuk background abu-abu -->
                        <div class="col">
                          <span>${item.name}</span>
                          <span>(${item.qty})</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon-container delete-icon">&times;</div> <!-- Simbol X dengan latar belakang merah -->
                        </div>
                      </div>
                </div>
                `
            });

            loopItem.innerHTML = html;
        }

        // delete item
        loopItem.addEventListener('click', (e) => {
            if (e.target.classList.contains('delete-icon')) {
                const name = e.target.parentElement.parentElement.children[0].children[0].innerText;
                const qty = e.target.parentElement.parentElement.children[0].children[1].innerText;

                const item = {
                    name: name,
                    qty: qty
                }


                console.log(itemsArray)

                let filterArray = itemsArray.filter(item => item.name !== name);

                itemsArray = filterArray;

                renderItem();


                // itemsArray.splice(index, 1);

                // renderItem();

                // // masukan ke value id items
                const items = document.getElementById('items');
                items.value = JSON.stringify(itemsArray);
            }
        });

    </script>


</div>

@include('templates.footer')
