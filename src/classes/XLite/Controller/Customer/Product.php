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
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\Controller\Customer;

/**
 * Product
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Product extends \XLite\Controller\Customer\Catalog
{
    /**
     * Controller parameters list
     * 
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $params = array('target', 'product_id');

    /**
     * Check whether the title is to be displayed in the content area 
     * 
     * @return boolean
     * @access public
     * @since  3.0.0
     */
    public function isTitleVisible()
    {
        return false;
    }

    /**
     * Common method to determine current location 
     * 
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getLocation()
    {
        return $this->getProduct() ? $this->getProduct()->getName() : null;
    }

    /**
     * Return current product Id
     *
     * @return integer 
     * @access protected
     * @since  3.0.0
     */
    protected function getProductId()
    {
        return intval(\XLite\Core\Request::getInstance()->product_id);
    }


    /**
     * Get product category id
     *
     * @return integer 
     * @access public
     * @since  3.0.0
     */
    public function getCategoryId()
    {
        $categoryId = parent::getCategoryId();

        if ($this->getRootCategoryId() == $categoryId && $this->getProduct() && $this->getProduct()->getCategoryId()) {
            $categoryId = $this->getProduct()->getCategoryId();
        }

        return $categoryId;
    }

    /**
     * getDescription 
     * 
     * @return string
     * @access public
     * @since  3.0.0
     */
    public function getDescription()
    {
        return (parent::getDescription() || !$this->getProduct()) ?: $this->getProduct()->getBriefDescription();
    }

    /**
     * Return current (or default) product object
     *
     * @return \XLite\Model\Product
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getModelObject()
    {
        return $this->getProduct();
    }

    /**
     * Alias
     *
     * @return \XLite\Model\Product
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getProduct()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\Product')->find($this->getProductId());
    }

    /**
     * Check controller visibility
     *
     * @return boolean
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function isVisible()
    {
        return parent::isVisible() && $this->getProduct();
    }
}
