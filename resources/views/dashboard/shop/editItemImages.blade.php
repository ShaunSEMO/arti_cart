@extends('layouts.app')

@section('content')
  
    <div class="row container-fluid">
        <div class="col-md-2 side-menu" style="background-color:#A4A4AA; height: 100%;">
            @include('dashboard.sideMenu')
        </div>
        <div class="col-md-10 dashboard-content">
            <div class="card">
                <h5 class="card-header">Edit Images</h5>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-md-3">
                                    <img class="img-fluid" src="{{ asset($image->image) }}" alt="Item image">
                                    <br><br>
                                    {!! Form::open(['action' => ['DashboardController@deleteItemImage', $image->id], 'method' => 'POST']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}

                                        {{ Form::hidden('item_category', $item_input_category) }}
                                        {{ Form::hidden('item_name', $item_input_name) }}
                                        {{ Form::hidden('item_price', $item_input_price) }}
                                        {{ Form::hidden('item_desc', $item_input_desc) }}
                                        {{ Form::hidden('item_color', $item_input_color) }}
                                        {{ Form::hidden('item_tag', $item_input_tag) }}
                                        {{ Form::hidden('item_id', $item_input_id) }}

                                        {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                    {!!Form::close()!!}
                                </div> 
                            @endforeach
                        </div>
                        <br>
                        <br>
                        <div class="container bg-dark rounded">
                            <br>
                            <h5 class="text-light">Add Item Images</h5>
                            
                            {!! Form::open(['action' => ['DashboardController@saveItemEditImages', $item_input_id], 'files' => true, 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form1']) !!}

                                <div class="form-group">
                                    {{ Form::file('image[]',['class' => 'form-control', 'multiple' => true] ) }}

                                    {{ Form::hidden('item_category', $item_input_category) }}
                                    {{ Form::hidden('item_name', $item_input_name) }}
                                    {{ Form::hidden('item_price', $item_input_price) }}
                                    {{ Form::hidden('item_desc', $item_input_desc) }}
                                    {{ Form::hidden('item_color', $item_input_color) }}
                                    {{ Form::hidden('item_tag', $item_input_tag) }}
                                    {{ Form::hidden('item_id', $item_input_id) }}

                                </div>
                                {{ Form::submit('Save image(s)', ['class' => 'btn btn-primary']) }}

                            {!! Form::close() !!}
                            <br>
                        </div>

                        {!! Form::open(['action' => ['DashboardController@updateItemAll', $item_input_id], 'files' => true, 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'form1']) !!}

                                <div class="form-group">

                                    {{ Form::hidden('item_category', $item_input_category) }}
                                    {{ Form::hidden('item_name', $item_input_name) }}
                                    {{ Form::hidden('item_price', $item_input_price) }}
                                    {{ Form::hidden('item_desc', $item_input_desc) }}
                                    {{ Form::hidden('item_color', $item_input_color) }}
                                    {{ Form::hidden('item_tag', $item_input_tag) }}
                                    {{ Form::hidden('item_id', $item_input_id) }}

                                </div>
                                {{ Form::submit('Save Item', ['class' => 'btn btn-primary']) }}

                        {!! Form::close() !!}
                    </div>
                </div>
              </div>

        </div>
    </div>
    
@endsection
