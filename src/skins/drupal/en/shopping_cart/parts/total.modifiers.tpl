{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Shopping cart modifiers
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="cart.panel.totals", weight="20")
 *}
<li FOREACH="cart.getVisibleSavedModifiers(),m" class="{m.getCode()}-modifier">
  <strong>{m.getName()}:</strong>
  {if:m.isAvailable()}
    {formatPrice(m.getSurcharge(),cart.getCurrency())}
  {else:}
    {t(#n/a#)}
  {end:}
</li>
