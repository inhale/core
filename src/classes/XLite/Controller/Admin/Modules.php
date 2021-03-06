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

namespace XLite\Controller\Admin;

/**
 * Modules
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Modules extends \XLite\Controller\Admin\AAdmin
{
    /**
     * Handles the request.
     * Parses the request variables if necessary. Attempts to call the specified action function 
     * 
     * @return void
     * @access public
     * @since  3.0.0
     */
    public function handleRequest()
    {
        \XLite\Core\Database::getRepo('\XLite\Model\Module')->checkModules();

        parent::handleRequest();
    }

    /**
     * Common method to determine current location
     *
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function getLocation()
    {
        return 'Manage add-ons';
    }

    /**
     * Enable module
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionEnable()
    {
        $this->set('returnUrl', $this->buildURL('modules'));

        $id = \XLite\Core\Request::getInstance()->moduleId;
        $module = \XLite\Core\Database::getRepo('\XLite\Model\Module')->find($id);

        if ($module) {
            $module->setEnabled(true);
            \XLite\Core\Database::getEM()->flush();
            \XLite::setCleanUpCacheFlag(true);
        }
    }

    /**
     * Pack module into PHAR module file
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionPack()
    {
        $this->set('returnUrl', $this->buildUrl('modules'));

        if (LC_DEVELOPER_MODE) {

            $id = \XLite\Core\Request::getInstance()->moduleId;

            $packModule = new \XLite\Model\PackModule($id);

            if (\XLite\Model\PackModule::STATUS_OK === $packModule->createPackage()) {

                $packModule->downloadPackage();

                $packModule->cleanUp();

                exit (0);

            } else {

                \XLite\Core\TopMessage::getInstance()
                    ->addError('Module packaging finished with the error: "' . $packModule->getError() . '"');
            }

            $packModule->cleanUp();

        } else {

            \XLite\Core\TopMessage::getInstance()
                ->addError('Module packing is available in the DEVELOPER mode only. Check etc/config.php file');
        }
    }

    /**
     * Disable module
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionDisable()
    {
        $this->set('returnUrl', $this->buildURL('modules'));

        $id = \XLite\Core\Request::getInstance()->moduleId;
        $module = \XLite\Core\Database::getRepo('\XLite\Model\Module')->find($id);

        if ($module) {
            $module->disableModule();
            \XLite::setCleanUpCacheFlag(true);
        }
    }

    /**
     * Uninstall module
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionUninstall()
    {
        $module = \XLite\Core\Database::getRepo('\XLite\Model\Module')->find(
            \XLite\Core\Request::getInstance()->moduleId
        );

        if (!$module) {

            \XLite\Core\TopMessage::getInstance()->addError('The module to uninstall has not been found');

        } else {

            $class = $module->getMainClass();
            $notes = $class::getPostUninstallationNotes();

            // Disable this and depended modules
            $module->disableModule();

            \XLite::setCleanUpCacheFlag(true);

            $status = $module->uninstall();

            \XLite\Core\Database::getEM()->remove($module);
            \XLite\Core\Database::getEM()->flush();

            if ($status) {
                \XLite\Core\TopMessage::getInstance()->addInfo('The module has been uninstalled successfully');

            } else {
                \XLite\Core\TopMessage::getInstance()->addWarning('The module has been partially uninstalled');
            }

            if ($notes) {
                \XLite\Core\TopMessage::getInstance()->add(
                    $notes,
                    \XLite\Core\TopMessage::INFO,
                    true
                );
            }
        }
        
        $this->set('returnUrl', $this->buildURL('modules'));
    }

}
