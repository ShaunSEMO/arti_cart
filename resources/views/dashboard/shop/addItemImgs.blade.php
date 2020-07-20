@extends('layouts.app')

@section('content')
  
    <div class="row container-fluid">
        <div class="col-md-2 side-menu" style="background-color:#A4A4AA; height: 100%;">
            @include('dashboard.sideMenu')
        </div>
        <div class="col-md-10 dashboard-content">
            <div class="card">
                <h5 class="card-header">Add Images</h5>
                <div class="card-body">
                    <div class="container">
                        {!! Form::open(['action' => 'DashboardController@saveItemImages', 'files' => true, 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form1']) !!}

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        {{ Form::label('image', 'Image') }}
                                            <br>
                                        {{ Form::file('image[]',['class' => 'form-control', 'multiple' => true] ) }}

                                        {{ Form::hidden('item_category', $item_category) }}
                                        {{ Form::hidden('item_name', $item_name) }}
                                        {{ Form::hidden('item_price', $item_price) }}
                                        {{ Form::hidden('item_desc', $item_desc) }}
                                        {{ Form::hidden('item_color', $item_color) }}
                                        {{ Form::hidden('item_tag', $item_tag) }}

                                    </div>
                                </div>
                            </div>

                            {{ Form::submit('Save image(s)', ['class' => 'btn btn-primary']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
              </div>

        </div>
    </div>
    
@endsection
