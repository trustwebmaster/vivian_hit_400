@extends('layout\layout')

@section('navigationbar')
    @include('layout\student')
@endsection

@section('contents')

<div class="col-md-10">
<div class="card" style="margin:10px;">
	<div class="card-header">{{ isset($upload) ? 'Edit Assignment' : 'Submit Assignment' }}</div>
	<div class="card-body">
		<form method="post" action="{{ isset($upload) ? route('uploaded.update', $upload->id) : route('uploaded.store') }}" enctype="multipart/form-data">
			@csrf
			@if(isset($upload))
				@method('PATCH')
			@endif
			<div class="form-group">
				<label for="description">Description</label>
				<textarea id="description" name="description" class="form-control" placeholder="Description">{{ isset($upload) ? $upload->description : '' }}</textarea>
			</div>

			<div class="form-group">
				<label for="file">Document</label>
				<input type="file" name="file" id="file" class="form-control">
			</div>

			<div class="form-group">
				<button type="Submit" class="btn btn-primary">Submit</button>
			</div>
			
		</form>
	</div>
</div>
</div>

@endsection

@section('modals')
 
@endsection

@section('pagejs')
@endsection