@extends('layouts.master1')
@section('title')
Profile
@endsection
@section('content')
<section class="row new-post">
	<div class="col-md-5 col-md-offset-3">
		<h3>Update Your Profile</h3>
		<div class="col-md-5">
			<form action="{{ route('account.save')}}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" name="name" placeholder="" value="{{$user->name}}"></div>
					<div class="form-group">
						<label for="image">Image</label>
						<input class="form-control" type="file" name="image" id="image"  value=""></div>
						<button type="submit" class="btn btn-primary">Save Account</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}"></form>
					</div>
				</div>
			</section>
			@if(Storage::disk('local')->has($user->name . '-'. $user->id .'.jpg'))
			<section class="row new-post">
				<div class="col-md-5 col-md-offset-3">
					<img src="{{route('profile.image',['filename'=>
					$user->first_name . '-'. $user->id .'.jpg'])}}" alt="" class="img-responsive" width="200px" height="300px">
				</div>
			</section>
			@endif
			@endsection