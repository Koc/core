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
 * @subpackage Controller
 * @author     Creative Development LLC <info@cdev.ru> 
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    SVN: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\Module\CDev\GiftCertificates\Controller\Admin;

/**
 * E-cards
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class GiftCertificateEcards extends \XLite\Controller\Admin\AAdmin
{
    /**
     * Get e-cards 
     * 
     * @return array(\XLite\Module\CDev\GiftCertificates\Model\ECard)
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getECards()
    {
        $ecard = new \XLite\Module\CDev\GiftCertificates\Model\ECard();

        return $ecard->findAll();
    }

    /**
     * Update list
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionUpdate()
    {
        if (
            isset(\XLite\Core\Request::getInstance()->pos)
            && is_array(\XLite\Core\Request::getInstance()->pos)
        ) {

            foreach (\XLite\Core\Request::getInstance()->pos as $ecardId => $orderBy) {
                $ec = new \XLite\Module\CDev\GiftCertificates\Model\ECard($ecardId);
                $ec->set('order_by', $orderBy);
                $ec->set('enabled', isset(\XLite\Core\Request::getInstance()->enabled[$ecardId]) ? 1 : 0);
                $ec->update();
            }
        }
    }

    /**
     * Delete 
     * 
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  3.0.0
     */
    protected function doActionDelete()
    {
        $ec = new \XLite\Module\CDev\GiftCertificates\Model\ECard(\XLite\Core\Request::getInstance()->ecard_id);
        $ec->delete();
    }

}