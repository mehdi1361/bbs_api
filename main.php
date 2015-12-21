<?php

/**
 * Date: 12/21/15
 * Time: 11:28 AM
 */
require_once 'bss_ApiService.php';
$service = new bss_ApiService();
//Declare Api Service...................
$service->ApiService("Yara", "1qazXSW@","http://api.bss.yaravas.com", "192.168.1.1");
echo "\n";

//Login method....................................
$service->Login(364); //please put serviceId
//GetProvince.....................................
//$service ->GetProvince();

// GetTownByProvince with ProvinceId..............
$service -> GetTownByProvince(5);

//GetServiceProviderByReseller....................
$service->GetServiceProviderByReseller();

//SendServiceProviderCommentRequest...............
$obj = new SendServiceProviderCommentRequest();
$obj->ServiceProviderId=364;
$obj->Body ="Hello World";
$service->SendServiceProviderComment($obj);

// Add Service Provider...........................
$obj = new AddServiceProviderRequest();
$obj->Title ='Add Title';
$obj->Tel = '66550000';
$obj->MobileNo=9121234567;
$obj->Address='Add Address';
$obj->NationalCode='Add NationalCode';
$obj->CertificateNo='Add CertificateNo';
$obj->FieldType='Add FieldType';
$obj->ServiceReason='Add ServiceReason';
$obj->ServiceProviderType=true;
$obj->CompanyName='Add CompanyName';
$obj->FirstName='Add FirstName';
$obj->LastName='Add LastName';
$obj->Email='Add Email';
$obj->TownId=100;
$obj->WebSite='Add WebSite';
$service->AddServiceProvider($obj);

//GetServiceProviderStatus........................
$service->GetServiceProviderStatus();

///sdp/GetServiceProviderComments.................
$service->GetServiceProviderComments();


echo "\n";