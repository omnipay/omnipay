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
use Omnipay\Migs\Message\PurchaseRequest;
use Omnipay\Migs\Message\CompletePurchaseRequest;

/**
 * MIGS Gateway
 *
 * @link http://www.anz.com/australia/business/merchant/pdf/VPC-Dev-Kit-Integration-Notes.pdf
 */
class ThreePartyGateway extends AbstractGateway
{
    public function getName()
    {
        return 'MIGS 3-Party';
    }

    public function getDefaultParameters()
    {
        return array(
            'merchantId'                   => '',
            'merchantAccessCode'           => '',
            'secureHash'                   => '',
            'locale'                       => 'en',
            'version'                      => '1',
        );
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }


    public function getMerchantAccessCode()
    {
        return $this->getParameter('merchantAccessCode');
    }

    public function setMerchantAccessCode($value)
    {
        return $this->setParameter('merchantAccessCode', $value);
    }

    public function getSecureHash()
    {
        return $this->getParameter('secureHash');
    }

    public function setSecureHash($value)
    {
        return $this->setParameter('secureHash', $value);
    }

    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    public function getVersion()
    {
        return $this->getParameter('version');
    }

    public function setVersion($value)
    {
        return $this->setParameter('version', $value);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Migs\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Migs\Message\CompletePurchaseRequest', $parameters);
    }
}
