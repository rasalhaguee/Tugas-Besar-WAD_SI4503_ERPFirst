

@include('templates.header')

@include('templates.sidebar')

<div class="page-wrapper">
    <div class="container">
        <h1 class="mb-0 fw-bold">Costumer</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
                <div class="button justify-content-start m-1">
                    <a href="/costumer/add">
                        <button class="btn btn-primary">+ Tambah Costumer</button>
                    </a>
                </div>
            </div>
        </div>

        @if (session('delete'))
            <script>
                Swal.fire(
                    'Sukses Dihapus',
                    'Berhasil menghapus data costumer',
                    'success'
                )
            </script>
        @endif

         @if (session('add'))
             <script>
                 Swal.fire(
                     'Sukses Ditambah',
                     'Berhasil menambah data costumer',
                     'success'
                 )
             </script>
         @endif

         @if (session('edit'))
         <script>
             Swal.fire(
                 'Sukses Diedit',
                 'Berhasil mengubah data costumer',
                 'success'
             )
         </script>
        @endif

        @if (session('fail'))
        <script>
            Swal.fire(
                'Gagal Dihapus',
                'Costumer tidak bisa dihapus karena memiliki transaksi',
                'warning'
            )
        </script>
       @endif

        <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">Company</th>
                <th scope="col">From</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($costumers as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->company }}</td>
                    <td>{{ $item->from }}</td>
                    <td>
                        <a href="/costumer/{{ $item->id }}">
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
