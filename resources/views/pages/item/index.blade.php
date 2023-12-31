

@include('templates.header')

@include('templates.sidebar')

<div class="page-wrapper">
    <div class="container">
        <h1 class="mb-0 fw-bold">item</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
                <div class="button justify-content-start m-1">
                    <a href="/item/add">
                        <button class="btn btn-primary">+ Tambah item</button>
                    </a>
                </div>
            </div>
        </div>

        @if (session('delete'))
            <script>
                Swal.fire(
                    'Sukses Dihapus',
                    'Berhasil menghapus data items',
                    'success'
                )
            </script>
        @endif

         @if (session('add'))
             <script>
                 Swal.fire(
                     'Sukses Ditambah',
                     'Berhasil menambah data items',
                     'success'
                 )
             </script>
         @endif

         @if (session('edit'))
         <script>
             Swal.fire(
                 'Sukses Diedit',
                 'Berhasil mengubah data items',
                 'success'
             )
         </script>
        @endif

        @if (session('fail'))
        <script>
            Swal.fire(
                'Gagal Dihapus',
                'Item tidak bisa dihapus karena sedang ada transaksi',
                'warning'
            )
        </script>
       @endif

        <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Gudang</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- image --}}
                    <td>
                        <img src="{{ asset($item->image) }}" alt="" width="100px">
                    </td>

                    <td>{{ $item->name}}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->gudang->name }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="/item/{{ $item->id }}">
                            <button class="btn btn-warning">Detail</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@include('templates.footer')
