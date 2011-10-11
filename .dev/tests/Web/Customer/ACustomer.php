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
 * @package    Tests
 * @subpackage Web
 * @author     Creative Development LLC <info@cdev.ru>
 * @copyright  Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      1.0.0
 */

require_once __DIR__ . '/../AWeb.php';

abstract class XLite_Web_Customer_ACustomer extends XLite_Web_AWeb
{
    protected function logIn($username = 'master', $password = 'master')
    {
        $this->open('user');

        if ($this->isLoggedIn()) {
            $this->logOut(true);
        }

        $this->type('id=edit-name', $username);
        $this->type('id=edit-pass', $password);

        $this->submitAndWait('id=user-login');

        $this->assertTrue($this->isLoggedIn(), 'Check that user is logged in successfully');
    }

    protected function logOut()
    {
        $this->open('user/logout');

        $this->assertFalse($this->isLoggedIn(), 'Check that user is logged out');
    }

    protected function isLoggedIn()
    {
        return $this->isElementPresent('//a[@class="log-in" and contains(@href,"user/logout")]');
    }

    protected function isAdmin()
    {
        return $this->isLoggedIn() && $this->isElementPresent('toolbar');
    }

    protected function getActiveProduct()
    {
        $result = \XLite\Core\Database::getRepo('XLite\Model\Product')
            ->findOneByEnabled(true);

        $this->assertNotNull($result, 'getActiveProduct() returned null');

        return $result;
    }

    protected function getActiveProducts()
    {
        return \XLite\Core\Database::getRepo('XLite\Model\Product')
            ->findByEnabled(true);
    }

    /**
     * Returns ID of a LiteCommerce widget in the list of LC Connector blocks (returns only the first Drupal block displaying the widget)
     *
     * @param string $widgetClass Class of the widget to look for
     *
     * @return int
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function findWidgetID($widgetClass)
    {
        $pdo = $this->query('SELECT bid FROM drupal_block_custom WHERE lc_class = "'.addslashes($widgetClass).'" LIMIT 1');
        $r = $pdo->fetch();
        $pdo->closeCursor();

        $id = is_array($r) ? array_shift($r) : null;

        return $id;
    }

    /**
     * Returns ID of the widget implementing a product list
     *
     * @return int
     * @access protected
     * @since  1.0.0
     */
    protected function getWidgetId()
    {
        $id = $this->findWidgetID($this->widgetClass);
        $this->assertFalse(is_null($id), "Can't find the widget in the database");
        return $id;
    }

    /**
     * Sets a widget parameter
     *
     * @param int    $widgetId ID of the widget in the list of LC Connector blocks
     * @param string $param    Param name
     * @param string $value    Param value
     *
     * @return void
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function setWidgetParam($widgetId, $param, $value)
    {
        $this->query("UPDATE drupal_block_lc_widget_settings SET value = '" . addslashes($value) . "' WHERE bid = '" . addslashes($widgetId) . "' AND name = '" . addslashes($param) . "'");
    }

    /**
     * Executes an SQL query
     *
     * @param string $query SQL query to execute
     *
     * @return Doctrine\DBAL\Driver\PDOStatement
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function query($query)
    {
        return \XLite\Core\Database::getEM()->getConnection()->executeQuery($query, array());
    }

    /**
     * Resets the browser and instantiates a new browser session
     *
     * @return void
     * @access protected
     * @since  1.0.0
     */
    protected function resetBrowser()
    {
        $this->stop();
        $this->start();
    }

    /**
     * Get payment method id by name
     *
     * @param string $name Payment method name
     *
     * @return integer
     * @access protected
     * @see    ____func_see____
     * @since  1.0.0
     */
    protected function getPaymentMethodIdByName($name)
    {
        $pmethod = \XLite\Core\Database::getRepo('XLite\Model\Payment\Method')->findOneBy(array('service_name' => $name));
        
        if (!$pmethod) {
            $this->fail($name . ' payment method is not found');
        }

        $pid = $pmethod->getMethodId();

        return $pid;
    }
}
