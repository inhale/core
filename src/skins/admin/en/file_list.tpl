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
<table border="0" width="100%">
<tr>
<td FOREACH="columns,column,val" width="50%" valign="top">

{foreach:getColumnsData(column),node}

{if:formSelectionName}<input type="radio" name="{formSelectionName}" value="{node.id}">{end:}
<a href="{node.url:h}" style="font-size:10pt">{if:node.leaf}<img src="images/doc.gif" border="0">
{else:}<img src="images/folder.gif" border="0">
{end:}
{node.name}</a>
{if:node.comment}&nbsp;&nbsp;-&nbsp;<font style="font-size:8pt">{node.comment}</font><br>
{else:}
<br>
{end:}

{end:}

</td>
</tr>
</table>
