Stripe.setPublishableKey("pk_test_m82RssDzKTiCCHx9w3i2UqPO");

var $form = $("#payment-form");
var $errView = $("#charge-error");

$form.submit(function(event){
  $form.find("button").prop("disabled", true);
  Stripe.card.createToken({
      number: $('.card-number').val(),
      cvc: $(".card-cvc").val(),
      exp_month: $(".card-expiry-month").val(),
      exp_year: $(".card-expiry-year").val(),
      name: $("#name").val()
  }, stripeResponseHandler);
  return false;
});

function stripeResponseHandler(status, response){
  if(response.error) {
    $errView.removeClass("hide");
    $errView.text(response.error.message);
    $form.find("button").prop("disabled", false);
  } else {
    var token = response.id;

    $form.append($("<input type='hidden' name='stripeToken'/>").val(token));

    $form.get(0).submit();
  }
}
