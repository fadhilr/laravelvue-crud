@extends('layouts.master')

@section('content')
	<h1>Edit Data Domain</h1>
	@if (session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}		
	</div>
	@endif
	<div class="row">
		<div class="col-12">
		<form action="" method="POST">
			        	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">Nama</label>
					    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
					  
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Agama</label>
					    <input name="agama" type="text" class="form-control" id="exampleInputPassword1" value="">
					  </div>
					  <button type="submit" class="btn btn-warning">Update</button>
			        </form>
			        </div>
	</div>
@endsection