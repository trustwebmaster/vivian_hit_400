@extends('layout\layout')

@section('navigationbar')
    @include('layout\student')
@endsection

@section('contents')

@if(session()->has('success'))
<div class="alert alert-danger" role="alert">
    {{ session()->get('success') }}
@endif
<div class="card" style="margin:10px; ">
	<div class="card-header">
	         Submited Assignment
	             <a class="btn btn-primary pull-right" href="{{ route('uploaded.create') }}" >Upload Assignments
	          	</a>
	     </div>
	<div class="card-body">
		<table class="table table-bordered table-dark">
			<thead>
				<th>Description</th>
				<th>File</th>
				<th>Download</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@foreach($files as $file)
				<tr>
					<td>{{ $file->description }}</td>
					<td>{{ $file->file }}</td>
					<td> 
						<a class="btn btn-success btn-sm" href="{{ route('studentdownload' ,$file->id ) }}">Download</a>

					</td>
					<td>
						<a class="btn btn-primary btn-sm" href="{{route('uploaded.edit', $file->id)}}">Edit</a>
					</td>
					<td>
						<form action="{{route('uploaded.destroy', $file->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="Submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@section('modals')
 
@endsection

@section('pagejs')
@endsection