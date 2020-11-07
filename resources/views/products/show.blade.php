@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'profile-page sidebar-collapse')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ $product->name }}</h3>
                <h6>{{ $product->category ? $product->category->name : 'General' }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>{{ $product->long_description }}</p>
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#cartModal">
                <i class="material-icons">favorite</i> Añadir al carrito
            </button>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="studio">
            <div class="row">
                @foreach($images as $image)
                <div class="col-md-3 ml-auto">
                    <img src="{{ $image->url }}" class="rounded">
                </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  //Modal
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Cuántas unidades desea añadir?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ url('/cart') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" class="form-control" name="quantity">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
    </div>
    </div>
</div>
</div>
@include('includes.footer')
@endsection








