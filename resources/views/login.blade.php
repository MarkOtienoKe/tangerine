@extends('layouts.master1')

@section('content')
<section class="section1">
    <div class="row col-md-4 col-md-offset-4 login">
  <div class="panel panel-primary">
  <div class="panel-heading">Sign Up</div>
  <div class="panel-body">

     <form action="{{ route('signin') }}" method="post">
           
            <div class="form-group{{$errors->has ('email') ? 'has-error':''}}">
                <label for="email">Email</label>
                <input class="form-control inp" type="text" name="email" value="{{Request::old('email') }}">
            </div>

            <div class="form-group{{$errors->has ('password') ? 'has-error':''}}">
                <label for="password">Password</label>
                <input class="form-control inp" type="password" name="password" value="{{Request::old('password')}}">
            </div>

           
            <button type="submit" class="btn btn-success sub">Login</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <a href="{{URL::to('register')}}">Register</a>
        </form>
  </div>
</div>
</div>


</section>

@endsection