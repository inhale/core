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
 * @subpackage Model
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */
namespace XLite\Model\Base;

/**
 * Order item related object interface
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
interface IOrderItem
{
    /**
     * getId 
     * 
     * @return integer
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getId();

    /**
     * getPrice 
     * 
     * @return float
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getPrice();

    /**
     * getTaxedPrice 
     * 
     * @return float
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getTaxedPrice();

    /**
     * getWeight 
     * 
     * @return float
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getWeight();

    /**
     * getMinPurchaseLimit 
     * 
     * @return integer
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getMinPurchaseLimit();

    /**
     * getMaxPurchaseLimit 
     * 
     * @return integer
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getMaxPurchaseLimit();

    /**
     * getName 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getName();

    /**
     * getSku 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getSku();

    /**
     * getThumbnail 
     * 
     * @return \XLite\Model\Base\Image or null
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getThumbnail();

    /**
     * getFreeShipping 
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
	public function getFreeShipping();

    /**
     * getURL 
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getURL();
}