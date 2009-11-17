<div class="titrePage">
  <ul class="categoryActions">
  
  </ul>
  <h2>{'Tab_Manage'|@translate}</h2>
</div>

<br>

<form method="post" action={$FluxBB_F_ACTION}>
  <fieldset>
  	<legend>{'Register_FluxBB_Config_Title'|@translate}</legend>
    <div align="left">{'Register_FluxBB_Config_Disclaimer'|@translate}</div>
    <ul>
    	<li><label>{'Register_FluxBB_Prefix'|@translate}</label><br>
    		<input type="text" name="FluxBB_prefix" size="20" style="text-align: center;" value={$FluxBB_PREFIX}><br>
    	</li>
      <br>
    	<li><label>{'Register_FluxBB_Admin'|@translate}</label><br>
    		<input type="text" name="FluxBB_admin" value={$FluxBB_ADMIN} size="20" style="text-align: center;"><br>
    		<label>{'Register_FluxBB_User'|@translate}</label><br>
    	</li>
      <br>
    	<li><label>{'Register_FluxBB_Guest'|@translate}</label><br>
    		<input type="text" name="FluxBB_guest" value={$FluxBB_GUEST} size="20" style="text-align: center;"><br>
    	</li>
      <br>
    	<li><label>{'Register_FluxBB_Del_Pt'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_DEL_PT_TRUE} name="FluxBB_del_pt">{'Register_FluxBB_Del_Pt_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_DEL_PT_FALSE} name="FluxBB_del_pt">{'Register_FluxBB_Del_Pt_false'|@translate}<br>
    	</li>
      <br>
    	<li><label>{'Register_FluxBB_Confirm'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_CONFIRM_TRUE} name="FluxBB_confirm">{'Register_FluxBB_Confirm_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_CONFIRM_FALSE} name="FluxBB_confirm">{'Register_FluxBB_Confirm_false'|@translate}<br>
    	</li>
      <br>
    	<li><label>{'Register_FluxBB_Details'|@translate}</label><br>
        <input type="radio" value="true" {$FluxBB_DETAILS_TRUE} name="FluxBB_details">{'Register_FluxBB_Details_true'|@translate}<br>
        <input type="radio" value="false" {$FluxBB_DETAILS_FALSE} name="FluxBB_details">{'Register_FluxBB_Details_false'|@translate}<br>
    	</li>
    </ul>
    <br>
  	{'Register_FluxBB_No_Reg_advise'|@translate}
    <br>
  	<div align="center"><input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" {$TAG_INPUT_ENABLED}></div>
  </fieldset>
</form>