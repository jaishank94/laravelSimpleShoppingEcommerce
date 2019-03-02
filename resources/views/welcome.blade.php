@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.message')
    <div class="row">
        @foreach ($products->chunk(3) as $productChunk)
            @foreach ($productChunk as $item)
                <div class="col-md-4" style="margin-top:1rem">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $item->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <span>&#8377 {{ $item->price }}</span> <a href="{{ route('addToCart',['id'=>$item->id]) }}" class="btn btn-primary float-right">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top:10px;">
        <div class="col-sm-8 text-center">
                {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
