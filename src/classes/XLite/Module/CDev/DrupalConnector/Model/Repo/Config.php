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

namespace XLite\Module\CDev\DrupalConnector\Model\Repo;

/**
 * \XLite\Module\CDev\DrupalConnector\Model\Repo\Config 
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Config extends \XLite\Model\Repo\Config implements \XLite\Base\IDecorator
{
    /**
     * Initializes a new EntityRepository object
     * 
     * @param \Doctrine\ORM\EntityManager         $em    The EntityManager to use
     * @param \Doctrine\ORM\Mapping\ClassMetadata $class The class descriptor
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\Mapping\ClassMetadata $class)
    {
        parent::__construct($em, $class);

        $this->disableOption('General', 'shop_closed');
        $this->disableOption('General', 'add_on_mode');
        $this->disableOption('General', 'add_on_mode_page');
    }
}
