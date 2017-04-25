<?php
return [
    'pay_test_mode'           => true,
    'EPAY_BACK_LINK'          => 'http://epay.kkb.kz/jsp/hbpay/pay_req.jsp',
    'EPAY_POST_LINK'          => 'http://epay.kkb.kz/jsp/hbpay/pl.jsp',
    'EPAY_FORM_TEMPLATE'      => 'default.xsl',
    "MERCHANT_CERTIFICATE_ID" => "00c183d70b",
    "MERCHANT_NAME"           => "Test shop 3",
    "PRIVATE_KEY_PATH"        => base_path("storage/app/epay/kkb/cert.prv"),
    "PRIVATE_KEY_PASS"        => "1q2w3e4r",
    'PRIVATE_KEY_ENCRYPTED'   => 1,
    "XML_TEMPLATE_FN"         => base_path("storage/app/epay/kkb/template.xml"),
    "XML_COMMAND_TEMPLATE_FN" => base_path("storage/app/epay/kkb/command_template.xml"),
    "PUBLIC_KEY_PATH"         => base_path("storage/app/epay/kkb/kkbca_test.pub"),
    "MERCHANT_ID"             => "92061103",
];
