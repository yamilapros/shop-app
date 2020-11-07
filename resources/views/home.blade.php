@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'product-page')

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg') }}')">
<div class="container">
    <div class="row">
    <div class="col-md-6">
        <h1 class="title">Dashboard</h1>
    </div>
    </div>
</div>
</div>
<div class="main main-raised">
<div class="container">
    
    <div class="section text-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        
        {{ __('You are logged in!') }}

        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="nav-link  active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito 
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#schedule-1" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i>
                    Mis Pedidos
                </a>
            </li>
        </ul>
        <ul>
            @if(session('status'))
            {{ session('status') }}
            @endif
            <h4>Tu carrito contiene {{ auth()->user()->cart->details->count() }} produtos.</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">Subtotal</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( auth()->user()->cart->details as $detail )
                    <tr>
                        
                        <td class="text-center">
                            <img src="{{ $detail->product->featured_image_url }}" height="50">
                        </td>
                        <td>{{ $detail->product->name }}</td>
                        <td class="text-right">&euro; {{ $detail->product->price }}</td>
                        <td class="text-right">{{ $detail->quantity }}</td>
                        <td class="text-right">&euro; {{ $detail->quantity * $detail->product->price }}</td>
                        <td class="td-actions text-right">
                            <form  action="{{ url('/cart') }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                <a href="{{ url('/products/'.$detail->product->id) }}" type="button" rel="tooltip" class="btn btn-info">
                                    <i class="material-icons">info</i>
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
            <div>
                <form action="{{ url('/order') }}" method="post">
                    @csrf
                    <button  type="submit" class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
            </div>
        </ul>
        
        
        
    </div>
</div>
</div>
@include('includes.footer')
@endsection







