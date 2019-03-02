@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($orders)>0)
            @foreach ($orders as $order)
                <div class="card" style="margin-top:10px;">
                    <div class="card-header"><b>Total : &#8377 {{ $order->cart->totalPrice }}</b></div>
                        <div class="card-body">
                        @foreach($order->cart->items as $item)
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $item['item']['title'] }} x {{ $item['qty'] }} <span class="badge float-right">{{ $item['price'] }}</span></li>
                            </ul>
                        @endforeach
                        </div>
                </div>
            @endforeach
            @else
            <div class="card" style="margin-top:10px;">
                <div class="card-header">No Purchase History</div>
                    <div class="card-body">
                        Shop Now!!
                    </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
