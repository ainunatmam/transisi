@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			
		</div>
		<div class="card-body">
			{{-- @foreach($company as $data) --}}
			<div class="form-group">
				<label for="name">Nama Company : </label>
				<h3>{{$company->name}}</h3>
			</div>
			<div class="form-group">
				<label for="email">Email Company : </label>
				<h3>{{$company->email}}</h3>
			</div>
			<div class="form-group">
				<label for="file">Logo Company : </label>
{{-- 				<img src="{{Storage::get('company/'.$company->logo)}}">
 --}}				
			</div>
			<div class="form-group">
				<label for="website">Website Company : </label>
				<h3>{{$company->website}}</h3>
			</div>
			{{-- @endforeach --}}
	</div>
	</div>
	
</div>
@endsection