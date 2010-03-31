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
 * @subpackage Core
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * Miscelaneous convertion routines
 *
 * @package    XLite
 * @since      3.0
 */
class XLite_Module_DrupalConnector_Core_Converter extends XLite_Core_Converter implements XLite_Base_IDecorator, XLite_Base_ISingleton
{
    /**
     * It's the the root part of Drupal nodes which are the imported LiteCommerce widgets
     */
    const DRUPAL_ROOT_NODE = 'store';


    /**
     * Singleton access method
     * 
     * @return XLite_Core_Converter
     * @access public
     * @since  3.0
     */
    public static function getInstance()
    {
        return self::getInternalInstance(__CLASS__);
    }

    /**
     * Compose URL from target, action and additional params
     *
     * @param string $target page identifier
     * @param string $action action to perform
     * @param array  $params additional params
     *
     * @return string
     * @access public
     * @since  3.0
     */
    public static function buildURL($target = '', $action = '', array $params = array())
    {
        if (XLite_Module_DrupalConnector_Handler::getInstance()->checkCurrentCMS()) {

	        $result = '?q=' . implode('/', array(self::DRUPAL_ROOT_NODE, $target, $action))
        	    . '/' . XLite_Core_Converter::buildQuery($params, '-', '/');

		} else {

            $result = parent::buildURL($target, $action, $params);
		}

		return $result;
    }

}