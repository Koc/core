<form action="{getShopUrl(#cart.php#)}" method="POST" name="wishlist{wishlist.wishlist_id}_form">
<input type=hidden name=target value="wishlist">
<input type=hidden name=action value="send">
<input type=hidden name=wishlist_id value="{wishlist.wishlist_id}">
<table cellpadding=5 cellspacing=0 border=0 width="100%">
<tr>
	<td align="left">
<widget class="XLite_View_Button" label="Clear Wish List" href="cart.php?target=wishlist&action=clear" font="FormButton">
	</td>
    <td align="right"> 
	<b>Send entire wish list by e-mail:</b> <input type=text name="wishlist_recipient" value="{wishlist_recipient}"><br><widget class="XLite_Validator_EmailValidator" field="wishlist_recipient">
    </td>
    <td align="left"> 
<widget class="XLite_View_Button" label="Send" href="javascript: document.wishlist{wishlist.wishlist_id}_form.submit();" font="FormButton">
	</td>
</tr>
</table>
</form>
