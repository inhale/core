<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 * 
 * @category   LiteCommerce
 * @package    Tests
 * @subpackage Classes
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

class XLite_Tests_Model_OrderModifier extends XLite_Tests_Model_OrderAbstract
{
    protected $orderProducts = array('00057', '00002', '00003', '00004', '00005', '00006');

    public function testCreate()
    {
        $order = $this->getTestOrder();

        $this->assertEquals(3, $order->getSavedModifiers()->count(), 'check modifiers count');

        $m = $order->getSavedModifiers()->get(0);

        $this->assertEquals('shipping', $m->getCode(), 'check code');
        $this->assertTrue(0 == round($m->getSurcharge(), 2), 'check surcharge');
        $this->assertEquals('Shipping cost', $m->getName(), 'check name');
        $this->assertTrue($m->getIsVisible(), 'check visibility');
        $this->assertTrue($m->getIsSummable(), 'check summable status');
        $this->assertEquals('shipping', $m->getSubcode(), 'check subcode');

        $m = $order->getSavedModifiers()->get(2);

        $this->assertEquals('tax', $m->getCode(), 'check code #2');
        $this->assertEquals(0, $m->getSurcharge(), 'check surcharge #2');
        $this->assertEquals('Tax', $m->getName(), 'check name #2');
        $this->assertTrue($m->getIsVisible(), 'check visibility #2');
        $this->assertTrue($m->getIsSummable(), 'check summable status #2');
        $this->assertEquals('Tax', $m->getSubcode(), 'check subcode #2');

        $m = $order->getSavedModifiers()->get(1);

        $this->assertEquals('tax', $m->getCode(), 'check code #3');
        $this->assertEquals(0, $m->getSurcharge(), 'check surcharge #3');
        $this->assertEquals('shipping_tax', $m->getName(), 'check name #3');
        $this->assertFalse($m->getIsVisible(), 'check visibility #3');
        $this->assertFalse($m->getIsSummable(), 'check summable status #3');
        $this->assertEquals('shipping_tax', $m->getSubcode(), 'check subcode #3');

        $this->assertEquals($order->getOrderId(), $m->getOwner()->getOrderId(), 'check order id');
    }

    public function testUpdate()
    {
        $order = $this->getTestOrder();

        $m = $order->getSavedModifiers()->get(0);

        $m->setCode('sss');
        $m->setSurcharge(3);
        $m->setName('zzz');
        $m->setIsVisible(false);
        $m->setIsSummable(false);
        $m->setSubcode(null);

        $id = $m->getId();

        \XLite\Core\Database::getEM()->persist($m);
        \XLite\Core\Database::getEM()->flush();

        \XLite\Core\Database::getEM()->clear();

        $m = \XLite\Core\Database::getRepo('XLite\Model\OrderModifier')->find($id);

        $this->assertEquals('sss', $m->getCode(), 'check code');
        $this->assertEquals(3, $m->getSurcharge(), 'check surcharge');
        $this->assertEquals('zzz', $m->getName(), 'check name');
        $this->assertFalse($m->getIsVisible(), 'check visibility');
        $this->assertFalse($m->getIsSummable(), 'check summable status');
        $this->assertEquals('sss', $m->getSubcode(), 'check subcode');
    }

    public function testDelete()
    {
        $order = $this->getTestOrder();

        $m = $order->getSavedModifiers()->get(0);

        $order->getSavedModifiers()->removeElement($m);
        \XLite\Core\Database::getEM()->remove($m);

        $id = $m->getId();

        \XLite\Core\Database::getEM()->flush();

        $m = \XLite\Core\Database::getRepo('XLite\Model\OrderModifier')
            ->find($id);

        $this->assertNull($m, 'check removed modifier');
    }

    public function testIsAvailable()
    {
        $order = $this->getTestOrder();

        $m = $order->getSavedModifiers()->get(0);

        $this->assertTrue($m->isAvailable(), 'check avalability');

        // TODO - rework with shipping system tests
        /*
        $order->setShippingMethod(null);

        $this->assertFalse($m->isAvailable(), 'check avalability w/o shipping method');
        */
    }

    /**
     * getTestOrder 
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function getTestOrder()
    {
        $order = parent::getTestOrder();

        foreach ($order->getItems() as $index => $item) {

            if ($index % 2) {
                $item->getProduct()->setFreeShipping(true);
            }

            $item->setAmount(4);
        }

        \XLite\Core\Database::getEM()->flush();

        return $order;
    }
}
