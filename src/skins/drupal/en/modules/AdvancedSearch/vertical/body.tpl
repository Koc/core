{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Advanced search form (vertical)
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 *}
<widget class="\XLite\Module\AdvancedSearch\View\Form\QuickSearch" name="adsearch_form" className="advanced-search-sidebar" />

  {* Had to use TABLE because it's the only cross-browser solution to make the widget fit 100% width of a sidebar *}

  <table>

    {displayViewListContent(#advsearch.vertical.base#)}

  </table>

  <div class="buttons-row">
    <widget class="\XLite\View\Button\Submit" label="Search" />
  </div>

<widget name="adsearch_form" end />

<script type="text/javascript">
<!--
new advancedSearchController($('.advanced-search-sidebar'));
-->
</script>

