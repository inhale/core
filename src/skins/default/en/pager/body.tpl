{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Pager
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<ul class="pager" IF="isPagesListVisible()">

  <li class="previous {if:isCurrentPage(getPageIdByNotation(#first#))}disabled{else:}active{end:}">
    <a href="{buildUrlByPageId(getPageIdByNotation(#previous#))}" class="{getPageIdByNotation(#previous#)}">&nbsp;</a>
  </li>

  <li class="first" IF="isFurthermostPage(#first#)">
    <a href="{buildUrlByPageId(getPageIdByNotation(#first#))}" class="{getPageIdByNotation(#first#)}">{inc(getPageIdByNotation(#first#))}</a>
  </li>

  <li class="furthermost" IF="isFurthermostPage(#first#)">...</li>

  <li FOREACH="getPageUrls(),num,pageUrl" class="item {num} {if:isCurrentPage(num)}selected{else:}active{end:}">
    <a href="{pageUrl}" class="{num}">{inc(num)}</a>
  </li>

  <li class="furthermost" IF="isFurthermostPage(#last#)">...</li>

  <li class="last" IF="isFurthermostPage(#last#)">
    <a href="{buildUrlByPageId(getPageIdByNotation(#last#))}" class="{getPageIdByNotation(#last#)}">{inc(getPageIdByNotation(#last#))}</a>
  </li>

  <li class="next {if:isCurrentPage(getPageIdByNotation(#last#))}disabled{else:}active{end:}">
    <a href="{buildUrlByPageId(getPageIdByNotation(#next#))}" class="{getPageIdByNotation(#next#)}">&nbsp;</a>
  </li>

</ul>

{displayListPart(#itemsTotal#)}
