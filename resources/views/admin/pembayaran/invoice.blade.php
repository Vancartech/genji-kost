<!DOCTYPE html>
<html lang="en">
 
<head>
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
 
<body>
    <!-- Invoice 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
        <div class="row gy-3 mb-3">
          <div class="col-6">
            <h2 class="text-uppercase text-endx m-0">Invoice</h2>
          </div>
          <div class="col-12">
            <h4>From</h4>
            <address>
              <strong>Genji Kost</strong><br>
              Email: genjikost@gmail.com
            </address>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="text-uppercase">ID Transaksi</th>
                    <th scope="col" class="text-uppercase">Nama Penyewa</th>
                    <th scope="col" class="text-uppercase text-end">Nama Kamar</th>
                    <th scope="col" class="text-uppercase text-end">Harga</th>
                    <th scope="col" class="text-uppercase text-end">Status</th>
                    <th scope="col" class="text-uppercase text-end">Tanggal Transaksi</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <th scope="row">{{$transaksis->id}}</th>
                    <td>{{$transaksis->user->name}}</td>
                    <td class="text-end">{{$transaksis->kamar->nama}}</td>
                    <td class="text-end">{{$transaksis->harga}}</td>
                    <td class="text-end">{{$transaksis->status}}</td>
                    <td class="text-end">{{$transaksis->created_at}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
 
</html>
