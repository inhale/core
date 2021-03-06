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

namespace XLite\Model;

/**
 * The "profile" model class
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 * 
 * @Entity (repositoryClass="\XLite\Model\Repo\Profile")
 * @Table  (name="profiles",
 *      indexes={
 *          @Index (name="cms_profile", columns={"cms_name","cms_profile_id"}),
 *          @Index (name="login", columns={"login"}),
 *          @Index (name="order_id", columns={"order_id"}),
 *          @Index (name="password", columns={"password"}),
 *          @Index (name="access_level", columns={"access_level"}),
 *          @Index (name="first_login", columns={"first_login"}),
 *          @Index (name="last_login", columns={"last_login"}),
 *          @Index (name="status", columns={"status"})
 *      }
 * )
 */
class Profile extends \XLite\Model\AEntity
{
    /**
     * Profile unique ID 
     * 
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Id
     * @GeneratedValue (strategy="AUTO")
     * @Column         (type="integer")
     */
    protected $profile_id;

    /**
     * Login (e-mail)
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="128")
     */
    protected $login = '';

    /**
     * Password
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="32")
     */
    protected $password = '';

    /**
     * Password hint
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="128")
     */
    protected $password_hint = '';

    /**
     * Password hint answer
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="128")
     */
    protected $password_hint_answer = '';

    /**
     * Access level
     *
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer")
     */
    protected $access_level = 0;

    /**
     * CMS profile Id
     *
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer")
     */
    protected $cms_profile_id = 0;

    /**
     * CMS name
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="32")
     */
    protected $cms_name = '';

    /**
     * Timestamp of profile creation date
     *
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer")
     */
    protected $added = 0;

    /**
     * Timestamp of first login event
     *
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer")
     */
    protected $first_login = 0;

    /**
     * Timestamp of last login event
     *
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer")
     */
    protected $last_login = 0;

    /**
     * Profile status
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="fixedstring", length="1")
     */
    protected $status = 'E';

    /**
     * Referer
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="255")
     */
    protected $referer = '';

    /**
     * Relation to a order
     *
     * @var    \XLite\Model\Order
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @OneToOne  (targetEntity="XLite\Model\Order")
     * @JoinColumn (name="order_id", referencedColumnName="order_id")
     */
    protected $order;

    /**
     * Language code
     *
     * @var    string
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="string", length="2")
     */
    protected $language = '';

    /**
     * Last selected shipping id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer", nullable=true)
     */
    protected $last_shipping_id;

    /**
     * Last selected payment id 
     * 
     * @var    integer
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @Column (type="integer", nullable=true)
     */
    protected $last_payment_id;

    /**
     * Membership: many-to-one relation with memberships table
     * 
     * @var    \Doctrine\Common\Collections\ArrayCollection
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @ManyToOne  (targetEntity="XLite\Model\Membership")
     * @JoinColumn (name="membership_id", referencedColumnName="membership_id")
     */
    protected $membership;

    /**
     * Pending membership: many-to-one relation with memberships table
     * 
     * @var    \Doctrine\Common\Collections\ArrayCollection
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @ManyToOne  (targetEntity="XLite\Model\Membership")
     * @JoinColumn (name="pending_membership_id", referencedColumnName="membership_id")
     */
    protected $pending_membership;

    /**
     * Address book: one-to-many relation with address book entity
     * 
     * @var    \Doctrine\Common\Collections\ArrayCollection
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     *
     * @OneToMany (targetEntity="XLite\Model\Address", mappedBy="profile", cascade={"all"})
     */
    protected $addresses;

    /**
     * The count of orders placed by the user 
     * 
     * @var    int
     * @access protected
     * @see    ____var_see____
     * @since  3.0.0
     */
    protected $orders_count = null;

    /**
     * Set membership 
     * 
     * @param \XLite\Model\Membership $membership membership
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function setMembership(\XLite\Model\Membership $membership = null)
    {
        $this->membership = $membership;
    }

    /**
     * Set pending membership 
     * 
     * @param \XLite\Model\Membership $pendingMembership Pending membership
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function setPendingMembership(\XLite\Model\Membership $pendingMembership = null)
    {
        $this->pending_membership = $pendingMembership;
    }

    /**
     * Prepare object for its creation in the database
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function prepareCreate()
    {
        // Assign a profile creation date/time
        $this->setAdded(time());

        // Assign current language
        $language = $this->getLanguage();

        if (empty($language)) {
            $this->setLanguage(\XLite\Core\Translation::getCurrentLanguageCode());
        }

        // Assign referer value
        if (empty($this->referer) && isset($_SERVER['HTTP_REFERER'])) {

            // TODO: move setting up cookie to the up level of application (e.g. session start method)
            if (!isset($_COOKIE['LCReferrerCookie'])) {

                $referer = $_SERVER['HTTP_REFERER'];

                setcookie(
                    'LCReferrerCookie',
                    $referer,
                    time() + 3600 * 24 * 180,
                    '/',
                    \XLite::getInstance()->getOptions(
                        array('host_details', 'http_host')
                    )
                );

            } else {
                $referer = $_COOKIE['LCReferrerCookie'];
            }

            $this->setReferer($referer);
        }

        // Assign status 'Enabled' if not defined
        if (empty($this->status)) {
            $this->enable();
        }

    }

    /**
     * Returns address by its type (shipping or billing)
     * 
     * @param string $atype Address type: b - billing, s - shipping OPTIONAL
     *  
     * @return \XLite\Model\Address
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function getAddressByType($atype = \XLite\Model\Address::BILLING)
    {
        $result = null;

        foreach ($this->getAddresses() as $address) {
            if (
                (\XLite\Model\Address::BILLING == $atype && $address->getIsBilling())
                || (\XLite\Model\Address::SHIPPING == $atype && $address->getIsShipping())
            ) {
                // Select address if its type is same as a requested type...
                $result = $address;
                break;
            }
        }

        return $result;
    }

    /**
     * Returns billing address 
     * 
     * @return \XLite\Model\Address
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getBillingAddress()
    {
        return $this->getAddressByType(\XLite\Model\Address::BILLING);
    }

    /**
     * Returns shipping address 
     * 
     * @return \XLite\Model\Address
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getShippingAddress()
    {
        return $this->getAddressByType(\XLite\Model\Address::SHIPPING);
    }

    /**
     * Returns the number of orders places by the user
     * 
     * @return integer 
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getOrdersCount()
    {
        if (!isset($this->orders_count)) {
    
            $cnd = new \XLite\Core\CommonCell();
            $cnd->profile = $this;

            $this->orders_count = \XLite\Core\Database::getRepo('XLite\Model\Order')->search($cnd, true);
        }

        return $this->orders_count;
    }
 
    /**
     * Check if profile is enabled
     * 
     * @return boolean 
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isEnabled()
    {
        return 'E' == strtoupper($this->getStatus());
    }

    /**
     * Enable user profile
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function enable() 
    {
        $this->setStatus('E');
    }

    /**
     * Disable user profile
     * 
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function disable() 
    {
        $this->setStatus('D');
    }

    /**
     * Returns true if profile has an administrator access level 
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isAdmin()
    {
        return $this->getAccessLevel() >= \XLite\Core\Auth::getInstance()->getAdminAccessLevel();
    }

    /**
     * Create an entity profile in the database
     * 
     * @return boolean 
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function create()
    {
        $this->prepareCreate();

        return parent::create();
    }

    /**
     * Update an entity in the database 
     * 
     * @return boolean 
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function update($cloneMode = false)
    {
        // Check if user with specified e-mail address is already exists
        if (!$cloneMode) {
            $sameProfile = \XLite\Core\Database::getRepo('XLite\Model\Profile')->findUserWithSameLogin($this);
        }

        if (isset($sameProfile)) {

            \XLite\Core\TopMessage::addError('Specified e-mail address is already used by other user.');
            $result = false;

        } else {

            // Do an entity update
            $result = parent::update();
        }

        return $result;
    }

    /**
     * Delete an entity profile from the database
     * 
     * @return boolean 
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function delete()
    {
        // Check if the deleted profile is a last admin profile
        if ($this->isAdmin() && 1 == \XLite\Core\Database::getRepo('XLite\Model\Profile')->findCountOfAdminAccounts()) {

            $result = false;

            \XLite\Core\TopMessage::addError('The only remaining active administrator profile cannot be deleted.');

        } else {
            $result = parent::delete();
        }

        return $result;
    }

    /**
     * Check if billing and shipping addresses are equal or not
     * TODO: review method after implementing at one-step-checkout
     *
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isSameAddress()
    {
        $result = false;
        
        $billingAddress = $this->getBillingAddress();
        $shippingAddress = $this->getShippingAddress();

        if (isset($billingAddress) && isset($shippingAddress)) {

            $result = true;

            if ($billingAddress->getAddressId() != $shippingAddress->getAddressId()) {

                $addressFields = $billingAddress->getAddressFields();

                foreach ($addressFields as $name) {

                    $methodName = 'get' . \XLite\Core\Converter::getInstance()->convertToCamelCase($name);

                    if (method_exists($billingAddress, $methodName)) {

                        // Compare field values of billing and shipping addresses
                        if ($billingAddress->$methodName() != $shippingAddress->$methodName()) {
                            $result = false;
                            break;
                        }
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Check - billing and shipping addresses are equal or not
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isEqualAddress()
    {
        $billingAddress = $this->getBillingAddress();
        $shippingAddress = $this->getShippingAddress();

        return isset($billingAddress)
            && isset($shippingAddress)
            && $billingAddress->getAddressId() == $shippingAddress->getAddressId();
    }

    /**
     * Clone
     *
     * @return \XLite\Model\AEntity
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function cloneEntity()
    {
        $newProfile = parent::cloneEntity();

        if (!$newProfile->update(true) || !$newProfile->getProfileId()) {
            // TODO - add throw exception
            \XLite::getInstance()->doGlobalDie('Can not clone profile');
        }

        $newProfile->setMembership($this->getMembership());
        $newProfile->setPendingMembership($this->getPendingMembership());

        $billingAddress = $this->getBillingAddress();

        if (isset($billingAddress)) {
            
            $newBillingAddress = $billingAddress->cloneEntity();
            $newBillingAddress->setProfile($newProfile);
            $newProfile->addAddresses($newBillingAddress);
            $newBillingAddress->update();
        }

        if (!$this->isSameAddress() && $this->getShippingAddress()) {
            
            $newShippingAddress = $this->getShippingAddress()->cloneEntity();
            $newShippingAddress->setProfile($newProfile);
            $newProfile->addAddresses($newShippingAddress);
            $newShippingAddress->update();
        }

        $newProfile->update(true);

        return $newProfile;
    }

    /**
     * Constructor
     *
     * @param array $data Entity properties
     *
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function __construct(array $data = array())
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();

        parent::__construct($data);
    }

    /**
     * Set order 
     * 
     * @param \XLite\Model\Order $order Order
     *  
     * @return void
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function setOrder(\XLite\Model\Order $order = null)
    {
        $this->order = $order;
    }
}
