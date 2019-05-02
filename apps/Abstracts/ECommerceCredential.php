<?php

namespace Webkul\UVDesk\CoreBundle\Abstracts;

/**
 * This class contains credentials required in various ecommerce channels.
 *
 */
abstract class ECommerceCredential
{
    // Ebay
    const EBAY_DEFAULT_XMLNS = 'urn:ebay:apis:eBLBaseComponents';
    const EBAY_SERVICE_URI = 'https://api.sandbox.ebay.com/ws/api.dll';
    const EBAY_SIGNIN_URI = 'https://signin.sandbox.ebay.com/ws/eBayISAPI.dll?SignIn&RUName=';
}

?>
