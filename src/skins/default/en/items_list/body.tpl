{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * ____file_title____
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<div class="items-list {getSessionCell()}">

  <div class="list-pager">{pager.display()}</div>

  <div IF="isHeaderVisible()" class="list-header">{displayViewListContent(#itemsList.header#)}</div>

  <widget template="{getPageBodyTemplate()}" />

  <div class="list-pager">{pager.display()}</div>

  <div IF="isFooterVisible()" class="list-footer">{displayViewListContent(#itemsList.footer#)}</div>

</div>

<script type="text/javascript">
  new {getJSHandlerClassName()}('{getSessionCell()}', {getURLParamsJS():h}, {getURLAJAXParamsJS():h});
</script>
