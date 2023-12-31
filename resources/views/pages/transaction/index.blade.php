

@include('templates.header')

@include('templates.sidebar')

<div class="page-wrapper">
    <div class="container">
        <h1 class="mb-0 fw-bold">Transaksi</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
                <div class="button justify-content-start m-1">
                    <a href="/transaction/add">
                        <button class="btn btn-primary">+ Tambah transaksi</button>
                    </a>
                </div>
            </div>
        </div>

        @if (session('delete'))
            <script>
                Swal.fire(
                    'Sukses Dihapus',
                    'Berhasil menghapus data transaksi',
                    'success'
                )
            </script>
        @endif

         @if (session('add'))
             <script>
                 Swal.fire(
                     'Sukses Ditambah',
                     'Berhasil menambah data transaksi',
                     'success'
                 )
             </script>
         @endif

         @if (session('edit'))
         <script>
             Swal.fire(
                 'Sukses Diedit',
                 'Berhasil mengubah data transaksi',
                 'success'
             )
         </script>
        @endif


        <h3 class="mb-0 fw-bold">Belum Dibayar</h3>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Transaksi Id</th>
                    <th scope="col">Costumer</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>

                <tbody>
                    @foreach ($transaction_unpurchased as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->transaksi_id }}</td>
                        <td>{{ $item->costumer->name}}</td>
                        <td>{{ $item->getTotalTransaction() }}</td>
                        <td>
                            <a href="/transaction/{{ $item->id }}">
                                <button class="btn btn-primary">Detail</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>


        <h3 class="mb-0 fw-bold">Sudah Dibayar</h3>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Transaksi Id</th>
                    <th scope="col">Costumer</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>

                <tbody>
                    @foreach ($transaction_purchased as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->transaksi_id }}</td>
                        <td>{{ $item->costumer->name}}</td>
                        <td>{{ $item->getTotalTransaction() }}</td>
                        <td>
                            <a href="/transaction/{{ $item->id }}">
                                <button class="btn btn-primary">Detail</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>

    </div>

</div>


@include('templates.footer')
