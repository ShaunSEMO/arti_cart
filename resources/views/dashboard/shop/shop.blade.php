<div class="shop-section container-fluid">
    <a class="btn btn-primary" href="{{ url('/$d_3c0mm3rc3/shop/category/add') }}">Add Category</a>
    <br>
    <br>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3 container">
                <i style="font-size: 50px" class="{{ $category->icon }}"></i>
                <br>
                <p>{{ $category->title }}</p>
            </div> 
        @endforeach
    </div>
    <br>

    <div class="card">
        <h5 class="card-header">Items</h5>
        <div class="card-body">
                <a class="btn btn-primary" href="{{ url('/$d_3c0mm3rc3/shop/item/add') }}">Add Item</a>
                <br>
                <div class="accordion" id="accordionExample">
                    @foreach ($categories as $category)
                        <div class="card">
                            <div class="card-header" id="{{ 'heading'.$category->id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{ '#collapse'.$category->id }}" aria-expanded="true" aria-controls="{{ 'collapse'.$category->id }}">
                                        {{ $category->title }}
                                    </button>
                                </h5>
                            </div>
                        
                            <div id="{{ 'collapse'.$category->id }}" class="collapse" aria-labelledby="{{ 'heading'.$category->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($category->items as $item)
                                        <div class="col-md-4">
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
                                                <div class="carousel-inner">
                                                    <div style="background: url('{{ asset($item->images->first()->image) }}'); width: 300px; height: 300px; background-repeat: no-repeat; background-position: center center; background-size: cover;" class="carousel-item active">
                                                    </div>
                                                    @foreach ($item->images as $key => $image)
                                                        @if($key > 0)
                                                            <div style="background: url('{{ asset($image->image) }}'); width: 300px; height: 300px; background-repeat: no-repeat; background-position: center center; background-size: cover;" class="carousel-item">
                                                                
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <br>
                                            <h1>{{ $item->name }}</h1>
                                            <h3>R{{ $item->price }}</h3>
                                            <p>{{ $item->desc }}</p>
                                            <h5>{{ $item->color }}</h5>
                                            <small>{{ $item->tag }}</small>
                                            <br>
                                            <br>
                                            <a class="btn btn-outline-warning" href="{{ url('/$d_3c0mm3rc3/shop/'.$item->id.'/edit') }}">Edit</a>
                                            {!! Form::open(['action' => ['DashboardController@deleteItem', $item->id], 'method' => 'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                            {!!Form::close()!!}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>  
                    @endforeach
                    
                </div>
        </div>
    </div>

</div>