@extends('admin.layout.app')
@section('contents')
<!DOCTYPE html>
<html lang="en">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-flex align-items-center justify-content-between">
                    <h1 class="mb-2 text-gray-800">Data Penyewa</h1>
                        <div class="btn" aria-label="Basic example">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Penyewa
                            </button>
                        </div>
                    </div>
                    
                    <br>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penyewa</th>
                                            <th>Email</th>
                                            <th>Nomor HP</th>
                                            <th>Harga Kamar Yang Disewa</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($transaksis->count() > 0)
                @foreach($transaksis as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->no_hp }}</td>
                        <td class="align-middle">{{ $rs->harga }}</td>
                        <td class="align-middle">{{ $rs->mulai }}</td>
                        <td class="align-middle">{{ $rs->batas }}</td>
                        <td class="align-middle">
                            <div class="btn" aria-label="Basic example">
                                <a href="{{ route('admin/penyewa/edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin/penyewa/destroy', $rs->id)}}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Tidak ada data penyewa</td>
                </tr>
            @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Penyewa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <form class="form1" method="post" action="{{ route('admin/penyewa/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mb-3">
                    <label for="">Nama Penyewa</label>
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama penyewa">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <div class="form-group col-md-12 mb-3">
                    <label for="">Email Penyewa Kamar</label>
                    <input class="form-control" type="text" name="email" placeholder="Masukan email penyewa">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Nomor HP Penyewa Kamar</label>
                    <input class="form-control" type="text" name="no_hp" placeholder="Masukan nomor hp penyewa">
                    @error('no_hp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Harga Kamar Yang Disewa</label>
                    <input class="form-control" type="text" name="harga" placeholder="Masukan harga kamar yang disewa">
                    @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Tanggal Mulai</label>
                    <br>
                    <input type="date" name="mulai" class="form-control">
                    @error('mulai')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Tanggal Selesai</label>
                    <br>
                    <input type="date" name="batas" class="form-control">
                    @error('batas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Password Penyewa Kamar</label>
                    <input class="form-control" type="text" name="password" placeholder="Masukan password untuk penyewa">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required=""> Simpan saat penyewa login
                                </div>
                            </div>
                        </div>
 
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('admin/penyewa') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
    

@endsection

