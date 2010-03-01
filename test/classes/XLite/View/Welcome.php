<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * ____file_title____
 *  
 * @category   Lite Commerce
 * @package    Lite Commerce
 * @subpackage ____sub_package____
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2009 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @version    SVN: $Id$
 * @link       http://www.qtmsoft.com/
 * @since      3.0.0 EE
 */

/**
 * XLite_View_Welcome 
 * 
 * @package    Lite Commerce
 * @subpackage ____sub_package____
 * @since      3.0.0 EE
 */
class XLite_View_Welcome extends XLite_View_Abstract
{
	/**
     * Widget template 
     * 
     * @var    string
     * @access protected
     * @since  3.0.0 EE
     */
    protected $template = 'welcome.tpl';

	/**
     * Targets this widget is allowed for
     *
     * @var    array
     * @access protected
     * @since  3.0.0 EE
     */
    protected $allowedTargets = array('main');


	/**
     * Check widget visibility 
     * 
     * @return bool
     * @access public
     * @since  3.0.0 EE
     */
    public function isVisible()
    {
        return parent::isVisible() && !XLite_Core_Request::getInstance()->page;
    }
}
