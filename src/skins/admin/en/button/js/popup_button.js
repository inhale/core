/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * ____file_title____
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   GIT: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 */

jQuery(document).ready(
  function() {
    jQuery('.popup-button').each(
      function () {
        var button;
        button = this;

        jQuery(this).click(
          function () {
            var urlParams;
            urlParams = core.getCommentedData(button, 'url_params');
            return loadDialogByLink(
              button,
              URLHandler.buildURL(urlParams)
            );
          }
        );
      }
    );
  }
);

