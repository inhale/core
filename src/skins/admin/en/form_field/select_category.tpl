{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Common selector
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<select id="{getFieldId()}" name="{getName()}"{getAttributesCode():h} />
  <option FOREACH="getOptions(),category" value="{category.getCategoryId()}" style="padding-left: {getIndentation(category,15)}px;" selected="{isCategorySelected(category.getCategoryId())}">{category.getName()}</option>
</select>

