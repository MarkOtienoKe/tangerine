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
    
<!-- /#sidebar-wrapper -->
<div class="panel panel-primary col-md-12 panel2">
    <div class="panel-heading">
        <h3 style="color:white" class="panel-title">Add Site</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            @include('includes.messageblock')
            <form action="{{ route('addsite') }}" method="post">
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input class="form-control" type="text" name="site_name" id="site_name" placeholder="Enter site name" value=""></div>
                    <div class="form-group">
                        <label for="landmark">Landmark</label>
                        <input class="form-control" type="text" id="landmark" name="landmark" placeholder="Enter landmark" value=""></div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input class="form-control" type="text" id="latitude" name="latitude" placeholder=""></div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input class="form-control" type="text" name="longitude" id="longitude" placeholder=""></div>
                                <div class="form-group">
                                    <label for="size" >Size</label>
                                    <select type="text" name="size" class="form-control">
                                        <option value="small">small</option>
                                        <option value="medium">medium</option>
                                        <option value="billboard">billboard</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <select type="text" name="price" class="form-control" id="price">
                                        <option value="1000">1000 per day</option>
                                        <option value="10000">10000 per day</option>
                                        <option value="20000">20000 per day</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select type="text" name="status" class="form-control" id="status">
                                        <option value="open">open</option>
                                        <option value="occupied">occupied</option>
                                        <option value="closed">closed</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}"></form>
                            </div>
                        </div>
                    </div>
                    
                    
                    @include('includes.messageblock')
                    <div class="panel panel-primary col-md-12">
                        <div class="panel-heading">
                            <h3 style="color:white" class="panel-title">Added Sites</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-">
                                <table id="example" class="table table-striped dataTable">
                                    <thead>
                                        <th>ID</th>
                                        <th>Site Name</th>
                                        <th>Landmark</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>status</th>
                                        <th>Update</th>
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
                                            <!-- we will also add show, edit, and delete buttons -->
                                            <td>
             <div class="row col-md-4 col-md-offset-4 sites">
  <div class="panel panel-primary">
  <div class="panel-heading">Add Site</div>
  <div class="panel-body">
      <form action="{{ route('addsite') }}" method="post">
                <div class="input-group">
                    <label for="site_name">Site Name</label>
                    <input class="form-control inp" type="text" name="site_name" id="site_name" placeholder="Enter site name" value=""></div>
                    <div class="input-group">
                        <label for="landmark">Landmark</label>
                        <input class="form-control inp" type="text" id="landmark" name="landmark" placeholder="Enter landmark" value=""></div>
                        <div class="input-group">
                            <label for="latitude">Latitude</label>
                            <input class="form-control inp" type="text" id="latitude" name="latitude" placeholder=""></div>
                            <div class="input-group">
                                <label for="longitude">Longitude</label>
                                <input class="form-control inp" type="text" name="longitude" id="longitude" placeholder=""></div>
                                <div class="input-group">
                                    <label for="size" >Size</label>
                                    <div class="col-sm-6 col-md-4">
                                    <select type="text" name="size" class="form-control inp">
                                        <option value="small">small</option>
                                        <option value="medium">medium</option>
                                        <option value="billboard">billboard</option>
                                    </select>
                                    </div>
                                        
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label for="price">Price</label>
                                    <select type="text" name="price" class="form-control inp" id="price">
                                        <option value="1000">1000 per day</option>
                                        <option value="10000">10000 per day</option>
                                        <option value="20000">20000 per day</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="status">Status</label>
                                    <select type="text" name="status" class="form-control inp" id="status">
                                        <option value="open">open</option>
                                        <option value="occupied">occupied</option>
                                        <option value="closed">closed</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}"></form>
                            </div>
                        </div>
                    </div>
           
  </div>
</div>
</div>