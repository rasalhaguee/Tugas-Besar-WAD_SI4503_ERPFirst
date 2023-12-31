@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail costumer --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Edit item</h1>
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
        <form action="/item/{{ $item->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Gambar Item</label>
                <br/>
                <input name="image" type="file" class="form-control" id="imageInput" accept="image/*" onchange="previewImage()">
                <img width="200" src="{{ $item->image }}" alt="Pratinjau Gambar" id="preview">
            </div>

            <div class="form-group">
                <label for="nama">Nama item</label>
                <br/>
                <input name="name"  type="text" class="form-control" id="nama" placeholder="Masukkan nama item" value="{{ $item->name }}">
            </div>

            <div class="form-group">
                <label for="description">Deskripsi item</label>
                <br/>
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi item" >{{ $item->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Harga item</label>
                <br/>
                <input name="price"  type="text" class="form-control" id="price" placeholder="Masukkan harga item" value="{{ $item->price }}">
            </div>

            <div class="form-group">
                <label for="stock">Stok item</label>
                <br/>
                <input name="stock"  type="text" class="form-control" id="stock" placeholder="Masukkan stok item" value="{{ $item->stock }}">
            </div>

            {{-- select gudang with default value --}}
            <div class="form-group">
                <label for="warehouse_id">Gudang item</label>
                <select class="form-control" id="warehouse_id" name="gudang_id">
                    @foreach ($gudangs as $g)
                    <option value="{{ $g->id }}" {{ $g->id == $item->warehouse_id ? 'selected' : '' }}>{{ $g->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- select category with default value --}}
            <div class="form-group">
                <label for="type">Category item</label>
                <select class="form-control" id="type" name="category_id">
                    @foreach ($categories as $c)
                    <option value="{{ $c->id }}" {{ $c->id == $item->category_id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary mb-5" type="submit">Edit</button>
           </form>

    </div>

    <script>
        function previewImage() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('imageInput');
            var imagePreview = document.getElementById('imagePreview');

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Menampilkan pratinjau gambar
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                preview.src = 'placeholder.jpg'; // Menggunakan gambar placeholder jika tidak ada gambar yang dipilih
                imagePreview.style.display = 'block'; // Menampilkan pratinjau gambar placeholder
            }
        }
    </script>

</div>

@include('templates.footer')
