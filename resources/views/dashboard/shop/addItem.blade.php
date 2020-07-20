@extends('layouts.app')

@section('content')
  
    <div class="row container-fluid">
        <div class="col-md-2 side-menu" style="background-color:#A4A4AA; height: 100%;">
            @include('dashboard.sideMenu')
        </div>
        <div class="col-md-10 dashboard-content">
            <div class="card">
                <h5 class="card-header">Add Items</h5>
                <div class="card-body">
                    <div class="container">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('/$d_3c0mm3rc3/shop/item/saveItem') }}">
                            {{ csrf_field() }}

                            <input type="text" name="name" class="form-control" placeholder="Item name">
                            <br>
                            <input type="number" name="price" class="form-control" placeholder="Item price">
                            <br>
                            <textarea name="desc" cols="30" rows="10" class="form-control" placeholder="Item description"></textarea>
                            <br>
                            <input type="text" name="color" class="form-control" placeholder="Item color">
                            <br>
                            <input type="text" name="tag" class="form-control" placeholder="Item tag, e.g. Trending, Hot, New, Sale, etc">
                            <br>
                            <div class="form-group">
                                @foreach ($categories as $category)
                                    <input type="radio" name="category" value="{{$category->title}}"> <label for="{{$category->title}}">{{$category->title}}</label><br>
                                @endforeach
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Next</button>
                            
                        </form>
                    </div>
                </div>
              </div>

        </div>
    </div>
    
@endsection
