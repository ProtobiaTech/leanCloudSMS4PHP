<?php

// require core class
require '../src/Dev4living/LeanCloudSMS/LeanCloudSMS.php';

// header
$config['header'] = [
    'X-AVOSCloud-Application-Id: @todo',           // @todo your app id
    'X-AVOSCloud-Application-Key: @todo',           // @todo your app key
];

// @todo your test phonenumber
$testPhoneNumber = '17090402884';

// @todo
$verifyCode = 'please write';





/** */
$config['header'][] = 'Content-Type: application/json';
$data = '{"mobilePhoneNumber": "' . $testPhoneNumber . '"}';
$ret = \Dev4living\LeanCloudSMS\LeanCloudSMS::init($config)->requestSmsCode($data);
var_dump($ret);

die('require sms over');
/** */





/**  */
// verify sms
$data = [
    'mobilePhoneNumber' =>  $testPhoneNumber,
    'verifyCode'        =>  $verifyCode,
];
$ret = \Dev4living\LeanCloudSMS\LeanCloudSMS::init($config)->verifySmsCode($data);
var_dump($ret);

die('verify sms over');
