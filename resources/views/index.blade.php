@extends('layouts.master1')

@include('includes.header')


<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
           <li class="active">
           <a href="{{ URL::to('index') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Sites</a>
        </li>

        <li class="active">
            <a href="{{ URL::to('overview') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Overview</a>
        </li>

        <li class="active">
            <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Events</a>
        </li>

        <li class="active">
            <a href="{{ URL::to('about') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
        </li>

        <li class="active">
            <a href="{{ URL::to('services') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Services</a>
        </li>

        <li class="active">
            <a href="contact"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
        </li>

    </ul>
    
</div><!-- /#sidebar-wrapper -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tangerine Sites</a>
  </div>
  <ul class="nav navbar-nav navbar-right">
      <form class="form-inline pull-xs-right">
        <input class="form-control" type="text" placeholder="Search">
        <button class="btn btn-success-outline" type="submit">Search</button>
    </form>
</ul>
</div>
</nav>
<div id="page-content-wrapper">
   <div class="panel panel-success col-md-12 panel2">

    <div class="panel-body">
       <div class="col-md-6">

        @foreach($sites as $site)
        <ul class="display">
        <li>
         <p>Image</p>
                        <p>Site Name: {{ $site->site_name }}</p>
                        <p>Loctation: {{ $site->landmark }}</p>
                        <p>
                            <a href="{{ URL::to('login') }}" class="btn btn-info">Book Site</a>

                        </p>
                        </li>
                        </ul>
        
                
                @endforeach</div>
            </div>
        </div>
    </div>
</div>

