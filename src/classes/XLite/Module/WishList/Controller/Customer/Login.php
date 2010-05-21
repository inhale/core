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
 * @subpackage Controller
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * ____description____
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class XLite_Module_WishList_Controller_Customer_Login extends XLite_Controller_Customer_Login implements XLite_Base_IDecorator
{
    /**
     * Return URL to redirect from login
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getRedirectFromLoginURL()
    {
        $result = null;
        $productId = XLite_Model_Session::getInstance()->get(self::SESSION_CELL_WL_PRODUCT_TO_ADD);

        if (isset($productId)) {
            XLite_Model_Session::getInstance()->set(self::SESSION_CELL_WL_PRODUCT_TO_ADD, null);
            $result = $this->buildURL('wishlist', 'add', array('product_id' => $productId));
        }

        return $result;
    }
}