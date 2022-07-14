@extends('product.layout')
{{-- من خلال الـ extends يتم ضمان أن هذا الملف امتداد للـ layout  --}}
@section('content')
{{-- من خلال الـ section يتم المناداة على الملف الذي يحوي على الـ yeild بنفس الاسم الذي ينادى عليه
    في مثالنا الحالي يكون الاسم هو content
--}}
{{-- وبالتالي أصبحت الـ index ضمن الـ layout  --}}


<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="container-fluid">
      <a style="width:90%;font-size: 28px;font-family: monospace;font-weight: bold;" class="text-light navbar-brand" href="#">kinan prducts</a>
        <a href="{{route('product.create')}}" class="btn btn-success">Create </a>
        <a href="{{route('Trash')}}" class="btn btn-warning">Trash </a>
    </div>
</nav>
<div class="pt-5 container">
    {{-- نحن الآن بحاجة إلى المتغير message الذي يتم من خلاله التعامل مع الرسائل الذي يتم إرسالها إلى الـ index عند كل عملية في كل جلسة session --}}
    @if ($message = Session::get('success'))
        <div class="pt-3 pb-3 alert alert-success text-center" role="alert">
            {{$message}}
        </div>
    @endif

    <table class="table table-hover table-striped">
        <thead class="bg-dark text-light">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
        @php
        // من خلال هذا القالب تكون هنا الفرصة للتعامل مع الـ php الأعتيادية
            $i = 0;
        @endphp
          @foreach ($products as $item)
        <tr>
            <th scope="col">{{++$i}}</th>
            <th scope="col">{{$item->name}}</th>
            <th scope="col">{{$item->price}} $</th>
          <td>
                <div class="container">
                    <div class="row">
                      {{-- <div class="col"> --}}
                            {{-- <form action="{{route('product.destroy',$item->id)}}" method="POST">
                                <button type="submit" class="btn btn btn-danger">Delete</button>
                                @csrf
                                {{-- تستخدم csrf من أجل الحماية من الاختراقات  --}}
                                {{-- @method('Delete') --}}
                                {{-- هنا نقوم بتحديد الطريقة وهي طريقة الحذف  --}}

                            {{-- </form> --}}
                      {{-- </div> --}}
                      <div class="col">
                        <a href="{{route('product.edit',$item->id)}}"  class="btn btn-success">Edit</a>
                      </div>
                      <div class="col">
                        <a href="{{route('product.show',$item->id)}}" class="btn btn-primary">Show</a>
                      </div>
                      <div class="col">
                        <a href="{{route('soft.delete',$item->id)}}" class="btn btn-warning">to Trash</a>
                      </div>
                    </div>
                  </div>
          </td>
        </tr>
          @endforeach
        </tbody>
      </table>
      {{-- بما أن الـ products الذي قمنا بإرساله إلى الـ Index يحتوي على pagination نضع هذه الأكواد هنا على الشكل التالي : --}}
        {{-- طبعاً قمنا بوضع أقواس المجموعة هذه من أجل تمرير بارامترات الـ Html tags ضمن الـ blade variables كذلك يمكن أن يسمح بظهور الـ css بداخلها  --}}
        <div class="container pt-3 text-center">
            {!!
            $products->links()
        !!}
            </div>
        </div>
@endsection
