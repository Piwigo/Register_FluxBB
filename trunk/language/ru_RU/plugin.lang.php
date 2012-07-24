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
$lang['Config_Disclaimer'] = 'Проверьте настройки FluxBB и исправьте их, если это необходимо. <br>
Подстройте поведение плагина чтобы было удобно.';
$lang['Config_Title'] = 'Установка плагина';
$lang['Del_Pt_false'] = ' --&gt; Не удалять темы и сообщения';
$lang['Del_Pt_true'] = ' --&gt; Удалить все';
$lang['Error_Synchro_Mail'] = 'в email';
$lang['Error_Synchro_Pswd'] = 'в пароле';
$lang['Error_Synchro'] = '<b>Ошибка синхронизации учетной записи:</b> ';
$lang['Guest'] = 'Имя пользователя для гостевого входа.';
$lang['Mig_Btn'] = 'Перенос';
$lang['Mig_End'] = '<b>Перенос выполнен!</b>';
$lang['Mig_Start'] = '<b>Перенос учетных записей из Piwigo в FluxBB</b>';
$lang['Mig_Title'] = 'Перенос учетных записей из Piwigo в FluxBB';
$lang['Prefix'] = 'Префикс таблиц FluxBB:';
$lang['Sync_Btn'] = 'Синхронизация';
$lang['Sync_OK'] = 'Синхронизация успешно завершена<br><br>';
$lang['Sync_User'] = 'Синхронизация учетных записей:';
$lang['Tab_Info'] = 'Инструкции';
$lang['Tab_Manage'] = 'Шаг 1: Настройка плагина';
$lang['Tab_Migration'] = 'Шаг 2: Перенос учетных записей';
$lang['Tab_Synchro'] = 'Обслуживание: синхронизация учетных записей';
$lang['Title'] = 'Регистрация FluxBB';
$lang['save_config'] = 'Настройки сохранены';
$lang['About_Reg'] = 'О регистрации пользователей на форуме FluxBB';
$lang['Admin'] = 'Имя администратора Piwigo. <b style="color: red">Имя учетной записи администратора  FluxBB должно быть одинаковым!</b>';
$lang['Advise_Check_Dup'] = '<b>Невозможно продолжить синхронизацию, пока есть совпадающие имена учетных записей Piwigo и FluxBB.</b><br><br>';
$lang['Advise_FluxBB_Dup'] = '<b>ВНИМАНИЕ!  Прежде чем продолжить, вы должны внести эти исправления<br>используйте пиктограммы, чтобы удалить пользователей из FluxBB и разрешить проблему.</b>';
$lang['Advise_PWG_Dup'] = '<b> ВНИМАНИЕ!  Прежде чем продолжить, вы должны внести эти исправления <br>используйте менеджер пользователей Piwigo для разрешения проблемы.</b>';
$lang['Audit_Btn'] = 'Проверка';
$lang['Audit_FluxBB2PWG'] = '<b>Проверка существующих учетных записей в FluxBB и отсутвующих в Piwigo</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Проверка таблицы учетных записей FluxBB</b>';
$lang['Audit_Link_Bad'] = '<b>Проверка битых ссылок между учетными записями в Piwigo и FluxBB</b>';
$lang['Audit_Link_Break'] = '<b>Проверка доступных к восстановлению ссылок между учетными записями в Piwigo и FluxBB</b>';
$lang['Audit_OK'] = 'Проверка прошла успешно<br><br>';
$lang['Audit_PWG2FluxBB'] = '<b>Проверка существующих учетных записей в FluxBB и отсутвующих в Piwigo</b>';
$lang['Audit_PWG_Dup'] = '<b>Проверка таблицы учетных записей FluxBB</b>';
$lang['Audit_Synchro_OK'] = ' <b>: Синхронизация данных прошла успешна</b>';
$lang['Confirm_true'] = '--&gt; Удалить подтвеждение';
$lang['Confirm'] = 'Удалить подтвеждение на административные действия в проверках.';
$lang['Del_Pt'] = 'Удаление тем и постов после удаления пользователя.';
$lang['Disclaimer'] = ' *** Чтобы начать использование, следуйте этим двум шагам ***<br>
Шаг 1: Установите плагин с параметрами FluxBB.<br>
Шаг 2: Перенесите учетные записи пользователей из Piwigo в FluxBB.<br><br>
После этих основных шагов плагин будет польностью рабочий и вам не придется возвращаться к этим страницам.<br><br>
 *** Для обслуживания уже открытых соединений ***<br>
Обслуживание: Синхронизация таблиц (в случае несоответсвий  при обновлении, дополнении или удалении пользователя) позволяет обновлять пароли и адреса электронной почты пользователей. (Но у вас не должно возникать необходимости использовать это).
<br><br>
  <div class="warning">Внимание !! Для вашей безопасности не забывате делать резервные копии базы данных, особенно таблиц ###_user перед любым действием.</div>
<br><br>
  <div class="warning">Необходимо знать:<br>
  По умолчанию <b>FluxBB</b> <u>нечувствителен</u> к регистру имен пользователей. Так что, если пользователем с именем "test" уже зарегестрировался, другие попытки регистраций вроде "Test", или "TEST", или "TEst", будут отвергнуты.<br><br>
  По умолчанию <b>Piwigo</b>, наоборот, <u>чувствителен</u> к именам ("test", "Test", "TEST", и т.д. - это разные пользователи).<br>
  Чтобы избежать проблем (хотя поведение Piwigo лекго изменить - См. опции), Register_FluxBB будет связывать эти два приложения в стиле FluxBB: Будучи <u>нечувствительным</u> к регистру имен пользователей.<br><br></div>';
$lang['Error_FluxBB2PWG'] = '<b>Аккаунт FluxBB не зарегестированный в Piwigo:</b> ';
$lang['Error_FluxBB_Dup'] = '<b>Ошибка в таблице аккаунтов FluxBB - найдены дубликаты:</b> ';
$lang['Error_Link_Break'] = '<b>Нерабочая связь между аккаунтами Piwigo и FluxBB:</b> ';
$lang['Error_Link_Dead'] = '<b>Ошибка в таблице связей - мертвые связки:</b> ';
$lang['Error_Link_Dup'] = '<b>Ошибка в таблице связей - найдены дубликаты:</b> ';
$lang['Error_PWG2FluxBB'] = '<b>Аккаунт Piwigo не зарегестированный во FluxBB:</b> ';
$lang['Error_PWG_Dup'] = '<b>Ошибка в таблице аккаунтов Piwigo - найдены дубликаты:</b> ';
?>