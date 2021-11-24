@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			
		</div>
		<div class="card-body">
		<form action="{{route('employes.store')}}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nama Employees : </label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Company">
				@error('name')
                    <span class="text-danger d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label for="company_id">Company : </label>
				<select name="company_id" class="select2">
					<option value="1" selected>Perusahaan 1</option>
				</select>
				@error('company_id')
                    <span class="text-danger d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group">
				<label for="file">Email : </label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Employees">
				@error('file')
                    <span class="text-danger d-block" role="alert">
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

@push('script')
<script>
    	$('.select2').select2();
</script>
@endpush