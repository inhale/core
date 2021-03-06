{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Orders list
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<div class="orders-list {getClassIdentifier()}">
  <div class="panel orders-panel">
    <widget class="\XLite\View\PagerOrig\Common" data="{getOrders()}" name="pager" pageId="{getPageId()}" />
    <widget class="\XLite\View\Sort\Order" />
  </div>

  <ul IF="namedWidgets.pager.getPageData()" class="list">

    <li FOREACH="namedWidgets.pager.getPageData(),order" class="order-{order.order_id}">

      <div class="title">
        <a href="{buildURL(#order#,##,_ARRAY_(#order_id#^order.order_id))}" class="number">#{order.order_id}</a>
        <span>from</span>
        {formatTime(order.date)}
        <div class="status-{order.status}">
          <widget template="common/order_status.tpl" />
          <a href="{buildURL(#order#,##,_ARRAY_(#order_id#^order.order_id,#printable#^#1#))}"><img src="images/spacer.gif" alt="Print" /></a>
        </div>
      </div>

      <widget class="\XLite\View\OrderItemsShort" order="{order}" />

    </li>

  </ul>

<script type="text/javascript">
$(document).ready(
  function() {
    $('.orders-list.{getClassIdentifier()}').each(
      function() {
        new OrdersListController(this, {getAJAXRequestParamsAsJSObject():r});
      }
    );
  }
);
</script>
</div>
