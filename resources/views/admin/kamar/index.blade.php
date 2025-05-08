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
                    <h1 class="mb-2 text-gray-800">Data Kamar</h1>
                        <div class="btn" aria-label="Basic example">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Kamar
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
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Deskripsi</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($kamars->count() > 0)
                                    @foreach($kamars as $rs)
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $rs->nama }}</td>
                                            <td class="align-middle">{{ $rs->harga }}</td>
                                            <td class="align-middle">
                                                                @if ($rs->status == 'Kosong')
                                                                    <span class="btn btn-warning">{{ $rs->status }}</span>
                                                                @elseif ($rs->status == 'Terisi')
                                                                    <span class="btn btn-success">{{ $rs->status }}</span>
                                                                @endif
                                                            </td>
                                            <td class="align-middle">{{ $rs->deskripsi }}</td>  
                                            <td class="align-middle"><img width="50" src="/foto_kamar/{{ $rs->foto }}" width="100px"></td>  
                                            <td class="align-middle">
                                                <div class="btn" aria-label="Basic example">
                                                    <a href="{{ route('admin/kamar/edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                                    <form action="{{ route('admin/kamar/destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                                                <td class="text-center" colspan="5">Tidak ada data kamar</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <form class="form1" method="post" action="{{ route('admin/kamar/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mb-3">
                    <label for="">Nama/Nomor Kamar</label>
                    <input class="form-control" type="text" name="nama" placeholder="Masukan nama atau nomor kamar">
                    @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <div class="form-group col-md-12 mb-3">
                    <label for="">Harga Kamar</label>
                    <input class="form-control" type="text" name="harga" placeholder="Masukan harga kamar per-bulan">
                    @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Status Kamar</label>
                    <input class="form-control" type="text" name="status" placeholder="Masukan status kamar">
                    @error('status')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" type="text" name="deskripsi" placeholder="Masukan deskripsi kamar"></textarea>
                    @error('dekripsi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-5">
                    <label for="">Foto</label>
                    <div class="avatar-upload">
                        <div>
                            <input type='file' id="imageUpload" name="foto" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                            <label for="imageUpload"></label>
                        </div>
                    </div>
                    @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('admin/kamar') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
    

@endsection

