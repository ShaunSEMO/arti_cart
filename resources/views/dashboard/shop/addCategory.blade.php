@extends('layouts.app')

@section('content')
  
    <div class="row container-fluid">
        <div class="col-md-2 side-menu" style="background-color:#A4A4AA; height: 100%;">
            @include('dashboard.sideMenu')
        </div>
        <div class="col-md-10 dashboard-content">
            <div class="card">
                <h5 class="card-header">Add Category</h5>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('/$d_3c0mm3rc3/category/save') }}">
                            {{ csrf_field() }}
                            
                            <br>
                            <label for="icon">Select Category Icon</label>
                            <button name="icon" class="btn btn-secondary" data-iconset="fontawesome5" data-icon="fas fa-globe" role="iconpicker"></button>

                            <br>
                            <br>

                            <input type="text" name="title" class="form-control" placeholder="Title">

                            <br>                       

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form> 
                    </div>
                </div>
              </div>

        </div>
    </div>
    
@endsection
