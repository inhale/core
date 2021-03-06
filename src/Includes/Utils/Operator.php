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
 * @subpackage Includes_Utils
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace Includes\Utils;

/**
 * Operator 
 * 
 * @package    XLite
 * @see        ____class_see____
 * @since      3.0.0
 */
class Operator extends AUtils
{
    /**
     * Javascript code to perform redirect
     * 
     * @param string $location URL to redirect to
     *  
     * @return string
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected static function getJSRedirectCode($location)
    {
        return '<script type="text/javascript">self.location=\'' . $location . '\';</script>'
            . '<noscript><a href="' . $location . '">Click here to redirect</a></noscript><br /><br />';
    }

    /**
     * Return length of the "dummy" buffer for flush
     * 
     * @return int
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected static function getDummyBufferLength()
    {
        return 256;
    }

    /**
     * Perform the "flush" itself
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected static function flushBuffers()
    {
        @ob_flush();
        flush();
    }


    /**
     * Redirect 
     * 
     * @param string $location URL
     * @param int    $code     operation code
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function redirect($location, $code = 302)
    {
        if ('cli' != PHP_SAPI) {
            if (headers_sent()) {
                static::flush(static::getJSRedirectCode($location));

            } else {
                header('Location: ' . $location, true, $code);
            }
        }

        exit (0);
    }

    /**
     * Refresh current page
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function refresh()
    {
        static::redirect(\Includes\Utils\URLManager::getSelfURL());
    }

    /**
     * Echo message and flush output 
     * 
     * @param string $message    text to display
     * @param bool   $dummyFlush output extra spaces or not
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function flush($message, $dummyFlush = true)
    {
        // Print message
        echo $message;

        // Send extra whitespace before flushing
        if ($dummyFlush && 'cli' != PHP_SAPI) {
            echo str_repeat(' ', static::getDummyBufferLength());
        }

        static::flushBuffers();
    }

    /**
     * Set custom value for the "max_execution_time" INI setting, and execute some function
     * 
     * @param int   $time     time (in seconds) to set
     * @param mixed $callback function to execute
     * @param array $args     call arguments
     *  
     * @return mixed
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function executeWithCustomMaxExecTime($time, $callback, array $args = array())
    {
        $savedValue = @ini_get('max_execution_time');
        @set_time_limit($time);

        $result = call_user_func_array($callback, $args);

        if (!empty($savedValue)) {
            @set_time_limit($savedValue);
        }

        return $result;
    }

    /**
     * Check if class is already declared.
     * NOTE: this function do not use autoload
     * 
     * @param string $name class name
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public static function checkIfClassExists($name)
    {
        return class_exists($name, false);
    }
}
