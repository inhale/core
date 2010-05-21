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
class XLite_Controller_Admin_Upgrade extends XLite_Controller_Admin_Abstract
{

    function init()
    {
        parent::init();
        if (!$this->get('action')) {
            $this->redirect("admin.php?target=login");
        }
    }

    /**
    * View current version
    */
    function action_version()
    {
        die($this->config->Version->version);
    }

    function action_upgrade()
    {
        $up = new XLite_Model_Upgrade();
        $up->setProperties(XLite_Core_Request::getInstance()->getData());
        $up->doUpgrade();
        $this->set('silent', true);
    }

    function action_upgrade_force()
    {
        $up = new XLite_Model_Upgrade();
        $up->setProperties(XLite_Core_Request::getInstance()->getData());
        $up->success();
        $this->set('silent', true);
    }

    function getAccessLevel()
    {
        return 0;
    }

}