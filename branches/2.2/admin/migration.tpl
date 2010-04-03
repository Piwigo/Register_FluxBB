<div class="titrePage">
  <ul class="categoryActions">

  </ul>
  <h2>{'Tab_Migration'|@translate}</h2>
</div>

<br>

<form method="post" action="">
  <fieldset>
  	<legend>{'Register_FluxBB_Mig_Title'|@translate}</legend>
  	<div align="left">{'Register_FluxBB_Mig_Text'|@translate}</div>
    <br>
  	<div align="center"><input onclick="return confirm('{'Are you sure?'|@translate}');" class="submit" type="submit" value="{'Register_FluxBB_Mig_Btn'|@translate}" name="Migration" {$TAG_INPUT_ENABLED}></div>
    <br>
  	<div align="center">{'Register_FluxBB_Mig_Disclaimer'|@translate}</div>
  </fieldset>
</form>