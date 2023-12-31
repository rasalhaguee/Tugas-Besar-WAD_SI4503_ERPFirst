@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail category --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Tambah category</h1>
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
       <form action="/category/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Category</label>
            <br/>
            <input name="name"  type="text" class="form-control" id="nama" placeholder="Masukkan nama category" value="{{ $category->name }}">
        </div>

        <button class="btn btn-primary mb-5" type="submit">Edit</button>

    </div>

</div>

@include('templates.footer')
