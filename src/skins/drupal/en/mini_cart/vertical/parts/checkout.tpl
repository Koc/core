{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Vertical minicart checkout button block
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 * @ListChild (list="#minicart.vertical.childs", weight="30")
 *}
<div class="cart-checkout" IF="!cart.empty">
  <widget class="\XLite\View\Button\Link" label="Checkout" location="{buildURL(#checkout#)}" style="bright-button checkout-button">
</div>
