@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail Gudang --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Detail Gudang</h1>
    </div>

    <div class="container form-add mt-3">
        <div class="form-group">
            <label for="nama">Nama Gudang</label>
            <br/>
            <input name="name"  type="text" class="form-control" id="nama" placeholder="Masukkan nama Gudang" value="{{ $gudang->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="location">Lokasi Gudang</label>
            <br/>
            <input name="location" type="text" class="form-control" id="location" placeholder="Masukkan lokasi Gudang" value="{{ $gudang->location }}" disabled>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Gudang</label>
            <br/>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Masukkan deskripsi Gudang" disabled>{{ $gudang->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="type">Tipe Gudang</label>
            <br/>
            <input name="type"  type="text" class="form-control" id="type" placeholder="Masukkan type Gudang" value="{{ $gudang->type }}" disabled>
        </div>

        <div class="flex">
            <a  href="/warehouse/{{ $gudang->id }}/edit">
                <button class="btn btn-warning mb-5 black" type="button">Edit</button>
            </a>
            <a  href="#">
                <button class="btn btn-danger mb-5" type="button" data-toggle="modal" data-target="#exampleModal">Hapus</button>
            </a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title font-weight-bold red" id="exampleModalLabel">Peringatan !!!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Apakah anda yakin untuk menghapus data Gudang dengan nama <span class="font-weight-bold">{{ $gudang->name }}</span>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            <form action="/warehouse/{{ $gudang->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
        </div>
        </div>
        </div>
    </div>



@include('templates.footer')
