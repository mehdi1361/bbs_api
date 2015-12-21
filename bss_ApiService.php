<?php

/**
 * Date: 12/20/15
 * Time: 9:38 AM
 */

require_once 'models/SendServiceProviderCommentRequest.php';
require_once 'models/AddServiceProviderRequest.php';
class bss_ApiService
{
    /**
     *
     */
    private $_publicKey;
    private $_privateKey;
    private $_apiUrl;
    private $_token;
    private $_userIp;

    public  function ApiService($publicKey, $privateKey, $ApiUrl, $userIp)
    {
        $this->_publicKey = $publicKey;
        $this->_privateKey = $privateKey;
        $this->_apiUrl = $ApiUrl;
        $this->_userIp = $userIp;

    }
    public function Login($serviceProviderId)
    {

        $url = $this->_apiUrl ."/ServiceProvider/Login?serviceProviderId=". $serviceProviderId;
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        $this->_token= $result['Content'];
        print_r($result);
    }
    public function GetProvince()
    {
        $url = $this->_apiUrl ."/sdp/GetProvince";
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        print_r($result);
    }

    public function GetTownByProvince($provinceId)
    {
        $url = $this->_apiUrl ."/sdp/GetTownByProvince?provinceId=" . $provinceId;
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        $this->_token= $result['Content'];
        print_r($result);
    }

    public function AddServiceProvider($obj)
    {
        $url = $this->_apiUrl ."/sdp/AddServiceProvider" ;
        $req = json_encode($obj);
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-ServiceProviderToken: '. $this->_token;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        $header[] = 'Content-Type: application/json';

        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $req);
        curl_setopt($crl, CURLOPT_POST,true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        print_r($result);
    }
    public  function SendServiceProviderComment($obj)
    {
        $url = $this->_apiUrl ."/sdp/SendServiceProviderComment" ;
        $req = json_encode($obj);
        print_r($req);
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-ServiceProviderToken: '. $this->_token;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        $header[] = 'Content-Type: application/json';

        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $req);
        curl_setopt($crl, CURLOPT_POST,true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        print_r($result);
    }
    public function GetServiceProviderByReseller()
    {
        $url = $this->_apiUrl ."/sdp/GetServiceProviderByReseller";
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-ServiceProviderToken: '. $this->_token;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        $this->_token= $result['Content'];
        print_r($result);
    }
    public function GetServiceProviderStatus()
    {
        $url = $this->_apiUrl ."/sdp/GetServiceProviderStatus";
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-ServiceProviderToken: '. $this->_token;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        print_r($result);
    }
    public function GetServiceProviderComments()
    {
        $url = $this->_apiUrl ."/sdp/GetServiceProviderComments";
        $crl = curl_init();
        $header = array();
        $header[] = 'X-ApiAuth-Username:'.$this->_publicKey;
        $header[] = 'X-ApiAuth-Password: '. $this->_privateKey;
        $header[] = 'X-ApiAuth-ServiceProviderToken: '. $this->_token;
        $header[] = 'X-ApiAuth-UserIp:' . $this->_userIp;
        $header[] = 'X-ApiAuth-UniqueId: '.microtime(true);
        curl_setopt($crl, CURLOPT_URL,$url);
        curl_setopt($crl, CURLOPT_HTTPHEADER,$header);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_HTTPGET, true);
        $rest = curl_exec($crl);
        curl_close($crl);
        $result = json_decode($rest,true);
        print_r($result);
    }
}
