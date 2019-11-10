@extends('layouts.master')

@section('content')
	@if (session('sukses'))
	<div class="alert alert-success" role="alert">
		{{session('sukses')}}		
	</div>
	@endif
	<div class="row">
		<div class="col-6">
			<h1>Data domain</h1>
		</div>
		<div class="col-6">
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  					Tambah data domain
			</button>

			
		</div>
		
<table class="table table-hover">
	<tr>
	<th>Domain</th>
	<th>Url</th>
	<th>Harga</th>
	<th>Terbilang</th>
	<th>Aksi</th>
	</tr>
	@foreach($data_domain as $domain)
	<tr>
		<td>{{$domain->domain }}</td>
		<td>{{$domain->url }}</td>
		<td>{{$domain->harga }}</td>
		<td>{{$domain->terbilang }}</td>
		<td>
		<a href="/domain/{{$domain->id}}/edit" class="btn btn-warning">Edit</a>
		<a href="/domain/{{$domain->id}}/delete" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus')">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
	</div>
</div>

<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah domain</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="/domain/create" method="POST">
			        	{{csrf_field()}}
					  <div class="form-group">
					    <label for="exampleInputEmail1">URL</label>
					    <input name="url" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nama">
					  
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleInputPassword1">Harga</label>
					    <input name="harga" type="text" class="form-control" id="exampleInputPassword1" placeholder="ex: 100000">
					  </div>					
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			        </form>
			      </div>
			    </div>
			  </div>
@endsection

