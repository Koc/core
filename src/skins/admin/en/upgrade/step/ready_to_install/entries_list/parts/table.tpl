{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Entries list
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *
 * @ListChild (list="upgrade.step.ready_to_install.entries_list.sections", weight="100")
 * @ListChild (list="upgrade.step.completed.entries_list.sections", weight="200")
 *}

<table class="downloaded-components">
  <tr class="header">{displayInheritedViewListContent(#sections.table.header#)}</tr>
  {foreach:getUpgradeEntries(),entry}

  <tr IF="!entry.getErrorMessages()" class="module-entry">
    {displayInheritedViewListContent(#sections.table.columns#,_ARRAY_(#entry#^entry))}
  </tr>

  <tr IF="entry.getErrorMessages()" class="module-entry module-errors">
    {displayInheritedViewListContent(#sections.table.columns#,_ARRAY_(#entry#^entry))}
  </tr>

  <tr IF="entry.getErrorMessages()" class="error-messages">
    {displayInheritedViewListContent(#sections.table.columns.error#,_ARRAY_(#messages#^entry.getErrorMessages()))}
  </tr>
  {end:}
</table>
