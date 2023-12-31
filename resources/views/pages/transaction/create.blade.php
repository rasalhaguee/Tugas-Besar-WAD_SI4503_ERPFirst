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
        <h1 class="mb-0 fw-bold">Buat Transaksi</h1>
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
       <form action="/transaction" method="POST" enctype="multipart/form-data">
        @csrf

        <input id="items" type="hidden" name="items">

        <div class="form-group">
            <label for="warehouse_id">Nama costumer</label>
            <select class="form-control" id="gudang_id" name="costumer_id">
                <option value="">Silahkan pilih costumer</option>
                @foreach ($costumers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div className="bg- rounded mb-3">
            <div class="d-flex pr-3 align-items-center border-bottom py-3">
                <h3 class="mb-0">Item Transaksi</h3>
                <div id="add-item" class="m-2 btn btn-success btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 .5-.5h.5z"/>
                </svg>
                </div>

            </div>

            <div id="input-item" class="form-group" style="display: none">
                <div>
                    <label for="warehouse_id">Nama Item</label>
                    <select id="name-item" class="form-control" id="gudang_id" name="gudang_id">
                        <option value="">Silahkan pilih item</option>
                        @foreach ($items as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label>Jumlah</label>
                    <input id="qty-item" type="text" />
                </div>
                <div id="btn-add-item" class="btn btn-primary mb-5" type="submit">+ Item</div>
            </div>

            <div class="row mb-5" id="loop-item"></div>
        </div>

        <button class="btn btn-primary mb-5" type="submit">Buat Transaksi</button>
       </form>
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
