{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Top messages
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<div id="{getBlockId()}">

  <a href="#" class="close">&nbsp;</a>

  <ul>
    <li FOREACH="getTopMessages(),data" class="{getType(data)}">
    {getText(data)}
    </li>
  </ul>

</div>
