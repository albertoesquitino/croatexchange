<!doctype html>
@extends('layouts.main')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
        <div class="col-md-6">
        <center>
          <div class="card" style="width: 40rem;">
 <div class="card-body">
   <h5 class="card-title">Comprar       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buymodal">Añadir oferta</button></h5>

   <table class="table">
   <thead>
     <tr>
       <th scope="col">Id</th>
       <th scope="col">Usuario telegram</th>
       <th scope="col">Precio de compra</th>
       <th scope="col">Minimo de croats</th>
     </tr>
   </thead>
      @foreach($buys as $buy)
   <tbody>
     <tr>
       <th scope="row">{{ $buy->id}}</th>
       <td><a href="https://t.me/{{$buy->username}}">{{ $buy->username }}</a></td>
       <td>{{ $buy->price}}</td>
       <td>{{ $buy->minimum}}</td>
     </tr>
   </tbody>
   @endforeach
 </table>
 </div>
</div></center>
        </div>
        <div class="col-md-6">
          <center>
            <div class="card" style="width: 40rem;">
  <div class="card-body">
    <h5 class="card-title">Vender       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sellmodal">Añadir oferta</button></h5>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Usuario telegram</th>
        <th scope="col">Precio de venta</th>
      </tr>
    </thead>
    @foreach($sells as $sell)
    <tbody>
      <tr>
        <th scope="row">{{ $sell->id }}</th>
        <td><a href="https://t.me/{{$sell->username}}">{{ $sell->username }}</a></td>
        <td>{{ $sell->price }}</td>
      </tr>
    </tbody>
    @endforeach
  </table>
  </div>
</div>
</div></center>
    </div>

<!-- Ventana modal para la compra -->
<div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir oferta de compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('buy.store') }}" method="post">
            {{ csrf_field() }}

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" class="form-control" required name="username" placeholder="Alias en telegram (Los interesados contactaran por hay )" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="price" aria-label="Amount (to the nearest euros)" placeholder="Precio por croat en euros">
          <div class="input-group-append">
            <span class="input-group-text">€</span>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="minimum" placeholder="Minimo de croats que compras">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Publicar Oferta</button>
      </div>
              </form>
    </div>
  </div>
</div>
<!-- Fin de la ventana modal de compra-->

<!-- Ventana modal para la venta-->
<div class="modal fade" id="sellmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir oferta de venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('sell.store') }}" method="post">
            {{ csrf_field() }}

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" class="form-control" required name="username" placeholder="Alias en telegram (Los interesados contactaran por hay )" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="price" aria-label="Amount (to the nearest euros)" placeholder="Precio por croat en euros">
          <div class="input-group-append">
            <span class="input-group-text">€</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Publicar Oferta</button>
      </div>
              </form>
    </div>
  </div>
</div>
<!-- Fin de la venta modal para la venta-->
@endsection
</html>
