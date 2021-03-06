{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Products list page template
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<widget template="common/dialog.tpl" head="Search product" body="product/search.tpl" />

{* Open <form ...> tag *}
<widget class="\XLite\View\Form\Product\Modify\Batch" name="products_form" />

  {* List of products *}
  <widget class="\XLite\View\ItemsList\Product\Admin\Search" />

{* Close </form> tag *}
<widget name="products_form" end />
