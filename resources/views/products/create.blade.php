@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label for="name">Name</label>
        
                            <input type="text" class="form-control" name="name" id="name" value="">
        
                        </div>
    
                        <div class="form-group">
    
                            <label for="price">Price</label>
        
                            <input type="text" class="form-control" name="price" id="price" value="">
        
                        </div>
    
                        <div class="form-group">
    
                            {{-- @if (isset($post))
                            <div class="form-group">
                                <img src="{{asset(URL::to('/storage/' .$post->image))}}" alt="">
                            </div>   
                            @endif
                         --}}
                            <label for="image">Image</label>
                        
                            <input type="file" class="form-control" name="image" id="image">
                        
                        </div>
    
                        <div class="form-group">
    
                            <label for="discription">Description</label>
                        
                            <textarea name="discription" id="discription" cols="5" rows="5" class="form-control"></textarea>
                        
                        </div>
    
                        <div class="form-group">
    
                            <button type="submit" class="btn btn-success">Submit</button>
        
                        </div>

                    </form>               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
