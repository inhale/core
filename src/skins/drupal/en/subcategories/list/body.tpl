{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Subcategories list (list style)
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<ul class="subcategory-list" IF="category.getSubcategories()">
  <li FOREACH="category.getSubcategories(),subcategory">
    <a href="{buildURL(#category#,##,_ARRAY_(#category_id#^subcategory.category_id))}" class="subcategory-name">{subcategory.name}</a>
  </li>
  <li FOREACH="getViewList(#subcategories.childs#),w">
    {w.display()}
  </li>
</ul>
{displayViewListContent(#subcategories.base#)}
