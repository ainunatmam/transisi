@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			
		</div>
		<div class="card-body">
		<form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nama Company : </label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Company">
				@error('name')
                    <span class="text-danger d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label for="email">Email Company : </label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Company">
				@error('email')
                    <span class="text-danger d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label for="file">Logo Company : </label>
				<input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" placeholder="Masukkan Logo Company">
				@error('file')
                    <span class="text-danger d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label for="website">Website Company : </label>
				<input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" placeholder="Masukkan Website Company">
				@error('website')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>

			@if($errors->any())
		    {!! implode('', $errors->all('<div>:message</div>')) !!}
		@endif

			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
	</div>
	
</div>
@endsection