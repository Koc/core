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

/**
 * Advanced search widget (controller)
 * 
 * @package    XLite
 * @subpackage View
 * @since      3.0.0 EE
 */
class XLite_Module_AdvancedSearch_View_AdvancedSearch extends XLite_Module_AdvancedSearch_View_AdvancedSearchAbstract
{
    /**
     * Targets this widget is allowed for
     *
     * @var    array
     * @access protected
     * @since  3.0.0 EE
     */
    protected $allowedTargets = array('advanced_search');

    /**
     * Initialize widget
     *
     * @return void
     * @access public
     * @since  3.0.0 EE
     */
    public function init(array $attributes = array())
    {
        parent::init($attributes);

        $this->attributes['displayMode'] = 'horizontal';
    }

    /**
     * Set properties
     *
     * @param array $attributes params to set
     *  
     * @return void
     * @access protected
     * @since  3.0.0 EE
     */
    protected function setAttributes(array $attributes)
    {
        if (isset($attributes['displayMode'])) {
            unset($attributes['displayMode']);
        }

        parent::setAttributes($attributes);
    }
}

