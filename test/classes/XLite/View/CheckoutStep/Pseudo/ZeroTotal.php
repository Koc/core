<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 * 
 * @category   LiteCommerce
 * @package    XLite
 * @subpackage ____sub_package____
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

/**
 * XLite_View_CheckoutStep_Pseudo_ZeroTotal
 * 
 * @package    XLite
 * @subpackage ____sub_package____
 * @since      3.0.0
 */
class XLite_View_CheckoutStep_Pseudo_ZeroTotal extends XLite_View_CheckoutStep_Pseudo_Abstract
{
	/**
     * Return title
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getHead()
    {
        return 'Your order will be placed automatically';
    }

    /**
     * Return top message text for error
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getErrorText()
    {
        return null;
    }

    /**
     * Return top message text for success
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getSuccessText()
    {
        return 'Your order has been placed automatically';
    }
}
