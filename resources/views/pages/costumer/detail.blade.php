@include('templates.header')

@include('templates.sidebar')


{{-- buatkan tampilan detail costumer --}}
<div class="page-wrapper">

    <div class="container">
        <h1 class="mb-0 fw-bold">Detail Costumer</h1>
    </div>

    <div class="container form-add mt-3">
        <div class="form-group">
            <label for="nama">Nama Costumer</label>
            <br/>
            <input name="name"  type="text" class="form-control" id="nama" placeholder="Masukkan nama costumer" value="{{ $costumer->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="email">Email Costumer</label>
            <br/>
            <input name="email"  type="text" class="form-control" id="email" placeholder="Masukkan email costumer" value="{{ $costumer->email }}" disabled>
        </div>

        <div class="form-group">
            <label for="address">Address Costumer</label>
            <br/>
            <input name="address"  type="text" class="form-control" id="address" placeholder="Masukkan address costumer" value="{{ $costumer->address }}" disabled>
        </div>

        <div class="form-group">
            <label for="age">Age Costumer</label>
            <br/>
            <input name="age"  type="text" class="form-control" id="age" placeholder="Masukkan age costumer" value="{{ $costumer->age }}" disabled>
        </div>

        <div class="form-group">
            <label for="phone">Phone Costumer</label>
            <br/>
            <input name="phone"  type="text" class="form-control" id="phone" placeholder="Masukkan phone costumer" value="{{ $costumer->phone }}" disabled>
        </div>

        <div class="form-group">
            <label for="company">Company Costumer</label>
            <br/>
            <input name="company"  type="text" class="form-control" id="company" placeholder="Masukkan company costumer" value="{{ $costumer->company }}" disabled>
        </div>

        <div class="flex">
            <a  href="/costumer/{{ $costumer->id }}/edit">
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
            Apakah anda yakin untuk menghapus data costumer dengan nama <span class="font-weight-bold">{{ $costumer->name }}</span>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            <form action="/costumer/{{ $costumer->id }}" method="POST">
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
