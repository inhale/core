{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Popup box to display error
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *
 * @ListChild (list="product.quantity-box", weight="10")
 *}

<div class="product-max-qty">
  {t(#Max#)}: <span class="product-max-qty-container">{getMaxQuantity()}</span>
</div>
