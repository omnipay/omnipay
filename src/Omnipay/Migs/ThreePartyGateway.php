<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Migs;

use Omnipay\Common\AbstractGateway;
use Omnipay\Migs\Message\ThreePurchaseRequest;
use Omnipay\Migs\Message\ThreeCompletePurchaseRequest;

/**
 * MIGS Gateway
 *
 * @link http://www.anz.com/australia/business/merchant/pdf/VPC-Dev-Kit-Integration-Notes.pdf
 */
class ThreePartyGateway extends TwoPartyGateway
{
    public function getName()
    {
        return 'MIGS 3-Party';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Migs\Message\ThreePurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Migs\Message\ThreeCompletePurchaseRequest', $parameters);
    }
}
