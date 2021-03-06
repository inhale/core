{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Quick look
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<div class="product-quicklook">
  <widget class="\XLite\View\Form\Product\AddToCart" name="add_to_cart" product="{product}" className="product-details hproduct" />
    {displayViewListContent(#product.details.quicklook#)}
  <widget name="add_to_cart" end />

  {displayViewListContent(#product.details.quicklook.rotator#)}
</div>

<script type="text/javascript">
//<![CDATA[
new ProductDetailsController(jQuery('div.product-quicklook')); 
//]]>
</script>
