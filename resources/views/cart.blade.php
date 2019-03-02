@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (Session::has('cart'))
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key=>$item)
                    {{-- {{ dd($item['item']['id']) }} --}}
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $item['item']['title'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove One" href="{{ route('getItemRemoveByOne',['id'=>$item['item']['id']]) }}"><i class="fa fa-minus"></i></a>
                            <a class="btn btn-sm btn-success" data-toggle="tooltip" title="Add One!" href="{{ route('getItemAddByOne',['id'=>$item['item']['id']]) }}"><i class="fa fa-plus"></i></a>
                            <a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Remove All" href="{{ route('getItemRemoveAll',['id'=>$item['item']['id']]) }}"><i class="fa fa-minus-square"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                    <li class="list-group-item" style="width:100%">
                        <b>Total Payable Amount: &#8377 {{ $totalPrice }} </b>
                        <a href={{ route('checkout') }} class="btn btn-primary float-right" >Checkout &#8377 {{ $totalPrice }}</a>
                    </li>
            </div> 
        @else 
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-top:10px;">
                        <div class="card-header">Your Cart is Empty</div>
                            <div class="card-body">
                                Empty Cart!!
                            </div>
                    </div>
                </div>
            </div> 
        @endif
        </div>
    </div>
</div>
@endsection
