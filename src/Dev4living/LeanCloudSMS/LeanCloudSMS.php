<?php

namespace Dev4living\LeanCloudSMS;

/**
 *
 */
class LeanCloudSMS
{
    protected $header;

    protected $requestSmsCodeUrl = 'https://api.leancloud.cn/1.1/requestSmsCode';

    protected $verifySmsCodeUrl = 'https://api.leancloud.cn/1.1/verifySmsCode';

    public function __construct($config)
    {
        $this->header = $config['header'];
    }

    public static function init($config)
    {
        return new LeanCloudSMS($config);
    }

    /**
     *
     */
    public function requestSmsCode($data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->requestSmsCodeUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret;
    }

    /**
     *
     */
    public function verifySmsCode($data)
    {
        $this->verifySmsCodeUrl .= '/' . $data['verifyCode'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->verifySmsCodeUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret;
    }

}
