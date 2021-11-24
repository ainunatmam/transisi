<!<!DOCTYPE html>
<html>
<head>
	<title>Cetak PDF</title>
	<style type="text/css">
		table {
		  border-collapse: collapse;
		}
	</style>
</head>
<body>
	<div class="container">
	<div class="card-body">
		<table>
		  <tr>
		  	<th>Nama</th>
		  	<th>Company</th>
		  	<th>Email</th>
		  </tr>
		  @foreach($employe as $data)
		  	<tr>
		  		<td>{{$data->name}}</td>
		  		<td>{{$data->company->name}}</td>
		  		<td>{{$data->email}}</td>
		  	</tr>
		  @endforeach
		</table>
	</div>
</div>
</body>
</html>



