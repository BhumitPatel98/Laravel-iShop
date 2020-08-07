@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    <table class="table">
                        
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
        
                            @foreach ($products as $product)
                        
                                <tr>
                                    <td>
                                        {{ $product->name }}
                                    </td>
            
                                    <td>
                                        {{ $product->price }}
                                    </td>
    
                                    <td>
                                       <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>

                                    <td>
                                        <form action="{{ route('products.destroy',$product->id) }}" method="post">

                                            @csrf

                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                       
                                    </td>
                                </tr>
            
                            @endforeach
                            
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection