@extends ("shop.master")

@section("title") Shopping Cart | Checkout @endsection

@section("content")
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <h1>
            Checkout
        </h1>
        <h4>
            Your total: ${{$total}}
        </h4>
    </div>
    <form action="{{route("checkout")}}" method="post">
      {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <script src="https://js.stripe.com/v2/" type="text/javascript">
                    </script>
                    <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post">
                        <div style="margin:0;padding:0;display:inline">
                            <input name="utf8" type="hidden" value="✓"/>
                            <input name="_method" type="hidden" value="PUT"/>
                            <input name="authenticity_token" type="hidden" value=""/>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-12 form-group required">
                                <label class="control-label">
                                    Name on Card
                                </label>
                                <input class="form-control" size="4" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-12 form-group card required">
                                <label class="control-label">
                                    Card Number
                                </label>
                                <input autocomplete="off" class="form-control card-number" size="20" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xs-4 form-group cvc required">
                                <label class="control-label">
                                    CVC
                                </label>
                                <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text">
                                </input>
                            </div>
                            <div class="col-xs-4 form-group expiration required">
                                <label class="control-label">
                                    Expiration
                                </label>
                                <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text">
                                </input>
                            </div>
                            <div class="col-xs-4 form-group expiration required">
                                <label class="control-label">
                                </label>
                                <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text">
                                </input>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <button class="form-control btn btn-primary submit-button" type="submit">
                                    Pay »
                                </button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">
                                    Please correct the errors and try again.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
