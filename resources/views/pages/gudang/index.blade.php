

@include('templates.header')

@include('templates.sidebar')

<div class="page-wrapper">
    <div class="container">
        <h1 class="mb-0 fw-bold">warehouse</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
                <div class="button justify-content-start m-1">
                    <a href="/warehouse/add">
                        <button class="btn btn-primary">+ Tambah Warehouse</button>
                    </a>
                </div>
            </div>
        </div>

        @if (session('delete'))
            <script>
                Swal.fire(
                    'Sukses Dihapus',
                    'Berhasil menghapus data gudang',
                    'success'
                )
            </script>
        @endif

         @if (session('add'))
             <script>
                 Swal.fire(
                     'Sukses Ditambah',
                     'Berhasil menambah data gudang',
                     'success'
                 )
             </script>
         @endif

         @if (session('edit'))
         <script>
             Swal.fire(
                 'Sukses Diedit',
                 'Berhasil mengubah data gudang',
                 'success'
             )
         </script>
        @endif
        @if (session('fail'))
        <script>
            Swal.fire(
                'Gagal Dihapus',
                'Gudang tidak bisa dihapus karena ada item yang tersimpan',
                'warning'
            )
        </script>
       @endif

        <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Location</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($gudangs as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->location }}</td>
                    <td>
                        <a href="/warehouse/{{ $item->id }}">
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
