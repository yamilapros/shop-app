@extends('layouts.app')

@section('title', 'Listado de productos')
@section('body-class', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <h1 class="title">Bienvenidos a App Shop</h1>
    </div>
    </div>
</div>
</div>
<div class="main main-raised">
<div class="container">
    
    <div class="section text-center">
    <h2 class="title">Imágenes del producto "{{ $product->name }}"</h2>
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <form action="{{ url('/admin/products/'.$product->id.'/images') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary btn-round">Subir Imagen</button>
            </form>
        </div>
        <div class="col-md-4">
            <a href="{{ url('/admin/products') }}" class="btn btn-primary btn-round">Volver al listado de productos</a>
        </div>
    </div>
    <hr>
    <div class="row">
    @foreach($images as $image)
        <div class="col-md-4">
            <img src="{{ $image->url }}" alt="" width="250">
            {{--  <img src="{{asset('/images/products/'.$image->image)}}" alt="">  --}}
            <form action="{{ url('/admin/products/'.$product->id.'/images') }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                @if($image->featured)
                <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i>
                </button>
                @else
                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-info btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i>
                </a>
                @endif
                <button type="submit" class="btn btn-danger btn-round">Eliminar Imagen</button>
            </form>
            
        </div>
    @endforeach
    </div>
    
    
    
    </div>
</div>
</div>
@include('includes.footer')
@endsection