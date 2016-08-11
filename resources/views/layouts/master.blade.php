<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('src/css/admin.css')}}">
    <link rel="stylesheet" href="{{ URL::to('src/css/sidebar.css')}}">

</head>
<body>

 <div class="container">
     @yield('content')
 </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
  <script src="{{URL::to('src/js/app.js')}}"></script>
  <script src="{{URL::to('src/js/datatable.js')}}"></script>
  <script src="{{URL::to('src/js/chooser.js')}}"></script>
  <script src="{{URL::to('src/js/client.js')}}"></script>
</body>
</html>
