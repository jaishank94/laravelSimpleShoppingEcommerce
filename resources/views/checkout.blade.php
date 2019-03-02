@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout: Total: {{ $total }}</div>

                <div class="card-body">
               
                <span class="invalid-feedback" role="alert">
                    
                </span>
                <form action="{{ route('postCheckout') }}" method="POST" id="checkout-form">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cardname" class="col-md-4 col-form-label text-md-right">{{ __('Name on card') }}</label>

                        <div class="col-md-6">
                            <input id="cardname" type="text" class="form-control{{ $errors->has('cardname') ? ' is-invalid' : '' }}" name="cardname" value="{{ old('cardname') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cardnumber" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                        <div class="col-md-6">
                            <input id="cardnumber" type="number" class="form-control{{ $errors->has('cardnumber') ? ' is-invalid' : '' }}" name="cardnumber" value="{{ old('cardnumber') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expdate" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Date') }}</label>

                        <div class="col-md-6">
                            <input id="expdate" type="number" class="form-control{{ $errors->has('expdate') ? ' is-invalid' : '' }}" name="expdate" value="{{ old('expdate') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="expyear" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Year') }}</label>

                        <div class="col-md-6">
                            <input id="expyear" type="number" class="form-control{{ $errors->has('expyear') ? ' is-invalid' : '' }}" name="expyear" value="{{ old('expyear') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cvc" class="col-md-4 col-form-label text-md-right">{{ __('CVC') }}</label>

                        <div class="col-md-6">
                            <input id="cvc" type="number" class="form-control{{ $errors->has('cvc') ? ' is-invalid' : '' }}" name="cvc" value="{{ old('cvc') }}" required autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">
                        {{ __('Proceed') }}
                    </button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection