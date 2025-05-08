@extends('admin.layout.app')
 
@section('title', 'Profile Settings')
 
@section('contents')
<hr />
<form method="POST" enctype="multipart/form-data" action="">
    <div class="form-group col-md-12 mb-3">
                    <p> Nama : {{ auth()->user()->name }}</p>
    </div>
    <div class="form-group col-md-12 mb-3">
                    <p> Nama : {{ auth()->user()->email }}</p>
    </div>
    <div class="form-group col-md-12 mb-3">
                    <p> Nama : {{ auth()->user()->no_hp }}</p>
    </div>
</form>
@endsection