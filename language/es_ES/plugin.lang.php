<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2012 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['About_Bridge'] = 'Acerca de Register_FluxBB/UAMbridge';
$lang['About_Reg'] = 'Acerca de los registros de usuarios en el foro de FluxBB';
$lang['Add_User'] = 'Añadiendo cuenta de FluxBB';
$lang['Admin'] = 'Nombre de usuario del administrador de Piwigo  <b style="color: red">El nombre de usuario del administrador de FluxBB\'s debe ser el mismo que el de Piwigo</b>';
$lang['Advise_Check_Dup'] = '<b>Imposible seguir con la sincronización si tienes duplicados en la cuenta de usuario de Piwigo o FluxBB</b><br><br>';
$lang['Advise_FluxBB_Dup'] = '<b>¡PELIGRO! Debes hacer estas correciones en FluxBB antes de continuar<br>,usa los iconos para borrar usuarios de FluxBB y solucionar el problema.</b>';
$lang['Advise_PWG_Dup'] = '<b>¡PELIGRO! Debes hacer estas correciones en FluxBB antes de continuar<br>usa el administrador de  usuarios de FluxBB para resolver el problema';
$lang['Sync_Link_Bad'] = '<b>Análisis de los vínculos malos entre las cuentas Piwigo y FluxBB </b>';
$lang['Sync_Link_Break'] = '<b>Análisis de los enlaces reparables entre Piwigo y FluxBB</b>';
$lang['Sync_OK'] = 'Sincronizacon OK<br><br>';
$lang['Sync_PWG2FluxBB'] = '<b>Análisis de las cuentas existente en Piwigo y faltante en FluxBB </b>';
$lang['Sync_Title'] = 'Sincronización de las cuentas Piwigo a FluxBB';
$lang['Sync_User'] = 'Sincronización de la cuenta';
$lang['Tab_Info'] = 'Instrucciones';
$lang['Tab_Manage'] = 'Etapa 1 : Configuración del plugin';
$lang['Tab_Migration'] = 'Etapa 2 : Migración de las cuentas';
$lang['Tab_Synchro'] = 'Mantenimiento : Resincronizacion de las cuentas';
$lang['Title'] = 'Register FluxBB';
$lang['Title_Tab'] = 'Register_FluxBB - Versión: ';
$lang['error_config_admin1'] = 'ERROR: El nombre de la cuenta de administrador Piwigo es incorrecto!';
$lang['error_config_admin2'] = 'ERROR: El nombre de la cuenta de administrador de FluxBB es diferente del de Piwigo! Compruebe la configuración de su nombre en el foro FluxBB y renombrar la cuenta de administrador igual que la de Piwigo.';
$lang['error_config_guest'] = 'ERROR: El nombre de la cuenta de invitado (guest) de FluxBB es incorrecto!';
$lang['save_config'] = 'Configuración guardada.';
$lang['UAM_Bridge_advice'] = 'El plugin de UserAdvManager permite forzar nuevos participantes para validar su registro antes de permitirles acceder a la galería completa.El uso combinado con este plugin y Register_FluxBB permite hacer lo mismo en el foro relacionado: no pueden publicar hasta que no han validado su registro a la galería de <br>.
Aquí está el procedimiento general para aplicar:
<br>
- En la administración de su foro FluxBB, establecer por lo menos dos grupos de usuarios (por ejemplo, "validado" y "non_validados"). <br>
- Asigne el primer grupo ("validado") los permisos que desee en su foro y grupo como el grupo predeterminado <br>
- Retire al segundo grupo ("non_validados") todos los permisos en su foro (miembros de este grupo sólo pueden leer los mensajes públicos) <br>.
- Localizar el Id del segundo grupo "non_validados". <br>
- Tenga en cuenta la ID en el plugin Register_FluxBB, activar el puente y guardar la configuración.
<br>
<br><br>
<b class="mod"><u>Notas importantes:</u></b>
<br><br>
Si usted ya está usando una versión anterior Register_FluxBB en las cuentas vinculadas a su galería Piwigo y su foro FluxBB no se verá afectada por los efectos del puente. Sólo los nuevos inscritos después de la activación del puente estarán sometido a eso. <b> <u> La fonccion de resincronización función no tendrá ningún efecto. </ u> </b> <br>
Del mismo modo, si usted nunca ha utilizado Register_FluxBB la fase de migración de sus cuentas a su galería Piwigo FluxBB foro no tendrá en cuenta el estado de la validación o no de los inscritos en el lanzamiento de la fase de migración.';
$lang['Sync_Text'] = '<div class="warning"> Ha utilizado el plugin para vincular su Piwigo (plugin actualizado) y / o su foro FluxBB no esta libre de  usuarios !!! </ div> <br>
<br> -> Esto significa que el foro tiene usuarios <br><br>
-La Sincronización detectara estos datos mediante la comparación de los nombres de los usuarios, sus contraseñas (encristaladas) y su dirección de correo electrónico en ambas tablas [PrefixPWG] y [_users PrefixFluxBB] _users <br>
- A continuación, se actualizará la tabla de corespondencia y la contraseña y dirección de correo electrónico para cada cuenta desde Piwigo a FluxBB excepto Piwigo Guest y FluxBB Anonymous<br>.
- Por último indicará error en las cuentas huérfanas que sólo existen en una de las dos tablas _USERS # # # <br>.
<br>
Al final de esta operación lanzar una auditoria y verificar la presencia de duplicados en los usuarios de FluxBB, si así es el caso, tiene que eliminar los mas antiguos (clasificación de los usuarios de FluxBB siguiendo su fecha de inscripción).<br>';
$lang['Link_Del'] = 'Quitar el enlace:';
$lang['Link_Dup'] = 'Eliminación de enlaces duplicados';
$lang['Mig_Add_AllUsers'] = '<b>Transferencia de las cuentas de Piwigo </b>';
$lang['Mig_Add_User'] = '<b>Transferencia de la cuenta :</b>';
$lang['Mig_Btn'] = 'Migracione';
$lang['Mig_Del_AllUsers'] = '<b>Eliminar cuentas FuxBB </b>';
$lang['Mig_Del_Link'] = '<b>Quitar los vínculos entre las cuentas Piwigo y FluxBB </b>';
$lang['Mig_Del_User'] = '<b>Eliminar cuenta </b>';
$lang['Mig_Disclaimer'] = '<div class="warning"> NUNCA HACER UNA MIGRACIÓN PARA ACTUALIZAR !!!</div>';
$lang['Mig_End'] = '<b>Migración terminada </b>';
$lang['Mig_Start'] = '<b>Migración de las cuentas Piwigo hacia FluxBB </b>';
$lang['Mig_Title'] = 'Migracion de las cuentas Piwigo hacia FluxBB';
$lang['New_Link'] = 'Enlace de la cuenta:';
$lang['Prefix'] = 'Prefijo de las tablas de FluxBB';
$lang['Sync_Btn'] = 'Sincronizacion';
$lang['Sync_Check_Dup'] = '<b> Análisis de las cuentas existente en Piwigo y faltante en FluxBB </b>';
$lang['Sync_DataUser'] = '<b>Análisis de contraseñas y direcciones de correo entre las cuentas de Piwigo y FluxBB </b>';
$lang['Sync_FluxBB2PWG'] = '<b>Análisis de las cuentas existente en Piwigo y faltante en FluxBB </b>';
$lang['No_Reg_advise'] = '   Para una mejor integración, es recomendable hacer los siguientes cambios en su foro FluxBB (<b> Advertencia Estos cambios desaparecen al actualizar foro </b>)
</b></b>
<b> * Modificar en el interfaz administración de FluxBB la opción  "Permitir nuevos registros" en NO (en: Opciones - Inscripciones) </b>
<br><br>
<b> * Modificar el archivo </ b>: [RacineDeFluxBB] / lang / French / register.php mediante la sustitución de la siguiente línea :
  <div class="mod">\'No new regs\'				=>	\'Este foro no acepta nuevos usuarios.\'</div>
  <b>par :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[SuraizDePiwigo]/register.php&quot; &gt; Hacer clic aqui para registrarse&lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
Y hacer este cambio para todos los idiomas soportados en el foro.
<br><br>
  <b>* Modificar el fichero</b> : [RaizDeFluxBB]/login.php mediante la sustitución de la línea 69:
  <div class="mod">mensaje($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>por :</b>
  <div class="info">mensaje($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[SuRaizDePiwigo]/password.php&quot;&gt;</div>
<br>
 à la ligne 216:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <b>por :</b>
 <div class="info">&lt;a href=&quot;../[SuRaizDePiwigo]/password.php&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <br>';
$lang['Mig_Text'] = ' <div class="warning">Utilizar sólo si usted nunca ha utilizado el plugin para enlazar Piwigo a FluxBB <u>y si</u> su foro no tiene ningun usuario !!!</div><br>
  		--> En este caso, la tabla [PrefixFluxBB] _users FluxBB debe estar vacía de todas las cuentas excepto las 2 cuentas de invitado y administrador.
<br><br>
- La migración eliminará en primer lugar los vínculos entre las cuentas Piwigo y FluxBB <br>.
-. Y en segundo lugar <b>eliminara todas las cuentas  FluxBB </b>, excepto las dos cuentas de invitado y administrador de <br>
<br>
  <div class="warning">ATENCIÓN SI TIENE CUENTAS ESPECIALES EN FluxBB == SOBRE TODO NO UTILICE ESTA FUNCIÓN!</div><br>
- Por último, la migración va a crear todas las cuentas Piwigo  en  FluxBB excepto las cuentas invitado <br>.
<br>
Si se producen errores durante la operación, corrija el problema y vuelva a intentar la operación de migración (en ese momento sólo se puede renovar la migración). <br>';
$lang['Del_Pt_true'] = ' --&gt; Eliminar todo';
$lang['Del_User'] = 'Eliminar FluxBB de la cuenta';
$lang['Details'] = 'El nivel de detalle en los informes de las operaciones.';
$lang['Details_false'] = ' --&gt; Sólo muestra los principales resultados de las operaciones';
$lang['Details_true'] = ' --&gt; Mostrar todos los resultados en los detalles de las operaciones.';
$lang['Disclaimer'] = '*** Para empezar, 2 pasos ***<br>
   Paso 1:. Configure las opciones del plugin con FluxBB <br>
   Paso 2: Migración de cuentas de usuario desde Piwigo a FluxBB. <br><br>
Al cabo de estos dos pasos principales, el plugin es totalmente funcional y no tendrá que volver a esta página.<br><br>
***Para mantener los enlaces ya activos***<br>
Mantenimiento: Sincronizar tablas (si es una adición, actualización o eliminación de usuarios que salió mal) permite actualizar las contraseñas y direcciones de correo electrónico y detectar los usuarios  intrusos (pero usted no debería tener que usarlo).<br><br>
  <div class="warning">Haga una copia de seguridad de la base de datos y especialmente de las tablas # # # _USERS antes de cualquier acción por seguridad.</div>
<br><br>
  <div class="warning">A saver :<br>
De forma predeterminada, <b> FluxBB </b> es insensible <u>a mayúscula y minúscula</ u> en el caso de los nombres de usuario. Esto significa que si un usuario "test" ya está registrado, otras inscripciones, por ejemplo, "Test" o "TEST" o "test" (etc. ..) serán rechazadas.<br><br>
De forma predeterminada, <b>Piwigo</b> funciona a la inversa, y es por lo tanto <u>sensible</u>a mayúscula y minúscula en el caso de los inicios de sesión ("test" será un usuario diferente "Test", etc ...). <br><br>
Para evitar errores (incluso si el comportamiento de Piwigo  puede ser cambiado fácilmente - ver las opciones de configuración), Register_FluxBB unirá las dos aplicaciones como FluxBB: Sera <u> insensible </u> a mayúscula y minúscula en inicios de sesión. <br><br> </div>';
$lang['Error_FluxBB2PWG'] = '<b>La cuenta FluxBB no existe en Piwigo: </b>';
$lang['Error_FluxBB_Dup'] = '<b>Error en la tabla de cuentas FluxBB hay duplicados: </b>';
$lang['Error_Link_Break'] = '<b>Vínculo roto entre cuentas Piwigo y FluxBB : </b>';
$lang['Error_Link_Dead'] = '<b>error en la mesa de enlace, enlaces muertos existen: </b>';
$lang['Error_Link_Del'] = '<b>Error en la tabla de enlace entre dos usuarios: </b>';
$lang['Error_Link_Dup'] = '<b>Error en la tabla de enlaces, hay duplicados: </b>';
$lang['Error_PWG2FluxBB'] = '<b>La cuenta Piwigo no existe en FluxBB: </b>';
$lang['Error_PWG_Dup'] = '<b>Error en la tabla de cuentas Piwigo hay duplicados: </b>';
$lang['Error_Synchro'] = '<b>Mala sincronización de la cuenta: </b>';
$lang['Error_Synchro_Mail'] = 'para la dirección de correo electronico';
$lang['Error_Synchro_Pswd'] = 'para la contraseña';
$lang['FluxBB_Group'] = 'Especifique aquí el ID de <b>grupo  FluxBB></b> en la que los usuarios novalidados deben encontrarse (a crear por adelantado en FluxBB). Para ser eficaz, este grupo no debe tener ningún permiso para el foro (ver al final de esta página para obtener más información sobre el uso de esta opción).';
$lang['Guest'] = 'Nombre de usuario del invitado FluxBB .';
$lang['Link_Dead'] = 'Eliminación de los enlaces muertos';
$lang['Audit_Btn'] = 'Auditoria';
$lang['Audit_FluxBB2PWG'] = '<b>Auditoria de cuentas existentes en FluxBB y faltante en Piwigo.</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Auditoria de la tabla de cuentas FluxBB </b>';
$lang['Audit_Link_Bad'] = '<b>Auditoria de falsos enlaces entre las cuentas Piwigo y  FluxBB </b>';
$lang['Audit_Link_Break'] = '<b>Auditoria de enlaces reparables entre las cuentas Piwigo y  FluxBB  </b>';
$lang['Audit_OK'] = 'Auditoria OK<br><br>';
$lang['Audit_PWG2FluxBB'] = '<b>Auditoria de cuentas existentes en FluxBB y faltante en Piwigo.</b>';
$lang['Audit_PWG_Dup'] = '<b>Auditoria de la tabla de cuentas de Piwigo</b>';
$lang['Audit_Synchro'] = '<b>Auditoria de la sincronisación de contraseñas y direcciones de correo entre Piwigo y FluxBB</b>';
$lang['Audit_Synchro_OK'] = '<b>: Sincronisacion de los datos </b>';
$lang['Bridge_UAM'] = 'Validación de acceso al foro a través del plugin UserAdvManager  (UAM): Active el puente aquí entre los dos plugins que le permiten restringir el acceso a su foro FluxBB hasta que el usuario no haya validado su inclusión en la galería (la función debe ser activada sobre UAM).';
$lang['Bridge_UAM_false'] = ' --> Pont Register_FluxBB / UAM desactivado (por defecto)';
$lang['Bridge_UAM_true'] = ' --> Pont Register_FluxBB / UAM activado';
$lang['Config_Disclaimer'] = 'Compruebe la configuración de su instalación FluxBB y corregir si es necesario. <br>
   Cambiar si es necesario, el comportamiento del plugin a su gusto.';
$lang['Config_Title'] = 'Configurar el plugin';
$lang['Confirm'] = 'Supresión de confirmación en las actuaciones administrativas en la auditoría.';
$lang['Confirm_false'] = ' --&gt; Confirmación requerida antes de la acción en la auditoría';
$lang['Confirm_true'] = ' --&gt; Elimina las confirmaciones';
$lang['Del_Pt'] = '
Eliminación de mensajes y temas del usuario cuando se elimina.';
$lang['Del_Pt_false'] = ' --&gt; No elimine los mensajes y temas';
$lang['About_Bridge_Title'] = 'Acerca Register_FluxBB / puente UAM ';
$lang['About_Bridge_Title_d'] = 'Instrucción sobre puente entre Register_FluxBB y el plugins UserAdvManager';
$lang['About_Reg_Title'] = 'Acerca del registro de usuarios en Foro FluxBB';
$lang['About_Reg_Title_d'] = 'Instrucciones útiles para una mejor integración';
$lang['Config_Title1'] = 'Configuración de puente entre FluxBB y Piwigo';
$lang['Config_Title2'] = 'Configuraciones avanzadas del plugin';
$lang['Config_Title_d'] = 'Configuración del plugin';
$lang['Instruction_Title'] = 'Instrucciones (importante leer primero!)';
$lang['Instruction_Title_d'] = 'Instrucciones e información importante';
$lang['Mig_Title_d'] = 'UTILIZAR SOLO si usted nunca ha utilizado el plugin antes';
$lang['Sync_Title_d'] = 'Utilizar para sincronizar las cuentas';
$lang['Add_User2pwg'] = 'Agregar una cuenta en Piwigo:';
$lang['Please change your password at your first connexion on the gallery'] = 'Por favor, cambie su contraseña en su primera conexión a la galería para terminar la sincronización de datos';
$lang['RegFluxBB_Email_or_Username_already_exist'] = 'Sincronización de FluxBB a Piwigo detenido: Email de destino o nombre de usuario ya existe en la tabla de usuarios Piwigo.';
$lang['RegFluxBB_Password_Reset_Msg'] = 'Por favor, actualice la contraseña para la sincronización con el foro. Entonces usted será capaz de iniciar sesión en el foro con la misma cuenta que la galería.';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = 'Para sincronizar el acceso del foro con la galería, que ha sido registrado en %s!';
$lang['%d email addresses already exist: %s'] = '%d direcciones de correo electrónico que ya existe:%s';
$lang['%d email addresses rejected: %s'] = '%d direcciones de correo electrónico rechazadas:%s';
$lang['%d registrations on error: %s'] = '%d registros de errores:%s';
$lang['%d users registered'] = '%d usuarios registrados';
$lang['FluxBB_Admin'] = 'Nombre de usuario de la cuenta de "Webmaster" de Piwigo. <b style="color: red">Usuario de la cuenta del FluxBB "Administrador" debe coincidir!</b>';
$lang['FluxBB_Title'] = 'Versión de Register_FluxBB';
?>