@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card-body">
		<a href="{{route('employes.create')}}" class="btn btn-success">Tambah Employe</a>
		<a href="{{route('cetak_pdf')}}" class="btn btn-success">Cetak PDF</a>

		<table class="table table-striped">
		  <tr>
		  	<th>Nama</th>
		  	<th>Company</th>
		  	<th>Email</th>
		  	<th>Aksi</th>
		  </tr>
		  @foreach($employe as $data)
		  	<tr>
		  		<td>{{$data->name}}</td>
		  		<td>{{$data->company->name}}</td>
		  		<td>{{$data->email}}</td>
		  		<td><a href="{{route('employes.edit', ['employe' => $data->id])}}" class="btn btn-info">Edit</a>
		  			<a href="{{route('employes.show', ['employe' => $data->id])}}" class="btn btn-primary">Detail</a>
		  			<form id="destroy-form" action="{{ route('employes.destroy', $data->id) }}" method="POST">
					    @method('DELETE')
					    @csrf
					    <button type="submit" class="btn btn-danger">Hapus</button>
					</form>

		  		</td>
		  	</tr>
		  @endforeach
		</table>
		{{$employe->links()}}
	</div>
</div>


@endsection