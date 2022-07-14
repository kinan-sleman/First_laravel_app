@extends('product.layout')
@section('content')
<div class="pt-3 text-center container">
    <div class="alert alert-info" role="alert">
        Product Name : {{$product->name}}
    </div>
</div>
<div class="container">
    <form action="{{route('product.update',$product)}}" method="POST">
        @csrf
        {{-- من أجل حماية الـ form من عمليات الأختراق  --}}
        @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name :</label>
            <input type="text" value="{{$product->name}}" name="name" class="form-control"  placeholder="Product Name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">price :</label>
            <input type="text" name="price"  value="{{$product->price}}" class="form-control"  placeholder="Product price">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Detailes :  </label>
            <textarea name="details"  class="form-control"  rows="3">
                {!!$product->details!!}
            </textarea>
          </div>
          <div class="mb-3 form-group">
            <button type="submit" class="btn btn-primary  ">Update</button>
            <a href="{{route('product.index')}}" type="submit" class="btn btn-warning  ">back</a>
          </div>
    </form>

</div>
@endsection
