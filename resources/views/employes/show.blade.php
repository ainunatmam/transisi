@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			
		</div>
		<div class="card-body">
			{{-- @foreach($company as $data) --}}
			<div class="form-group">
				<label for="name">Nama Employee : </label>
				<h3>{{$employe->name}}</h3>
			</div>
			<div class="form-group">
				<label for="email">Company : </label>
				<h3>{{$employe->company->name}}</h3>
			</div>
			<div class="form-group">
				<label for="website">Email Employees : </label>
				<h3>{{$employe->email}}</h3>
			</div>
			{{-- @endforeach --}}
	</div>
	</div>
	
</div>
@endsection