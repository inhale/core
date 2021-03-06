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
 * @subpackage Includes
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace Includes\DataStructure\Node;

/**
 * Graph 
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
abstract class Graph extends \Includes\DataStructure\Node\ANode
{
    /**
     * Link to the parent element
     *
     * @var    array
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $parents = array();


    /**
     * Check parent by key
     *
     * @param string $key node key
     *
     * @return bool
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function checkIfParentExists($key)
    {
        return isset($this->children[$key]);
    }

    /**
     * Return parent nodes
     *
     * @param string $key key to search node
     *  
     * @return array|self
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getParents($key = null)
    {
        // Tree integrity violation
        if (isset($key) && !$this->checkIfParentExists($key)) {
            \Includes\ErrorHandler::fireError('Node "' . $this->getKey() . '" has no parent "' . $key . '"');
        }

        return \Includes\Utils\Converter::getIndex($this->parents, $key);
    }

    /**
     * Return first parent node
     *
     * @return self
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getParent()
    {
        return \Includes\Utils\Converter::getIndex(array_values($this->getParents()), 0, true);
    }

    /**
     * Set reference to parent node
     *
     * @param self $node parent node ref
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function addParent(self $node)
    {
        $this->parents[$node->getKey()] = $node;
    }

    /**
     * Unset reference to parent node
     *
     * @param self $node parent node ref
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function removeParent(self $node)
    {
        unset($this->parents[$node->getKey()]);
    }

    /**
     * Clear all parents refs
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function removeParents()
    {
        $this->parents = array();
    }

    /**
     * Add child node
     *
     * @param self $node node to add
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function addChild(self $node)
    {
        parent::addChild($node);

        $node->addParent($this);
    }

    /**
     * Remove child node
     *
     * @param self $node node to remove
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function removeChild(self $node)
    {
        parent::removeChild($node);

        $node->removeParent($this);
    }

    /**
     * Change key for current node
     *
     * @param string $key key to set
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function changeKey($key)
    {
        $this->invokeAll('removeChild', $parents = $this->getParents());
        $this->invokeAll('removeParent', $children = $this->getChildren());

        parent::changeKey($key);

        $this->invokeAll('addChild', $parents);
        $this->invokeAll('addParent', $children);
    }

    /**
     * Remove node
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function remove()
    {
        parent::remove();

        $this->invokeAll('removeChild', $this->getParents());
    }
}
