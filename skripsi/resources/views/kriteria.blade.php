    @extends('layout.main')
	@section('content')	
	@if(Session::has('success'))
<p class="alert alert-success">{{ Session::get('success') }}</p><br/>
@endif    
	<div class="card" style="width: 100%;">
		<div class="card-body">
		  <h5 class="card-title">TABEL KRITERIA</h5>
		  <br>
	<table class="table-bordered table">
		<tr>
			<th scope="col">Nama Kriteria</th>
			<th scope="col">Atribut</th>
			<th colspan="2" class="text-center"> AKSI </th>
		</tr>

		@foreach ($data as $key=>$value)
		<tr>
			<td>{{$value->nama}}</td>
			<td>{{$value->atribut}}</td>
			<td><a class="btn btn-info " href="{{url('kriteria/'.$value->id.'/edit')}}"> Update</a></td>
			<td class="text-center">
				<form action="{{ url('kriteria/'.$value->id) }}" method="POST">
					@csrf 
					<input type="hidden" name="_method" value="DELETE">
					<button class="btn btn-danger" type="submit">DELETE</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	<a class="btn btn-info " href="{{url('kriteria/create')}}">Tambah</a>
  </div>
  {{-- <div class="card-footer">
	<a href="hitung-ulang" class="btn btn-primary float-right">Hitung Ulang</a>
</div> --}}
</div>
@endsection


{{-- 	
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">TABEL KRITERIA</h5>
	<table class="table">
		<thead>
		  <tr>
			<th scope="col">no</th>
			<th scope="col">Nama Kriteria</th>
			<th scope="col">Atribut</th>
			<th scope="col">Aksi</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<th scope="row">1</th>
			<td>Sanksi Berorganisasi</td>
			<td>cost</td>
			<td>@mdo</td>
		  </tr>
		  <tr>
			<th scope="row">2</th>
			<td>Status Keanggotaan</td>
			<td>Benefit</td>
			<td>@fat</td>
		  </tr>
		  <tr>
			<th scope="row">3</th>
			<td>Keaktifan</td>
			<td>Benefit</td>
			<td>@twitter</td>
		  </tr>
		  <tr>
			<th scope="row">4</th>
			<td>Pengalaman</td>
			<td>Benefit</td>
			<td>@twitter</td>
		  </tr>
		  <tr>
			<th scope="row">3</th>
			<td>IJDK</td>
			<td>Benefit</td>
			<td>@twitter</td>
		  </tr>
		</tbody>
	  </table>
  </div>
</div> --}}