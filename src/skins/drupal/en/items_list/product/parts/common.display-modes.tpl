{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Products list display mode selector
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *
 * @ListChild (list="itemsList.header", weight="20")
 *}

<ul class="display-modes grid-list" IF="isDisplayModeSelectorVisible()">
  <li FOREACH="displayModes,key,name" class="{getDisplayModeLinkClassName(key)}">
    <a href="{getActionUrl(_ARRAY_(#displayMode#^key))}" class="{key}">{name}</a>
  </li>
</ul>
