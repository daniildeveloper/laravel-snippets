<?php
// require_once("../paysys/kkb.utils.php");
// $self = $_SERVER['PHP_SELF'];
// $path1 = '../paysys/config.txt';  // ?? ???????? config.dat
// $order_id = 1;        // ???????????? - ??????? ???? "000001"
// $currency_id = "398";       // ?? ???  - 840-USD, 398-Tenge
// $amount = 10;       // ???????
// $content = process_request($order_id,$currency_id,$amount,$path1); // ?????????????base64 ???????XML ???? ?? ???? ???
?>
<html>
<head>
<title>Pay</title>
<meta http-equiv="Content-Type" content="text/html;">
</head>
<body>
<form name="SendOrder" method="post" action="https://epay.kkb.kz/jsp/process/logon.jsp">
   <input type="hidden" name="Signed_Order_B64" value="{{$content}}">
   E-mail: <input type="text" name="email" size=50 maxlength=50  value="">
   <p>
   <input type="hidden" name="Language" value="eng">
   <input type="hidden" name="BackLink" value="{{url("/")}}">
   <input type="hidden" name="PostLink" value="{{url('postlink')}}">
   С платежом согласен<br>
   <input type="submit" name="GotoPay"  value="Pay" >&nbsp;
</form>
</body>
</html>
