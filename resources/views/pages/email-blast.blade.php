@extends('master.layout')

@section('title')
	{{ $title }}
@endsection

@section('content')
	
	@include('master.error')

	<div class="row">
		<div class="col-12">
			<h1>{{ $title }}</h1>
			<p>If type: 'Registered User' will get data from production database. No need Excel files.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<form action="{{ url('email-blast') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
		
				<div class="form-group">
					<label for="">Import E-mail Data File (.xls / .xlsx)</label>
					<input type="file" name="file" class="form-control">
				</div>

				<div class="form-group">
					<label for="">E-mail Template</label>
					<select name="template" class="form-control">
						<option value="">Choose Templates</option>
						<option value="Welcome Message">Welcome Message</option>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-secondary" value="SUBMIT">
				</div>
			</form>
		</div>
	</div>
@endsection