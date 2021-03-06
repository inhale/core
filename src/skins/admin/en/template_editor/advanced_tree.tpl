{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * 'Advanced tree' template
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}

<span IF="shortcuts">

  <b>Frequently used templates:</b>

  <widget class="\XLite\View\FileExplorer" columnCount="1" dsn="shortcuts" />

<hr />

</span>

<widget class="\XLite\View\FileExplorer" formSelectionName="selected_file" columnCount="2" modifier="zone" />


