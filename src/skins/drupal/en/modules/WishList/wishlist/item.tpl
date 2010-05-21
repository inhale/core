{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Wishlist item
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<td class="delete-from-list">
  <widget class="XLite_Module_WishList_View_Form_Item_Delete" name="wl_remove" item="{item}" />
    <widget class="XLite_View_Button_Image" label="Remove" action="delete" />
  <widget name="wl_remove" end />
</td>

<td class="item-thumbnail" IF="item.hasImage()">
  <a href="{buildURL(item.url.target,item.url.action,item.url.arguments)}">
    <widget class="XLite_View_Image" image="{item.getThumbnail()}" alt="{item.name}" maxWidth="75" maxHeight="75" IF="item.getThumbnail()" />
    <img src="{item.imageURL}" alt="{item.name}" IF="!item.getThumbnail()"/>
  </a>
</td>

<td class="item-info">
  <p class="item-title"><a href="{buildURL(item.url.target,item.url.action,item.url.arguments)}">{item.name:h}</a></p>
  <p class="item-sku" IF="{item.sku}">SKU: {item.sku}</p>
  <p class="item-weight" IF="{item.weight}">Weight: {item.weight} {config.General.weight_symbol}</p>
  <p class="item-options">
    <widget module="ProductOptions" class="XLite_Module_ProductOptions_View_SelectedOptions" item="{item}" source="wishlist" item_id="{item.item_id}" storage_id="{item.wishlist_id}" />
  </p>
</td>

<td class="item-actions">

  <widget class="XLite_Module_WishList_View_Form_Item_Update" name="wl_item" item="{item}" />

    <div class="item-sums">
      <span class="item-price">{price_format(item,#price#):h}</span>
      <span class="sums-multiply">x</span>
      <span class="item-quantity"><input type="text" name="wishlist_amount" value="{item.amount}" /></span>
      <span class="sums-equals">=</span>
      <span class="item-subtotal">{price_format(item,#total#):h}</span>
    </div>

  <widget name="wl_item" end />

  <widget class="XLite_Module_WishList_View_Form_Item_MoveToCart" name="wl_item_move" item="{item}" />

    <div class="item-buttons">
      <widget class="XLite_View_Button_Regular" style="aux-button add-to-cart" label="Move to cart" />
      <div class="move-quantity" style="display: none;">
        Qty: <input type="text" name="amount" value="{item.amount}" />
      </div>
    </div>

  <widget name="wl_item_move" end />

</td>