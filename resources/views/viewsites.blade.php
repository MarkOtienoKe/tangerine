@extends('layouts.master1')
@include('includes.header')
@section('content')

<!-- /#sidebar-wrapper -->
<div id="sidebar-wrapper">
  <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('dashboard')}}">Dashboard</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      
      <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
        
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Sites
              <span class="caret"></span>
              <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>
            </a>
            <ul class="dropdown-menu forAnimate" role="menu">
              <li>
                <a href="{{ URL::to('dashboard')}}">Add Site</a>
              </li>

              <li>
                <a href="{{ URL::to('viewsites')}}">View Sites</a>
              </li>

            </ul>
          </li>
        

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Clients
              <span class="caret"></span>
              <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>
            </a>
            <ul class="dropdown-menu forAnimate" role="menu">
              <li>
                <a href="{{ URL::to('addclient')}}">Add Client</a>
              </li>

              <li>
                <a href="{{ URL::to('viewclient')}}">View Clients</a>
              </li>

            </ul>
          </li>

          <li>
            <a href="{{ URL::to('transaction')}}">
              Transactions
              <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon"></span>
            </a>
          </li>

          <li >
            <a href="{{ URL::to('userprofile')}}">
              Profile
              <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>
            </a>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Settings
              <span class="caret"></span>
              <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span>
            </a>
            <ul class="dropdown-menu forAnimate" role="menu">
              <li>
                <a href="#">Set Password</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
  
<div style="" class="container">
  <div class="panel panel-success col-md-12 panel2">
    <div class="panel-body">
      <div id="map" style="height: 400px"></div>
    </div>
  </div>
</div>
<div class="options-box">
  <div>
    <input id="show-listings" type="button" value="Show Listings">
    <input id="hide-listings" type="button" value="Hide Listings">
  </div>
</div>
<script>
var map;
// Create a new blank array for all the listing markers.
var markers = [];
function initMap() {
var styles = [
{
featureType: 'water',
stylers: [
{ color: '#19a0d8' }
]
},{
featureType: 'administrative',
elementType: 'labels.text.stroke',
stylers: [
{ color: '#ffffff' },
{ weight: 6 }
]
},{
featureType: 'administrative',
elementType: 'labels.text.fill',
stylers: [
{ color: '#e85113' }
]
},{
featureType: 'road.highway',
elementType: 'geometry.stroke',
stylers: [
{ color: '#efe9e4' },
{ lightness: -40 }
]
},{
featureType: 'transit.station',
stylers: [
{ weight: 9 },
{ hue: '#e85113' }
]
},{
featureType: 'road.highway',
elementType: 'labels.icon',
stylers: [
{ visibility: 'off' }
]
},{
featureType: 'water',
elementType: 'labels.text.stroke',
stylers: [
{ lightness: 100 }
]
},{
featureType: 'water',
elementType: 'labels.text.fill',
stylers: [
{ lightness: -100 }
]
},{
featureType: 'poi',
elementType: 'geometry',
stylers: [
{ visibility: 'on' },
{ color: '#f0e4d3' }
]
},{
featureType: 'road.highway',
elementType: 'geometry.fill',
stylers: [
{ color: '#efe9e4' },
{ lightness: -25 }
]
}
];
var locations = [];
$.ajax({
method:'GET',
url: 'http://tangerine.local/obtain',
success: function(results){
$.each(JSON.parse(results),function(site,k){
locations.push(
{
title: k.landmark,
location:
{ lat: parseFloat(k.latitude),
lng: parseFloat(k.longitude)
}
})
console.log(locations);
});
// Constructor creates a new map - only center and zoom are required.
map = new google.maps.Map(document.getElementById('map'), {
center: {lat: -1.2870409, lng: 36.8145043},
zoom: 13,
styles: styles,
mapTypeControl: false
});
var largeInfoWindow = new google.maps.InfoWindow();
// Style the markers a bit. This will be our listing marker icon.
var defaultIcon = makeMarkerIcon('0091ff');
// Create a "highlighted location" marker color for when the user
// mouses over the marker.
var highlightedIcon = makeMarkerIcon('FFFF24');
// The following group uses the location array to create an array of markers on initialize.
for (var i = 0; i < locations.length; i++) {
// Get the position from the location array.
var position = locations[i].location;
var title = locations[i].title;
// Create a marker per location, and put into markers array.
var marker = new google.maps.Marker({
position: position,
title: title,
icon : defaultIcon,
animation: google.maps.Animation.DROP,
id: i
});
// Push the marker to our array of markers.
markers.push(marker);
// Create an onclick event to open an infowindow at each marker.
marker.addListener('click', function() {
populateInfoWindow(this, largeInfowindow);
});
// Two event listeners - one for mouseover, one for mouseout,
// to change the colors back and forth.
marker.addListener('mouseover', function() {
this.setIcon(highlightedIcon);
});
marker.addListener('mouseout', function() {
this.setIcon(defaultIcon);
});
}
document.getElementById('show-listings').addEventListener('click', showListings);
document.getElementById('hide-listings').addEventListener('click', hideListings);
function populateInfoWindow(marker,infowindow){
if(infowindow.marker != marker){
infowindow.setContent('<div' +marker.title + '</div');
infowindow.open(map,marker);
infowindow.addListener('closeclick',function(){
infowindow.setMarker(null);
});
}
}
// This function will loop through the markers array and display them all
function showListings(){
var bounds = new google.maps.LatLngBounds();
for(var i = 0; i < markers.length; i++){
markers[i].setMap(map);
bounds.extend(markers[i].position);
}
map.fitBounds(bounds);
}
//This function loops through markers array and hide them all
function hideListings(){
for(var i = 0; i < markers.length; i++){
markers[i].setMap(null);
}
}
// This function takes in a COLOR, and then creates a new marker
// icon of that color. The icon will be 21 px wide by 34 high, have an origin
// of 0, 0 and be anchored at 10, 34).
function makeMarkerIcon(markerColor) {
var markerImage = new google.maps.MarkerImage(
'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|'+ markerColor +
'|40|_|%E2%80%A2',
new google.maps.Size(21, 34),
new google.maps.Point(0, 0),
new google.maps.Point(10, 34),
new google.maps.Size(21,34));
return markerImage;
}
}
})
}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_q1yDwDlASTfe9-p-a0xb3BY5xXhn_5k&v=3&callback=initMap"></script>
<div class="panel panel-success col-md-12">
<div class="panel-heading">
  <h3 style="color:red" class="panel-title">Added Sites</h3>
</div>
<div class="panel-body">
  <div class="col-md-">
    <table class="table table-striped table-bordered dataTable">
      <thead>
        <th>ID</th>
        <th>Site Name</th>
        <th>Landmark</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Size</th>
        <th>Price</th>
        <th>Status</th>
      </thead>
      <tbody>
        @foreach($sites as $site)
        <tr class="mark">
          <td>{{ $site->id }}</td>
          <td>{{ $site->site_name }}</td>
          <td>{{ $site->landmark }}</td>
          <td>{{ $site->latitude }}</td>
          <td>{{ $site->longitude }}</td>
          <td>{{ $site->size }}</td>
          <td>{{ $site->price }}</td>
          <td>{{ $site->status }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection