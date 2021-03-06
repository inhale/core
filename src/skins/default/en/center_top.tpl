{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Center-top region
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<h1 class="title" id="page-title" IF="getTitle()">{getTitle():h}</h1>

<!-- [catalog] {{{ -->
<widget class="\XLite\View\Category" />
<!-- [/catalog] }}} -->

<!-- [main] {{{ -->
<widget target="main" mode="accessDenied" template="access_denied.tpl">
<widget module="CDev\GreetVisitor" target="main" mode="" template="modules/CDev/GreetVisitor/greet_visitor.tpl" IF="{greetVisitor&!page}">
<widget class="\XLite\View\Welcome" name="welcome" />
<widget target="main" template="pages.tpl">
<!-- [/main] }}} -->

<!-- [help] {{{ -->
<widget target="help" mode="terms_conditions" template="common/dialog.tpl" body="terms_conditions.tpl" head="Terms & Conditions">
<widget target="help" mode="privacy_statement" template="common/dialog.tpl" body="privacy_statement.tpl" head="Privacy statement">
<widget target="recover_password" mode="" template="common/dialog.tpl" head="Forgot password?" body="recover_password.tpl">
<widget target="recover_password" mode="recoverMessage" template="common/dialog.tpl" head="Recover password" body="recover_message.tpl">
<widget target="help" mode="contactus" template="common/dialog.tpl" body="contactus.tpl" head="Contact us">
<widget target="help" mode="contactusMessage" template="common/dialog.tpl" body="contactus_message.tpl" head="Message is sent">
<!-- [/help] }}} -->

<!-- [shopping_cart] {{{ -->
<widget class="\XLite\View\Cart" />
<!-- [/shopping_cart] }}} -->

<!-- [profile] {{{ -->
<widget class="\XLite\View\AddressBook" />
{*<widget target="profile" mode="login" template="common/dialog.tpl" head="Authentication" body="authentication.tpl">
<widget target="profile" mode="account" template="common/dialog.tpl" head="Your account" body="account.tpl">
<widget target="login" template="common/dialog.tpl" body="authentication.tpl" head="Authentication">
<widget target="profile" mode="register" class="\XLite\View\RegisterForm" head="New customer" name="registerForm" IF="!showAV" />
<widget target="profile" mode="success" template="common/dialog.tpl" head="Registration complete" body="register_success.tpl">
<widget target="profile" mode="modify" class="\XLite\View\Model\Profile\Modify" IF="!showAV" />
<widget target="profile" mode="modify" class="\XLite\View\RegisterForm" head="Modify profile" name="profileForm" IF="!showAV" />
<widget target="profile" mode="delete" template="common/dialog.tpl" head="Delete profile - Confirmation" body="delete_profile.tpl">*}
<!-- [/profile] }}} -->

<!-- [checkout] {{{ -->
<widget class="\XLite\View\Checkout" />

<widget target="checkoutSuccess" template="checkout/success.tpl" />
<widget module="CDev\GoogleCheckout" template="common/dialog.tpl" body="modules/CDev/GoogleCheckout/google_checkout_dialog.tpl" head="Google Checkout payment module" IF="{target=#googlecheckout#&!valid}" />
<!-- [/checkout] }}} -->

<!-- [order] {{{ -->
<widget class="\XLite\View\OrderSearch" />
<widget class="\XLite\View\Order" />
<widget class="\XLite\View\Invoice" />
<!-- [/order] }}} -->

<widget module="CDev\GiftCertificates" class="\XLite\Module\CDev\CDev\GiftCertificates\View\AddGiftCertificate" />
<widget module="CDev\GiftCertificates" class="\XLite\Module\CDev\CDev\GiftCertificates\View\Ecards" />
<widget module="CDev\GiftCertificates" class="\XLite\Module\CDev\CDev\GiftCertificates\View\CheckGiftCertificate" />
<widget module="CDev\GiftCertificates" target="gift_certificate_info" template="common/dialog.tpl" body="modules/CDev/GiftCertificates/gift_certificate_info.tpl" head="Gift certificate">
<widget module="CDev\WishList" target="wishlist,product" mode="MessageSent" template="common/dialog.tpl" body="modules/CDev/WishList/message.tpl" head="Message has been sent">
<widget module="CDev\WishList" target="wishlist" head="Wish List" template="common/dialog.tpl" body="modules/CDev/WishList/wishlist.tpl">
<widget module="CDev\ProductAdviser" template="modules/CDev/ProductAdviser/center_top.tpl" />
<!-- [/modules] }}} -->
