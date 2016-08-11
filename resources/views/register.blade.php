@extends('layouts.master1')

@section('content')

<section class="section1">
<div class="row col-md-4 col-md-offset-4 login">
  <div class="panel panel-primary">
  <div class="panel-heading">Sign Up</div>
  <div class="panel-body">

     <form action="{{ route('signup') }}" method="post">
            <div class="form-group{{$errors->has ('name') ? 'has-error':''}}">
                <label for="name" class="labelh">Name</label>
                <input class="form-control inp" type="text" name="name" value="{{Request::old('name') }}">
            </div>

            <div class="form-group{{$errors->has ('email') ? 'has-error':''}}">
                <label for="email">Email</label>
                <input class="form-control inp" type="text" name="email" value="{{Request::old('email') }}">
            </div>

            <div class="form-group{{$errors->has ('password') ? 'has-error':''}}">
                <label for="password">Password</label>
                <input class="form-control inp" type="password" name="password" value="{{Request::old('password')}}">
            </div>

            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control inp" type="password" name="confirm_password">
            </div>

            <button type="submit" class="btn btn-success sub">Register</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
<p class="account"><a href="{{URL::to('login')}}">Already have an account</a></p>
  </div>
</div>
</div>

</section>
@endsection


