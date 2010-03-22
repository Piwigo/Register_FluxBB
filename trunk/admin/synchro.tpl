<div class="titrePage">
  <ul class="categoryActions">

  </ul>
  <h2>{'Tab_Synchro'|@translate}</h2>
</div>

<br>

<form method="post" action="">
  <fieldset>
  	<legend>{'Register_FluxBB_Sync_Title'|@translate}</legend>
  	<div align="left">{'Register_FluxBB_Sync_Text'|@translate}</div>
    <br>
  	<p><input {$FluxBB_CONFIRM_ENABLE} class="submit" type="submit" value="{'Register_FluxBB_Audit_Btn'|@translate}" name="Audit"> <input onclick="return confirm('{'Are you sure?'|@translate}');" {$FluxBB_CONFIRM_ENABLE} class="submit" type="submit" value="{'Register_FluxBB_Sync_Btn'|@translate}" name="Synchro" {$TAG_INPUT_ENABLED}></p>
  </fieldset>
</form>