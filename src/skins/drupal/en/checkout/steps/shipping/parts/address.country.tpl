{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Shipping address : country
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="checkout.shipping.address", weight="30")
 *}
<li class="country">
  <label for="shipping_address_country">{t(#Country#)}:</label>
  <widget class="\XLite\View\CountrySelect" field="shippingAddress[country]" fieldId="shipping_address_country" country="{address.country.code}" />
</li>
