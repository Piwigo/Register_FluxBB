{html_head}<link rel="stylesheet" type="text/css" href="{$REGFLUXBB_PATH}admin/template/register_fluxbb.css">{/html_head}

<div class="titrePage">
  <h2>{'Title_Tab'|@translate} {$REGFLUXBB_VERSION}<br>{'Tab_Manage'|@translate}</h2>
</div>

<form method="post" action="">
  <fieldset>
  	<legend>{'Config_Title'|@translate}</legend>
    <div align="left">{'Config_Disclaimer'|@translate}</div>
    <ul>
    	<li><label>{'Prefix'|@translate}</label><br>
    		<input type="text" name="FluxBB_prefix" size="20" style="text-align: center;" value={$FluxBB_PREFIX}><br>
    	</li>
      <br>
    	<li><label>{'Admin'|@translate}</label><br>
    		<input type="text" name="FluxBB_admin" value={$FluxBB_ADMIN} size="20" style="text-align: center;"><br>
    		{'User'|@translate}
    	</li>
      <br>
    	<li><label>{'Guest'|@translate}</label><br>
    		<input type="text" name="FluxBB_guest" value={$FluxBB_GUEST} size="20" style="text-align: center;"><br>
    	</li>
      <br>
    	<li><label>{'Del_Pt'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_DEL_PT_TRUE} name="FluxBB_del_pt">{'Del_Pt_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_DEL_PT_FALSE} name="FluxBB_del_pt">{'Del_Pt_false'|@translate}<br>
    	</li>
      <br>
    	<li><label>{'Confirm'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_CONFIRM_TRUE} name="FluxBB_confirm">{'Confirm_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_CONFIRM_FALSE} name="FluxBB_confirm">{'Confirm_false'|@translate}<br>
    	</li>
      <br>
    	<li><label>{'Details'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_DETAILS_TRUE} name="FluxBB_details">{'Details_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_DETAILS_FALSE} name="FluxBB_details">{'Details_false'|@translate}<br>
    	</li>
    </ul>
    <br>
  	{'No_Reg_advise'|@translate}
    <br>
  	<div align="center"><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" {$TAG_INPUT_ENABLED}></div>
  </fieldset>
</form>