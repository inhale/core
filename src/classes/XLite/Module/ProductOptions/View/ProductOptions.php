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
 * Product options lsit
 *
 * @package    XLite
 * @subpackage View
 * @since      3.0
 */
class XLite_Module_ProductOptions_View_ProductOptions extends XLite_View_Abstract
{
    /**
     * Widget parameter names
     */

    const PARAM_PRODUCT = 'product';


    /**
     * Return widget default template
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getDefaultTemplate()
    {
        return 'modules/ProductOptions/product_options.tpl';
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

        $this->widgetParams += array(
            self::PARAM_PRODUCT => new XLite_Model_WidgetParam_Object('Product', null, false, 'XLite_Model_Product'),
        );
    }


    /**
     * Check widget visibility 
     * 
     * @return bool
     * @access public
     * @since  3.0.0
     */
    public function isVisible()
    {
        return parent::isVisible() && $this->getParam(self::PARAM_PRODUCT)->hasOptions();
    }

    /**
     * Register JS files
     *
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        $list[] = 'modules/ProductOptions/options_validation.js';

        return $list;
    }

    /**
     * Check - option is selected or not
     * 
     * @param XLite_Module_ProductOptions_Model_ProductOption $option   Option class
     * @param integer                                         $optionId Option id
     *  
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isOptionSelected(XLite_Module_ProductOptions_Model_ProductOption $option, $optionId)
    {
        return intval($option->get('selectedValue')) == $optionId;
    }

    /**
     * Get option text 
     * 
     * @param XLite_Module_ProductOptions_Model_ProductOption $option Option class
     *  
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getOptionText(XLite_Module_ProductOptions_Model_ProductOption $option)
    {
        return strval($option->get('selectedValue'));
    }
}
