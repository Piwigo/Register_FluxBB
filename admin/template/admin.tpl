{combine_script id='jquery' path='themes/default/js/jquery.min.js'}
{combine_script id='jquery.cluetip' require='jquery' path='themes/default/js/plugins/jquery.cluetip.js'}

{combine_css path= $REGFLUXBB_PATH|@cat:'admin/template/register_fluxbb.css'}
{if $REGFLUXBB_THEME=='clear'}{combine_css path= $REGFLUXBB_PATH|@cat:'admin/template/themes/clear/theme.css'}{/if}
{if $REGFLUXBB_THEME=='roma'}{combine_css path= $REGFLUXBB_PATH|@cat:'admin/template/themes/roma/theme.css'}{/if}
{if $REGFLUXBB_THEME=='default'}{combine_css path= $REGFLUXBB_PATH|@cat:'admin/template/themes/default/theme.css'}{/if}

{footer_script}{literal}
jQuery().ready(function()
{
  jQuery('.cluetip').cluetip(
  {
    width: 550,
    splitTitle: '|'
  });
});

function blockToggleDisplay(headerId, contentId)
{
  var revHeader = document.getElementById(headerId);
  var revContent = document.getElementById(contentId);

  if (revContent.style.display == 'none')
  {
    revContent.style.display = 'block';
    revHeader.className = 'instructionBlockHeaderExpanded';
  }
  else
  {
    revContent.style.display = 'none';
    revHeader.className = 'instructionBlockHeaderCollapsed';
  }
}

function rfbb_blockToggleDisplay( headerId, contentId )
{
  if (typeof(headerId)=='string')
  {
   if (headerId.length > 1)
       blockToggleDisplay(headerId, contentId) ;
      document.getElementById("nb_para").value =headerId ;
      document.getElementById("nb_para2").value =contentId;
  }
}
{/literal}{/footer_script}

<div class="titrePage">
  <h2>{'Title'|@translate} {$REGFLUXBB_VERSION}</h2>
</div>

<div id="instructionTips" class="instructionBlock" >
  <div id="Instruction_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('Instruction_header', 'Instructions')">
    <span class="cluetip" title="{'Instruction_Title'|translate}|{'Instruction_Title_d'|translate}">
      {'Instruction_Title'|@translate}
    </span>
  </div>
  <div id="Instructions" class="instructionBlockContent" style="display:none">
    <div style="text-align: left; margin-left: 1em; margin-right: 1em;">{'Disclaimer'|@translate}</div>

    <div id="instructionConfig1" class="instructionBlock" >
      <div id="config1_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('config1_header', 'Config1')">
      <span class="cluetip" title="{'About_Reg_Title'|translate}|{'About_Reg_Title_d'|translate}">
        {'About_Reg_Title'|@translate}
      </span>
    </div>
  
    <div id="Config1" class="instructionBlockContent" style="display:none">
      {'No_Reg_advise'|@translate}
    </div>
  </div>

  <div id="instructionConfig2" class="instructionBlock" >
    <div id="config2_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('config2_header', 'Config2')">
    <span class="cluetip" title="{'About_Bridge_Title'|translate}|{'About_Bridge_Title_d'|translate}">
        {'About_Bridge_Title'|@translate}
      </span>
    </div>
  
    <div id="Config2" class="instructionBlockContent" style="display:none">
      {'UAM_Bridge_advice'|@translate}
    </div>
  </div>
  </div>
</div>

<form method="post" action="" class="general">
<div id="instructionConfig" class="instructionBlock" >

  <div id="config_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('config_header', 'Config')">
    <span class="cluetip" title="{'Config_Title'|translate}|{'Config_Title_d'|translate}">
      {'Config_Title'|@translate}
    </span>
  </div>

  <div id="Config" class="instructionBlockContent" style="display:none">

  <p>
    <input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" {$TAG_INPUT_ENABLED}/>
    <input name="nb_para" id="nb_para" type="text" value="{$nb_para}" style="display:none"/> 
    <input name="nb_para2" id="nb_para2" type="text" value="{$nb_para2}" style="display:none"/> 
  </p>

  <fieldset>
  	<legend>{'Config_Title'|@translate}</legend>
    {'Config_Disclaimer'|@translate}
    <br/><br/>
    <fieldset>
    <legend>{'Config_Title1'|@translate}</legend>
    <ul>
    	<li><label>{'Prefix'|@translate}</label><br/>
    		<input type="text" name="FluxBB_prefix" value="{$FluxBB_PREFIX}" size="20" style="text-align: center;"/><br/>
      <br/>
    	</li>
    	<li><label>{'Admin'|@translate}</label><br/>
    		<input type="text" name="FluxBB_admin" value="{$FluxBB_ADMIN}" size="20" style="text-align: center;"/><br/>
      <br/>
    	</li>
    	<li><label>{'Guest'|@translate}</label><br/>
    		<input type="text" name="FluxBB_guest" value="{$FluxBB_GUEST}" size="20" style="text-align: center;"/><br/>
      <br/>
    	</li>
    	<li><label>{'Del_Pt'|@translate}</label><br/>
        <input type="radio" value="true" {$FluxBB_DEL_PT_TRUE} name="FluxBB_del_pt"/>{'Del_Pt_true'|@translate}<br/>
        <input type="radio" value="false" {$FluxBB_DEL_PT_FALSE} name="FluxBB_del_pt"/>{'Del_Pt_false'|@translate}<br/>
      <br/>
    	</li>
      {if $UAM_BRIDGE}
    	<li><label>{'Bridge_UAM'|@translate}</label><br/>
        <input type="radio" value="true" {$FluxBB_UAM_LINK_TRUE} name="FluxBB_UAM"/>{'Bridge_UAM_true'|@translate}<br/>
        <input type="radio" value="false" {$FluxBB_UAM_LINK_FALSE} name="FluxBB_UAM"/>{'Bridge_UAM_false'|@translate}<br/>
      <br/>
      </li>
    	<li><label>{'FluxBB_Group'|@translate}</label><br/>
    		<input type="text" name="FluxBB_group" value="{$FluxBB_GROUP}" size="6" style="text-align: center;"/><br/>
    	</li>
      {/if}
    </ul>
    <br/>
    </fieldset>
    <fieldset>
    <legend>{'Config_Title2'|@translate}</legend>
    <ul>
      <li><label>{'Details'|@translate}</label><br/>
        <input type="radio" value="true" {$FluxBB_DETAILS_TRUE} name="FluxBB_details"/>{'Details_true'|@translate}<br/>
        <input type="radio" value="false" {$FluxBB_DETAILS_FALSE} name="FluxBB_details"/>{'Details_false'|@translate}<br/>
      <br/>
      </li>
      <li><label>{'Confirm'|@translate}</label><br/>
        <input type="radio" value="true" {$FluxBB_CONFIRM_TRUE} name="FluxBB_confirm"/>{'Confirm_true'|@translate}<br/>
        <input type="radio" value="false" {$FluxBB_CONFIRM_FALSE} name="FluxBB_confirm"/>{'Confirm_false'|@translate}<br/>
      <br/>
      </li>
    </ul>
    </fieldset>
  </fieldset>

  <p>
    <input class="submit" type="submit" value="{'Submit'|@translate}" name="submit" {$TAG_INPUT_ENABLED}/>
  </p>

  </div>
</div>
</form>


<form method="post" action="" class="general">
<div id="instructionMigrate" class="instructionBlock" >

  <div id="migrate_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('migrate_header', 'Migrate')">
    <span class="cluetip" title="{'Mig_Title'|translate}|{'Mig_Title_d'|translate}">
      {'Mig_Title'|@translate}
    </span>
  </div>

  <div id="Migrate" class="instructionBlockContent" style="display:none">
  <fieldset>
  	{'Mig_Text'|@translate}
    <br/>
  	<p>
      <input class="submit" type="submit" value="{'Audit_Btn'|@translate}" name="Audit"/>&nbsp;
      <input onclick="return confirm('{'Are you sure?'|@translate}');" class="submit" type="submit" value="{'Mig_Btn'|@translate}" name="Migration" {$TAG_INPUT_ENABLED}/>
      <input name="nb_para" id="nb_para" type="text" value="{$nb_para}" style="display:none"/>
      <input name="nb_para2" id="nb_para2" type="text" value="{$nb_para2}" style="display:none"/>
    </p>
  </fieldset>
  </div>
</div>
</form>


<form method="post" action="" class="general">
<div id="instructionSynch" class="instructionBlock" >
  <div id="synch_header" class="instructionBlockHeaderCollapsed" onclick="rfbb_blockToggleDisplay('synch_header', 'Synch')">
    <span class="cluetip" title="{'Sync_Title'|translate}|{'Sync_Title_d'|translate}">
      {'Sync_Title'|@translate}
    </span>
  </div>

  <div id="Synch" class="instructionBlockContent" style="display:none">
  <fieldset>
  	{'Sync_Text'|@translate}
    <br/>
  	<p>
      <input class="submit" type="submit" value="{'Audit_Btn'|@translate}" name="Audit"/>&nbsp;
      <input onclick="return confirm('{'Are you sure?'|@translate}');" class="submit" type="submit" value="{'Sync_Btn'|@translate}" name="Synchro" {$TAG_INPUT_ENABLED}/>
      <input name="nb_para" id="nb_para" type="text" value="{$nb_para}" style="display:none"/>
      <input name="nb_para2" id="nb_para2" type="text" value="{$nb_para2}" style="display:none"/>
    </p>
  </fieldset>
  </div>
</div>
</form>


{footer_script}{literal}
  var n1=document.getElementById("nb_para").value;
  var n2=document.getElementById("nb_para2").value;
   rfbb_blockToggleDisplay(n1,n2);
{/literal}{/footer_script}