<?php

// IMPORTANT! 
//
// Do not change or copy. 
//
// :)
//
// Thanks!
//
// - PressTrends Team


$pressmoz_accessID = "member-79d7a9fa9f";
$pressmoz_secretKey = "33bcccbdfb18b4b862a484416136c70d";
$pressmoz_expires = time() + 300;
$pressmoz_stringToSign = $pressmoz_accessID."\n".$pressmoz_expires;
$pressmoz_binarySignature = hash_hmac('sha1', $pressmoz_stringToSign, $pressmoz_secretKey, true);
$pressmoz_urlSafeSignature = urlencode(base64_encode($pressmoz_binarySignature));
$pressmoz_objectURL = get_option('siteurl');
$pressmoz_cols = "103079233568";
$pressmoz_requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($pressmoz_objectURL)."?Cols=".$pressmoz_cols."&AccessID=".$pressmoz_accessID."&Expires=".$pressmoz_expires."&Signature=".$pressmoz_urlSafeSignature;
?>