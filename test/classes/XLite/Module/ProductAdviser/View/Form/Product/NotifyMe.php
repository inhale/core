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
 * @package    XLite
 * @subpackage View
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * 'Notify me' form
 * 
 * @package    XLite
 * @subpackage View
 * @since      3.0.0
 */
class XLite_Module_ProductAdviser_View_Form_Product_NotifyMe extends XLite_View_Form_Product_Abstract
{
    /**
     * Current form name
     *
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getFormName()
    {
        return 'notify_me';
    }

    /**
     * initView 
     * 
     * @return void
     * @access protected
     * @since  3.0.0
     */
    protected function initView()
    {
        parent::initView();

        $this->widgetParams[self::PARAM_FORM_ACTION]->setValue(XLite_Core_Request::getInstance()->action);
        $this->widgetParams[self::PARAM_FORM_PARAMS]->appendValue($this->getFormDefaultParams());
    }

    /**
     * getFormDefaultParams 
     * 
     * @return array
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getFormDefaultParams()
    {
        $params = array(
            'product_id' => $this->getProduct()->get('product_id'),
            'mode'       => XLite_Core_Request::getInstance()->mode
        );

        if ('notify_product' == XLite_Core_Request::getInstance()->action) {

            if (XLite_Core_Request::getInstance()->amount) {
                $params['amount'] = XLite_Core_Request::getInstance()->amount;

            } elseif ($this->getProduct()->get('inventory')) {
                $params['amount'] = $this->getProduct()->getInventory()->get('amount');
            }

            if (XLite_Core_Request::getInstance()->product_options) {
                $params['product_options'] = XLite_Core_Request::getInstance()->product_options;
            }

        } elseif ('notify_price' == XLite_Core_Request::getInstance()->action) {

            if (XLite_Core_Request::getInstance()->product_price) {
                $params['product_price'] = XLite_Core_Request::getInstance()->product_price;

            } else {
                $params['product_price'] = $this->getProduct()->getListPrice();
            }

        }

        return $params;
    }

    /** 
     * Define widget parameters
     *
     * @return void
     * @access protected
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams[self::PARAM_FORM_TARGET]->setValue('notify_me');
    }
}
