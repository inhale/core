/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Checkout controller
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 */

// Payments step
function continueCheckout()
{
	if (!document.payment_method.payment_id) {
		alert('No payment methods are available! Please contact the store administrator.');
		return false;
	}

	pass = false;
	if (document.payment_method.payment_id.length && document.payment_method.payment_id.length > 0) {
		for (i = 0; i < document.payment_method.payment_id.length; i++) {
			if (document.payment_method.payment_id[i].checked == true) {
				pass = true;
				break;
			}
		}

	} else {
		pass = document.payment_method.payment_id.checked;
	}

	if (pass == false) {
		alert('To proceed with checkout, you need to select a payment method.');
		return false;
	}

  return true;
}

$(document).ready(
  function() {
    $('form.payment-methods').submit(continueCheckout);
    $('form.payment-methods li input').click(
      function() {
        if (!this._liList) {
          this._liList = $('li', $(this).parents('ul').eq(0));
        }

        if (!this._li) {
          this._li = $(this).parents('li').eq(0);
        }

        this._liList.removeClass('selected');

        if (this.checked) {
          this._li.addClass('selected');
        }
      }
    );
  }
);

// Last step
function CheckoutSubmit(event)
{
  if (!checkCreditCardInfo()) {
    event.stopPropagation();
    return false;
  }

  return true;
}

function showStar(name)
{
  if (typeof(name) == 'undefined') {
    return false;
  }
  
  var box  = document.getElementById(name + "_box");
  var star = document.getElementById(name + "_star");

  if (box && star) {
    star.style.display = box.checked ? 'none' : '';
  }

  return true;
}
$(document).ready(
  function() {
    $('.checkout-details :submit')
      .attr('disabled', 'disabled')
      .submit(
        function() {
          $(':submit', this).hide();
          $('.submit-progress', this).show();
        }
      );

    $('.checkout-details #agree').click(
      function() {
        if (this.checked) {
          $('.checkout-details :submit').removeAttr('disabled');

        } else {
          $('.checkout-details :submit').attr('disabled', 'disabled');
        }
      }
    );
  }
);
