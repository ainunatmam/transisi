@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card-body">
		<a href="{{route('company.create')}}" class="btn btn-success">Tambah Company</a>
		<table class="table table-striped">
		  <tr>
		  	<th>Nama</th>
		  	<th>Email</th>
		  	<th>Website</th>
		  	<th>Aksi</th>
		  </tr>
		  @foreach($company as $data)
		  	<tr>
		  		<td>{{$data->name}}</td>
		  		<td>{{$data->email}}</td>
		  		<td>{{$data->website}}</td>
		  		<td><a href="{{route('company.edit', ['company' => $data->id])}}" class="btn btn-info">Edit</a>
		  			<a href="{{route('company.show', ['company' => $data->id])}}" class="btn btn-primary">Detail</a>
		  			<form id="destroy-form" action="{{ route('company.destroy', $data->id) }}" method="POST">
					    @method('DELETE')
					    @csrf
					    <button type="submit" class="btn btn-danger">Hapus</button>
					</form>

		  		</td>
		  	</tr>
		  @endforeach
		</table>
		{{$company->links()}}
	</div>
</div>


@endsection