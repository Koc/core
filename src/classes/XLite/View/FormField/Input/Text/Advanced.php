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
 * @copyright  Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version    GIT: $Id$
 * @link       http://www.litecommerce.com/
 * @see        ____file_see____
 * @since      3.0.0
 */

namespace XLite\View\FormField\Input\Text;

/**
 * \XLite\View\FormField\Input\Text\Advanced
 * 
 * @package XLite
 * @see     ____class_see____
 * @since   3.0.0
 */
class Advanced extends \XLite\View\FormField\Input\Text
{

    /**
     * Widget catalog 
     */
    const WIDGET_DIR = '/advanced_text_input';

    /**
     * Register JS files
     *
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getJSFiles()
    {   
        $list = parent::getJSFiles();
        $list[] = $this->getDir() . static::WIDGET_DIR . '/script.js';

        return $list;
    }   

    /**
     * getCSSFiles 
     * 
     * @return array
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getCSSFiles()
    {   
        $list = parent::getCSSFiles();
        $list[] = $this->getDir() . static::WIDGET_DIR . '/style.css';

        return $list;
    }   

    /**
     * getLabel 
     * 
     * @return string
     * @access public
     * @see    ____func_see____
     * @since  3.0.0
     */
    public function getLabel()
    {
        return $this->getValue() ?: parent::getLabel();
    }   

    /** 
     * Return widget default template
     *
     * @return string
     * @access protected
     * @since  3.0.0
     */
    protected function getDefaultTemplate()
    {
        return $this->getDir() . static::WIDGET_DIR . '/input.tpl';
    }


}
