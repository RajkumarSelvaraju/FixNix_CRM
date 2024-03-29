{*
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

*}

<script language="javascript">
{if $edit_shared}
	{literal}
	SUGAR.util.doWhen(function(){
		return typeof cal_loaded != 'undefined' && cal_loaded == true && typeof dom_loaded != 'undefined' && dom_loaded == true;	
	},function(){
		CAL.toggle_shared_edit();
	});
	{/literal}
{/if}

{literal}
			function up(name){
				var td = document.getElementById(name+'_td');
				var obj = td.getElementsByTagName('select')[0];
				obj =(typeof obj == "string") ? document.getElementById(obj) : obj;
				if(obj.tagName.toLowerCase() != "select" && obj.length < 2)
					return false;
				var sel = new Array();
							
				for(i = 0; i < obj.length; i++){
					if(obj[i].selected == true) {
						sel[sel.length] = i;
					}
				}
				for(i in sel){
					if(sel[i] != 0 && !obj[sel[i]-1].selected) {
						var tmp = new Array(obj[sel[i]-1].text, obj[sel[i]-1].value);
						obj[sel[i]-1].text = obj[sel[i]].text;
						obj[sel[i]-1].value = obj[sel[i]].value;
						obj[sel[i]].text = tmp[0];
						obj[sel[i]].value = tmp[1];
						obj[sel[i]-1].selected = true;
						obj[sel[i]].selected = false;
					}
				}
			}			
			function down(name){
				var td = document.getElementById(name+'_td');
				var obj = td.getElementsByTagName('select')[0];
				if(obj.tagName.toLowerCase() != "select" && obj.length < 2)
					return false;
				var sel = new Array();
				for(i=obj.length-1; i>-1; i--){
					if(obj[i].selected == true) {
						sel[sel.length] = i;
					}
				}
				for(i in sel){
					if(sel[i] != obj.length-1 && !obj[sel[i]+1].selected) {
						var tmp = new Array(obj[sel[i]+1].text, obj[sel[i]+1].value);
						obj[sel[i]+1].text = obj[sel[i]].text;
						obj[sel[i]+1].value = obj[sel[i]].value;
						obj[sel[i]].text = tmp[0];
						obj[sel[i]].value = tmp[1];
						obj[sel[i]+1].selected = true;
						obj[sel[i]].selected = false;
					}
				}
			}
{/literal}
</script>

<div id="shared_cal_edit" style="display: none; width: 400px;">
<form name="shared_cal" action="index.php" method="post">
<div class="hd">{$MOD.LBL_EDIT_USERLIST}</div>
<div class="bd">	
	<input type="hidden" name="module" value="Calendar">
	<input type="hidden" name="action" value="index">
	<input type="hidden" name="edit_shared" value="">
	<input type="hidden" name="view" value="shared">
	
	
	<table cellpadding="0" cellspacing="3" border="0" align="center" width="100%">
		<tr><th valign="top" align="center" colspan="2">{$MOD.LBL_SELECT_USERS}</th></tr>
		<tr><td valign="top"></td><td valign="top">
			<table cellpadding="1" cellspacing="1" border="0" class="edit view" align="center">
				<tr>
					<td valign="top" nowrap=""><b>{$MOD.LBL_USERS}:</b></td>
					<td valign="top" id="shared_ids_td">
						<select id="shared_ids" name="shared_ids[]" multiple size="8">{$users_options}</select>
					</td>					
					<td>
						<a onclick="up('shared_ids');">{$UP}</a><br>
						<a onclick="down('shared_ids');">{$DOWN}</a>
					</td>
				</tr>
			</table>
		</td></tr>
	</table>
</div>
<div class="ft" style="text-align: right;">
	<input id="sharedCalUsersSelectBtn" class="button" type="button" title="{$APP.LBL_SELECT_BUTTON_TITLE}" accesskey="{$APP.LBL_SELECT_BUTTON_KEY}" value="{$APP.LBL_SELECT_BUTTON_LABEL}" onclick="document.shared_cal.submit();">
	<input id="sharedCalUsersCancelBtn" class="button" onclick="CAL.sharedDialog.cancel();" type="button" title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accesskey="{$APP.LBL_CANCEL_BUTTON_KEY}" value="{$APP.LBL_CANCEL_BUTTON_LABEL}">
</div>
</form>
</div>
