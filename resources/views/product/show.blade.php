@extends('product.layout')
@section('content')
<div class="pt-3 text-center container">
    <div class="alert alert-info" role="alert">
        Product Name : {{$product->name}}
    </div>
</div>
<div class="container">


      <div class="card text-center">
        <div class="card-header">
            {{$product->name}}
        </div>
        <div class="card-body">
          <h5 class="card-title">price :{{$product->price}}</h5>
          <p class="card-text">{!!$product->details!!}</p>
          <a href="{{route('product.index')}}" class="btn btn-primary card-link">Back</a>
        </div>
      </div>


</div>
@endsection
