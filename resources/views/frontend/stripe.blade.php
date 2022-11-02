<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <h5 class="modal-title" id="staticBackdropLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <p class="stripe-error py-3 text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label class="control-label">Name on Card</label>
                            <input type="text" class="form-control" required size="4">
                        </div>
                    </div>

                    <div class="col-md-12 required">
                        <div class="form-group">
                            <label class="control-label">Card Number</label>
                            <input autocomplete='off' class='form-control card-number' size='20' type='text'
                                name="card_no">
                        </div>
                    </div>

                    <div class="col-md-4 required">
                        <div class="form-group">
                            <label class='control-label'>CVC</label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                                type='text' name="cvvNumber">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Expiration Month</label>
                            <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text'
                                name="ccExpiryMonth">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class='control-label'>Expiration Year</label>
                            {{-- <input type="text" class="form-control card-expiry-year" required placeholder="YYYY" size="4"> --}}
                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                type='text' name="ccExpiryYear">
                            {{-- <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                type='hidden' name="amount" value="300"> --}}
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 form-group d-none">
                        <div class="alert-danger alert">
                            <h6 class="inp-error">Please correct the errors and try again.</h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <input hidden type="text" name="stipe_payment_btn" value="1">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Pay Now with Stripe</button>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
