@extends('adminlte::page')

@section('content')
 <div class="container">
  <div class="row">
   <div class="col-md-6">
    <a href="{{ url('get-pesan') }}" class="btn btn-danger btn-sm">
		Klik Disini
	</a>
	@if ($message = Session::get('success'))
	  <div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		  <strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($message = Session::get('error'))
	  <div class="alert alert-danger alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>	
		<strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($message = Session::get('warning'))
	  <div class="alert alert-warning alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		<strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('info'))
	  <div class="alert alert-info alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>	
		<strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($errors->any())
	  <div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		Please check the form below for errors
	</div>
	@endif

	<table class="table table-striped">
	<tr>
		<th>#</th>
		<th>Nama</th>
		<th>Perusahaan</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Anugrah Sandi</td>
		<td>Codepolitan</td>
	</tr>
	</table>
  </div>
 </div>
</div>
@endsection