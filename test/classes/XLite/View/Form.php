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
 * XLite_View_Form 
 * 
 * @package    Lite Commerce
 * @subpackage ____sub_package____
 * @since      3.0.0 EE
 */
class XLite_View_Form extends XLite_View_Form_Abstract
{
    /**
     * Return form name
     * 
     * @return string
     * @access protected
     * @since  3.0.0 EE
     */
    protected function getFormName()
    {
        return $this->attributes['form_name'];
    }

    /**
     * Define some default attributes 
     * 
     * @return void
     * @access protected
     * @since  3.0.0 EE
     */
    protected function defineDefaultFormAttributes()
    {
        $this->attributes['form_name'] = '';
    }
}
