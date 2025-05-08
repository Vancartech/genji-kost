@extends('admin.layout.app')
  
@section('title', 'Update Penyewwa')
  
@section('contents')
<div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <form class="form1" method="post" action="{{ route('admin/penyewa/update', $users->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group col-md-12 mb-3">
                    <label for="">Nama Penyewa</label>
                    <input class="form-control" type="text" name="name" placeholder="Masukan nama penyewa" value=" {{ $users->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <div class="form-group col-md-12 mb-3">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Masukan email penyewa" value="{{ $users->email }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Nomor HP</label>
                    <input class="form-control" type="text" name="no_hp" placeholder="Masukan nomor hp penyewa" value="{{ $users->no_hp }}">
                    @error('nomor_hp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Harga Kamar Yang Disewa</label>
                    <input class="form-control" type="text" name="harga" placeholder="Masukan harga kamar yang disewa" value="{{ $transaksis->harga }}">
                    @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Tanggal Mulai</label>
                    <br>
                    <input type="date" name="mulai" class="form-control" value="{{ old('mulai', $transaksis->mulai ?? '') }}">
                    @error('mulai')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Tanggal Selesai</label>
                    <br>
                    <input type="date" name="batas" class="form-control" value="{{ old('batas', $transaksis->batas ?? '') }}">
                    @error('batas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Password Penyewa Kamar</label>
                    <input class="form-control" type="text" name="password" placeholder="••••••••">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('admin/penyewa') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(700);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }
 
    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }
 
    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
