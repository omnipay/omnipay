<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\MultiSafepay\Message;

use Omnipay\TestCase;

class FetchIssuersRequestTest extends TestCase
{
    /**
     * @var FetchIssuersRequest
     */
    private $request;

    protected function setUp()
    {
        $this->request = new FetchIssuersRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize(array(
            'accountId' => '111111',
            'siteId' => '222222',
            'siteCode' => '333333',
        ));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetData($xml)
    {
        $data = $this->request->getData();
        $this->assertInstanceOf('SimpleXMLElement', $data);

        // Just so the provider remains readable...
        $dom = dom_import_simplexml($data)->ownerDocument;
        $dom->formatOutput = true;
        $this->assertEquals($xml, $dom->saveXML());
    }

    public function dataProvider()
    {
        $xml = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<idealissuers ua="Omnipay">
  <merchant>
    <account>111111</account>
    <site_id>222222</site_id>
    <site_secure_code>333333</site_secure_code>
  </merchant>
</idealissuers>

EOF;

        return array(
            array($xml),
        );
    }
}
