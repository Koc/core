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
 * @subpackage View
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\View\Checkout\Step;

/**
 * Payment checkout step
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Payment extends \XLite\View\Checkout\Step\AStep
{
    /**
     * Get step name
     *
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getStepName()
    {
        return 'payment';
    }

    /**
     * Get step title
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getTitle()
    {
        return $this->t('Payment info');
    }

    /**
     * Check - step is complete or not
     *
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isCompleted()
    {
        return $this->getCart()->getProfile()
            && $this->getCart()->getProfile()->getBillingAddress()
            && $this->getCart()->getProfile()->getBillingAddress()->isCompleted(\XLite\Model\Address::BILLING)
            && $this->getCart()->getPaymentMethod();
    }

    /**
     * Return list of available payment methods
     * 
     * @return array
     * @access public
     * @since  3.0.0
     */
    public function getPaymentMethods()
    {
        return $this->getCart()->getPaymentMethods();
    }

    /**
     * Check - billing address is completed or not
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isAddressCompleted()
    {
        $profile = $this->getCart()->getProfile();

        return $profile
            && $profile->getBillingAddress()
            && $profile->getBillingAddress()
                ->isCompleted(\XLite\Model\Address::BILLING);
    }

    /**
     * Check - payment method is selected or not
     * 
     * @param \XLite\Model\Payment\Method $method Payment methods
     *  
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isPaymentSelected(\XLite\Model\Payment\Method $method)
    {
        return $this->getCart()->getPaymentMethod() == $method;
    }

    /**
     * Check - shipping and billing addrsses are same or not
     * 
     * @return boolean
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function isSameAddress()
    {
        return $this->getCart()->getProfile() && $this->getCart()->getProfile()->isEqualAddress();
    }
}