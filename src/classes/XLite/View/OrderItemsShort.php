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
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\View;

/**
 * Order items list (short version)
 *
 * @see   ____class_see____
 * @since 1.0.0
 */
class OrderItemsShort extends \XLite\View\AView
{
    /**
     *  Widget parameters names
     */
    const PARAM_ORDER    = 'order';
    const PARAM_ORDER_ID = 'order_id';
    const PARAM_FULL     = 'full';


    /**
     * Order items list maximunm length
     *
     * @var   integer
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected $orderItemsMax = 3;

    /**
     * Order (cache)
     *
     * @var   \XLite\Model\Order
     * @see   ____var_see____
     * @since 1.0.0
     */
    protected $order = null;


    /**
     * Get order
     *
     * @return \XLite\Model\Order
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getOrder()
    {
        if (is_null($this->order)) {

            $this->order = false;

            if ($this->getParam(self::PARAM_ORDER) instanceof \XLite\Model\Order) {

                // order based
                $this->order = $this->getParam(self::PARAM_ORDER);

            } elseif (0 < $this->getRequestParamValue(self::PARAM_ORDER_ID)) {

                // order id based
                $order = new \XLite\Model\Order($this->getRequestParamValue(self::PARAM_ORDER_ID));

                if ($order->isPersistent()) {

                    $this->order = $order;
                }
            }
        }

        return $this->order;
    }

    /**
     * Get order id
     *
     * @return integer
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getOrderId()
    {
        return $this->getOrder()->get('order_id');
    }

    /**
     * Get order items
     *
     * @return array(\XLite\Model\OrderItem)
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getItems()
    {
        return $this->getRequestParamValue(self::PARAM_FULL)
            ? $this->getOrder()->getItems()
            : array_slice($this->getOrder()->getItems()->toArray(), 0, $this->orderItemsMax);
    }

    /**
     * Check - link to full items list is visible or not
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function isMoreLinkVisible()
    {
        return $this->orderItemsMax < count($this->getItems());
    }

    /**
     * Get list to full items list class name
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getMoreLinkClassName()
    {
        return $this->getRequestParamValue(self::PARAM_FULL) ? 'open' : 'close';
    }

    /**
     * Register JS files
     *
     * @return array
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function getJSFiles()
    {
        $list = parent::getJSFiles();

        // TODO restore
        // $list[] = 'order/list/items.js';

        return $list;
    }


    /**
     * Return widget default template
     *
     * @return string
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getDefaultTemplate()
    {
        return 'order/list/items.tpl';
    }

    /**
     * Define widget parameters
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function defineWidgetParams()
    {
        parent::defineWidgetParams();

        $this->widgetParams += array(
            self::PARAM_ORDER    => new \XLite\Model\WidgetParam\Object('Order', null, false, '\XLite\Model\Order'),
            self::PARAM_ORDER_ID => new \XLite\Model\WidgetParam\Int('Order id', null, false),
            self::PARAM_FULL     => new \XLite\Model\WidgetParam\Bool('Display full list', false),
        );
    }

    /**
     * Check widget visibility
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function isVisible()
    {
        return parent::isVisible() && $this->getOrder();
    }
}
