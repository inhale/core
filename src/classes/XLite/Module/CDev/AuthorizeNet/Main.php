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
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\Module\CDev\AuthorizeNet;

/**
 * Authorize.Net SIM module
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
abstract class Main extends \XLite\Module\AModule
{
    /**
     * Author name
     *
     * @var    string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function getAuthorName()
    {
        return 'Creative Development LLC';
    }

    /**
     * Module name
     *
     * @var    string
     * @access public
     * @see    ____func_see____
     * @since  3.0
     */
    public static function getModuleName()
    {
        return 'Authorize.Net SIM';
    }

    /**
     * Module version
     *
     * @return string
     * @access public
     * @since  3.0.0
     */
    public static function getVersion()
    {
        return '1.0';
    }

    /**
     * Module description
     *
     * @return string
     * @access public
     * @since  3.0.0
     */
    public static function getDescription()
    {
        return 'Authorize.Net SIM (Server Integration Method) credit card payment processor';
    }
}
