@extends('layouts.app')
@section('content')
<h1>Daftar Pegawai</h1>
	<table border="1" class="table table-striped table-border table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama Pegawai</th>
				<th>Nama Golongan</th>
				<th>Nama Jabatan</th>
				<th>Photo</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($pegawai as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->nip}}</td>
				<td>{{$data->user->name}}</td>
				<td>{{$data->golongan->nama_g}}</td>
				<td>{{$data->jabatan->nama_j}}</td>
				<td><img src="assets/image/{{$data->photo}}" height="150" width="125"></td>

				<td>
					<a href="{{route('pegawai.edit',$data->id)}}" class='btn btn-warning'> Edit </a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$data->id]]) !!}
					{!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a  href="{{url('pegawai/create')}}" class="btn btn-primary form-control">Tambah</a>

@endsection