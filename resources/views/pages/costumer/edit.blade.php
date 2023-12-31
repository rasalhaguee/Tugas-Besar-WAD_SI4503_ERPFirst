@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail costumer --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Tambah Costumer</h1>
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
       <form action="/costumer/{{ $costumer->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Costumer</label>
            <br/>
            <input name="name"  type="text" class="form-control" id="nama" placeholder="Masukkan nama costumer" value="{{ $costumer->name }}">
        </div>

        <div class="form-group mt-4">
            <label for="email">Email Costumer</label>
            <br/>
            <input name="email"  type="text" class="form-control" id="email" placeholder="Masukkan email costumer" value="{{ $costumer->email }}">
        </div>

        <div class="form-group mt-4">
            <label for="address">Address Costumer</label>
            <br/>
            <input name="address"  type="text" class="form-control" id="address" placeholder="Masukkan address costumer" value="{{ $costumer->address }}">
        </div>

        <div class="form-group mt-4">
            <label for="age">Age Costumer</label>
            <br/>
            <input name="age"  type="number" class="form-control" id="age" placeholder="Masukkan age costumer" value="{{ $costumer->age }}">
        </div>

        <div class="form-group mt-4">
            <label for="phone">Phone Costumer</label>
            <br/>
            <input name="phone"  type="text" class="form-control" id="phone" placeholder="Masukkan phone costumer" value="{{ $costumer->phone }}">
        </div>

        <div class="form-group mt-4">
            <label for="company">Company Costumer</label>
            <br/>
            <input name="company"  type="text" class="form-control" id="company" placeholder="Masukkan company costumer" value="{{ $costumer->company }}">
        </div>

        <div class="form-group mt-4">
            <label for="from">From Costumer</label>
            <br/>
            <input name="from"  type="text" class="form-control" id="from" placeholder="Masukkan from costumer" value="{{ $costumer->from }}">
        </div>

        <button class="btn btn-primary mb-5" type="submit">Edit</button>

    </div>

</div>

@include('templates.footer')
