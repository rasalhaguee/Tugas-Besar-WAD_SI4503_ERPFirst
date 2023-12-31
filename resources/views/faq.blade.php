<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FAQ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

  <style>
    .btn-link {
      color: #000 !important;;
      text-decoration: none !important;;
    }

    .btn-link:hover {
      color: #0056b3 !important;;
      text-decoration: underline !important;
    }

    .card-header {
      cursor: pointer !important;;
    }
  </style>


</head>
<body>

@include('templates.header')

@include('templates.sidebar')

<div class="page-wrapper">

    <div class="container">
        <h2>Frequently Asked Questions</h2>

        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h5 class="mb-0">
                <button class="btn btn-link" >
                    Apa itu ERP?
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <p>ERP, atau Enterprise Resource Planning, adalah sistem perangkat lunak yang mengintegrasikan berbagai fungsi bisnis dalam suatu organisasi, termasuk manajemen pelanggan, transaksi, gudang, dan item, untuk meningkatkan efisiensi dan pengambilan keputusan.
                </p>
              </div>
            </div>
          </div>
          <!-- Lebih banyak card bisa ditambahkan di sini -->
        </div>


        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link" >
                    Apa fungsi utama modul Customer dalam ERP?
                  </button>
                </h5>
              </div>

              <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>
                    Modul Customer dalam ERP bertanggung jawab untuk mengelola informasi pelanggan, termasuk data kontak, histori pembelian, dan interaksi lainnya untuk meningkatkan pelayanan dan retensi pelanggan.
                  </p>
                </div>
              </div>
            </div>
            <!-- Lebih banyak card bisa ditambahkan di sini -->
        </div>

        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <h5 class="mb-0">
                  <button class="btn btn-link" >
                    Bagaimana cara menambahkan pelanggan baru?
                  </button>
                </h5>
              </div>

              <div id="collapseThree" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>
                    Untuk menambahkan pelanggan baru, masuk ke modul Customer, pilih opsi "Tambah Pelanggan," dan isi formulir dengan informasi pelanggan seperti nama, alamat, dan kontak.                  </p>
                </div>
              </div>
            </div>
            <!-- Lebih banyak card bisa ditambahkan di sini -->
          </div>


        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                <h5 class="mb-0">
                  <button class="btn btn-link" >
                    Apa yang dimaksud dengan modul Transaction dalam ERP?
                  </button>
                </h5>
              </div>

              <div id="collapseFour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>
                    Modul Transaction melibatkan pencatatan dan pengelolaan transaksi bisnis seperti penjualan, pembelian, dan pembayaran untuk memastikan akurasi data keuangan dan melacak aktivitas bisnis.                  </p>
                </div>
              </div>
            </div>
            <!-- Lebih banyak card bisa ditambahkan di sini -->
        </div>

        <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <h5 class="mb-0">
                  <button class="btn btn-link" >
                    Bagaimana cara membuat transaksi penjualan?
                  </button>
                </h5>
              </div>

              <div id="collapseFive" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <p>
                    Untuk membuat transaksi penjualan, navigasi ke modul Transaction, pilih "Penjualan," lalu masukkan detail transaksi seperti barang, jumlah, dan harga.                </div>
              </div>
            </div>
            <!-- Lebih banyak card bisa ditambahkan di sini -->
        </div>

    </div>
</div>
</div>

</body>
</html>

@include('templates.footer')
