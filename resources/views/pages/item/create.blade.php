@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail Item --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Tambah Item</h1>
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
       <form action="/item" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- image  dengan preview--}}
        <div class="form-group">
            <label for="image">Gambar Item</label>
            <br/>
            <input name="image" type="file" class="form-control" id="imageInput" accept="image/*" onchange="previewImage()">
        </div>

        <div id="imagePreview" style="display: none;">
            <img width="200" src="" alt="Pratinjau Gambar" id="preview">
        </div>

        <div class="form-group">
            <label for="name">Nama Item</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama item" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Item</label>
            {{-- pakai text --}}
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi item" value="{{ old('description') }}"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga Item</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga item" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock Item</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan stock item" value="{{ old('stock') }}">
        </div>

        <div class="form-group">
            <label for="warehouse_id">Gudang Item</label>
            <select class="form-control" id="gudang_id" name="gudang_id">
                <option value="">Silahkan pilih gudang</option>
                @foreach ($gudangs as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- category --}}
        <div class="form-group">
            <label for="category_id">Kategori Item</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Silahkan pilih kategori</option>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-primary mb-5" type="submit">Tambah</button>
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
