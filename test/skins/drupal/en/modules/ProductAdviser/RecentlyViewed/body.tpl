{* Recently viewed menu body *}
<ol>
  <li FOREACH="recentliesProducts,id,product">
    <a href="cart.php?target=product&amp;product_id={product.product_id}&amp;category_id={product.category.category_id}" class="SidebarItems">{product.name:h}</a>
  </li>
</ol>

<div IF="additionalPresent">
  <a href="cart.php?target=RecentlyViewed" onClick="this.blur()">All viewed...</a>
</div>
