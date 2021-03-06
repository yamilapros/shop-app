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
    <h2 class="title">Editar registro</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Nombre del Producto</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción corta del Producto</label>
                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
            </div>
            <div class="form-group">
                <label for="precio">Precio del Producto</label>
                <input type="number" step="0.01" class="form-control" name="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="long_description">Descripción larga</label>
                <textarea class="form-control" name="long_description" rows="3">{{ $product->name }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
</div>
@include('includes.footer')
@endsection