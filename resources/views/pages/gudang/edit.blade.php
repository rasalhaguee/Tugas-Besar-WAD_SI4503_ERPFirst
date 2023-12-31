@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail costumer --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Edit Gudang</h1>
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
        <form action="/warehouse/{{ $gudang->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Gudang</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama gudang" value="{{ $gudang->name }}">
            </div>

            <div class="form-group">
                <label for="location">Lokasi Gudang</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Masukkan lokasi gudang" value="{{  $gudang->location  }}">
            </div>

            <div class="form-group">
                <label for="capacity">Deskripsi Gudang</label>
                {{-- pakai text --}}
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi gudang" >{{  $gudang->description  }}</textarea>
            </div>

            {{-- type ada dua product dan material --}}
            <div class="form-group">
                <label for="type">Tipe Gudang</label>
                {{-- select dengan default value sesuai data --}}
                <select class="form-control" id="type" name="type">
                    <option value="product" {{ $gudang->type == 'product' ? 'selected' : '' }}>Product</option>
                    <option value="material" {{ $gudang->type == 'material' ? 'selected' : '' }}>Material</option>
                </select>
            </div>

            <button class="btn btn-primary mb-5" type="submit">Edit</button>
           </form>

    </div>

</div>

@include('templates.footer')
