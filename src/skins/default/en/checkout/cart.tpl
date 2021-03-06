{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Cart
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<div id="shopping-cart" class="checkout-cart">

  <widget module="CDev\ProductOptions" template="modules/CDev/ProductOptions/selected_options_js.tpl">

  <widget template="shopping_cart/items.tpl" />

  <div class="cart-totals">
    <span>Subtotal: {price_format(cart,#subtotal#):h}</span>
  </div>

  <widget module="CDev\ProductAdviser" template="modules/CDev/ProductAdviser/OutOfStock/notify_form.tpl" IF="{xlite.PA_InventorySupport}" />

</div>

<div class="clear">&nbsp;</div>
