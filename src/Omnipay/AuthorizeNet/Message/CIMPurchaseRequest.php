<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\AuthorizeNet\Message;

/**
 * Authorize.Net CIM Purchase Request
 */
class CIMPurchaseRequest extends CIMAbstractRequest
{
    protected $action = 'profileTransAuthCapture';
    protected $requestType = 'createCustomerProfileTransactionRequest';

    public function getData()
    {
        $this->validate('customerProfileId', 'customerPaymentProfileId');

        return $this->getTransactionData();
    }
}
