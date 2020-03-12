@extends('page.layout.page')
@section('title','CheckOut')
@section('title page','Payment')
@section('content')
    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="{{ route('list.shopping.cart') }}" class="check-bc">Cart</a> <span
                                class="step_line step_complete"> </span> <span
                                class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="{{ route('checkout.shopping') }}" class="check-bc">Checkout</a> <span
                                class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{ route('payment.shopping') }}">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order
                            <div class="pull-right"><small><a class="afix-1" href="{{ route('list.shopping.cart') }}">Edit
                                        Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                            @foreach($products as $product)
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive"
                                             src="{{ 'data:image/jpeg;base64,'.$product->options->image }}"/>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{ $product->name }}</div>
                                        <div class="col-xs-12"><small>Quantity:<span>{{ $product->qty }}</span></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>
                                            <span>$</span>{{ number_format($product->qty * $product->price , 0, ',', ' ') }}
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <hr/>
                            </div>

                            <div class="form-group">
                                <hr/>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::subtotal(0, ',', ' ') }}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <span>Shipping</span>
                                    <div class="pull-right"><span><i>Free Ship</i></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <hr/>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span>{{ Cart::subtotal(0, ',', ' ') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <h3>Address</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Payment Information</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>
                                        Recipient's Name :</strong>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="tr_user_name" class="form-control"
                                           value="{{ Auth::user()->name }}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control"
                                           value="{{ Auth::user()->email }}" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tr_address" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tr_city" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tr_phone" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Note:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="tr_note" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit">Confirm Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                </div>
            </form>
        </div>
    </div>
@endsection
