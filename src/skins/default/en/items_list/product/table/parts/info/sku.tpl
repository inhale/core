{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Item SKU
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="itemsList.product.table.customer.info", weight="10")
 *}
<td IF="product.sku">{product.sku}</td>
<td IF="!product.sku">&nbsp;</td>
