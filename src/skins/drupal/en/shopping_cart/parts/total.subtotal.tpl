{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Shipping cart subtotal block
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="cart.totals", weight="20")
 *}
<li>
  <em>Subtotal:</em>
  {price_format(cart,#subtotal#):h}
</li>