/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Minicart controller
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 */
var oldPostprocess = MinicartView.prototype.postprocess;
MinicartView.prototype.postprocess = function(isSuccess)
{
  oldPostprocess.apply(this, arguments);

  if (isSuccess) {
    jQuery('a.item-options', this.base).map(
      function()
      {
        jQuery(this).cluetip(
          {
            local: true,
            dropShadow: false,
            showTitle: false,
            cluezIndex: 11000,
            width: 100,
            positionBy: 'bottomTop',
            topOffset: 15,
            mouseOutClose: false,
            onShow: function(ct, c) {
              ct.width('auto');
            }
          }
        );
      }
    );
  }
}
