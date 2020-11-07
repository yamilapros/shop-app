@extends('layouts.app')

@section('title', 'Listado de productos')
@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <h1 class="title">Bienvenidos a App Shop</h1>
        <h4>Realiza pedidos en línea y te contactaremos para realizar la entrega.</h4>
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
        <i class="fa fa-play"></i> Watch video
        </a>
    </div>
    </div>
</div>
</div>
<div class="main main-raised">
<div class="container">
    
    <div class="section text-center">
    <h2 class="title">Productos disponibles</h2>
    <div class="team">
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-round mb-5">Añadir Producto</a>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                        <td class="text-right">&euro; {{ $product->price }}</td>
                        <td class="td-actions text-right">
                            <form  action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a type="button" rel="tooltip" class="btn btn-info">
                                    <i class="material-icons">person</i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" rel="tooltip" class="btn btn-success">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" class="btn btn-warning">
                                    <i class="material-icons">image</i>
                                </a>
                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                            
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        
        </div>
    </div>
    </div>
</div>
</div>
@include('includes.footer')
@endsection