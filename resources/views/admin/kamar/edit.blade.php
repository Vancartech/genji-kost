@extends('admin.layout.app')
  
@section('title', 'Update Kamar')
  
@section('contents')
<div class="container">
    <div class="col-md-12">
        <div class="form-appl">
            <form class="form1" method="post" action="{{ route('admin/kamar/update', $kamars->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group col-md-12 mb-3">
                    <label for="">Nama/Nomor Kamar</label>
                    <input class="form-control" type="text" name="nama" placeholder="Masukan nama kamar" value=" {{ $kamars->nama }}">
                    @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
                <div class="form-group col-md-12 mb-3">
                    <label for="">Harga Kamar</label>
                    <input class="form-control" type="text" name="harga" placeholder="Masukan harga kamar" value="{{ $kamars->harga }}">
                    @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Status Kamar</label>
                    <input class="form-control" type="text" name="status" placeholder="Masukan status kamar" value="{{ $kamars->status }}">
                    @error('stok')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control" type="text" name="deskripsi" placeholder="Masukan deskripsi kamar">{{ $kamars->deskripsi }}</textarea>
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
                        <div class="avatar-preview">
                            <div id="imagePreview" style="@if (isset($kamars->id) && $kamars->foto != '') background-image:url('{{ url('/') }}/foto_kamar/{{ $kamars->foto }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif"></div>
                        </div>
                    </div>
                    @error('photo')
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
