<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
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
$lang['UAM_Bridge_advice'] = '在允许用户进入到整个画廊前，UserAdvManager插件允许强迫新的注册登记。与此Register_FluxBB插件一起使用，可以在相关论坛做同样的事情：新的注册必须要验证画廊的注册登记后，才能发布消息。 <br/>

这里是申请的一般程序：
<br/>
-在FluxBB论坛的管理面板，设置有至少两个用户组（例如：“validated”和“no_validated”).<br/>
给第一组（“validated”）你想给与的访问权限，并将它设置为默认组。
<br/>
删除第二组（“no_validated”）在你的论坛里的所有权限（本组成员只能阅读公共消息）。<br/> 
-找出第二组“no_validated”的ID。<br/>
-在Register_FluxBB插件里写上该ID，激活桥并保存设置。
<br/> 
<b class="mod"><u>重要提示:</u></b>
<br/>
如果你已经使用了一个Register_FluxBB早期版本，已连接到FluxBB论坛的Piwigo账户不受桥的影响。只有新的注册登记在激活该桥时会受到影响。<b><u>账户再次同步功能将无效。</u></b><br/>
同样，如果你从来没有使用过Register_FluxBB，在开始从画廊到FluxBB论坛的账户迁移的过程不会理会Piwigo的状态验证与否';
$lang['Sync_User'] = '账户同步';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = '用你画廊的登录方法同步到论坛，你已在%s注册';
$lang['Sync_Title_d'] = '使用账户再同步';
$lang['Sync_Title'] = '从Piwigo到FluxBB的同步';
$lang['error_config_admin1'] = '错误：Piwigo管理员用户名不对';
$lang['error_config_admin2'] = '错误：FluxBB管理员用户名和piwigo不同！检查你的FluxBB论坛的配置，参照Piwigo同样的方法，重新命名“管理员”帐户的用户名';
$lang['error_config_guest'] = '错误：FluxBB访客账户用户名是错误的！';
$lang['save_config'] = '设置已保存';
$lang['Sync_FluxBB2PWG'] = '<b>分析FluxBB账户，但Piwigo里有遗漏的现有帐户</b>';
$lang['Sync_PWG2FluxBB'] = '<b>分析Piwigo，但FluxBB里有遗漏的现有帐户</b>';
$lang['Sync_OK'] = '同步正常<br/><br/>';
$lang['Sync_Link_Break'] = '<b>在Piwigo 和 FluxBB账户间可修复链接的分析</b>';
$lang['Sync_Link_Bad'] = '<b>Piwigo 和 FluxBB账户之间已坏掉的关系分析</b>';
$lang['Sync_DataUser'] = '<b>Piwigo 和 FluxBB账户间密码和电子邮件地址分析</b>  ';
$lang['Sync_Check_Dup'] = '<b>重复控制所需的用户表格分析</b>  ';
$lang['Sync_Btn'] = '同步';
$lang['RegFluxBB_Password_Reset_Msg'] = '请更新您的密码与论坛同步。然后你就可以用同一个画廊账户登录到论坛。';
$lang['RegFluxBB_Email_or_Username_already_exist'] = '从FluxBB到Piwigo同步已停止：在Piwigo用户表里，目标邮箱或者用户名已存在。';
$lang['Prefix'] = 'FluxBB前缀表：';
$lang['Please change your password at your first connexion on the gallery'] = '您第一次连接到画廊时，请更改您的密码以便结束数据同步';
$lang['Sync_Text'] = '<div class="warning">同步操作是一个大规模的行动，它会耗尽你的论坛用户！必须先做个案审核。</div><br/><br/>

提醒：<br/>
从Piwigod到FluxBB，手动同步账户的密码（通过审核或整体同步）不可恢复。为使同步有效和能连接到论坛，每个用户应当在下一次登录到画廊时更改自己的密码（他将被自动重定向到他的个人资料页）。
<br/><br/> 
到目前为止还不能实现把FluxBB论坛的现有用户同步到Piwigo画廊。这就是为什么所需该审核会删除FluxBB账户。你可以保留这些非同步状态的账户（他们将只能够连接到论坛），等待下一个插件做这样的同步。<br/><br/>';
$lang['No_Reg_advise'] = '为更好的整合，我们建议你是对你的FluxBB论坛做如下修改（<b>警告：更新论坛脚本时，这些

变化将消失</b>）：
<br/><br/>
<b> *在FluxBB管理面板，改变“允许新的注册“ 至NO（见：选项-注册）</b>
<br/><br/>
<b> *修改文件</b>：[FluxBBRoot]/lang/English/register.php,替换下面的行：
<div class=“mod”>“No new regs”=>\'this forum is not accepting new users.\'</div>
<b>with :</b>
<div class=“info”>“No new regs”=>\'&lt;a href=&quot；http://

[YourPiwigoRoot]/register.php&quot;&gt;Go here to register
&lt;/a&gt;&gt;&gt;&lt;br/&gt;\'</div>
<br/>
当然，其他语言版本的FluxBB论坛，同样你也应该做同样的改变。
<br/><br/>
<b> *修改文件</b>：[FluxBBRoot]/login.php 64行替代：
<div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
<b>with :</b>
<div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot;&gt;</div>
<br/>
还有295行：
<div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <b>with :</b>
  <div class="info">&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\'] ?&gt;&lt;/a&gt;</div>
<br/><br/>
  <b>* Modify the file</b> : [FluxBBRoot]/index.php <b>after</b> ligne 18 :
  <div class="mod">
// Load the index.php language file<br/>
require PUN_ROOT.\'lang/\'.$pun_user[\'language\'].\'/index.php\';
  </div>
  <b>Insert :</b>
  <div class="info">
// Mod to regenerate user cache on each load<br/>
&nbsp;if (!defined(\'FORUM_CACHE_FUNCTIONS_LOADED\'))<br/>
&nbsp;&nbsp;&nbsp;require PUN_ROOT.\'include/cache.php\';
<br/><br/>
&nbsp;&nbsp;&nbsp;generate_users_info_cache();<br/>
// ------------------------------------------<br/>
  </div>
<br/>';
$lang['New_Link'] = '关联账户';
$lang['Link_Dup'] = '去除重复';
$lang['Link_Del'] = '删除链接';
$lang['Link_Dead'] = '删除死链接';
$lang['Instruction_Title_d'] = '指令和重要信息';
$lang['Instruction_Title'] = '指令（先读！重要）';
$lang['Guest'] = 'FluxBB 访客用户名';
$lang['FluxBB_Title'] = 'Register_FluxBB - 版本:';
$lang['FluxBB_Group'] = '在这里，您指定ID（格式：整数）<b>FluxBB用户群的</b>，如果用户还没有验证登记到画廊，那么这些未经验证的用户就必须指定ID。在FluxBBli1,必须首先创建这个用户组。要使它有效，这个创建的组不应该在论坛里有任何权限（参见章节“指令”的详细信息）';
$lang['FluxBB_Admin'] = 'Piwigo的“站长”帐户的用户名。<b style="颜色：红色"> FluxBB“管理员”帐户必须匹配！</b>';
$lang['Error_Synchro_Pswd'] = '该用户必须在下次登录画廊时修改密码';
$lang['Error_Synchro_Mail'] = '电子邮箱';
$lang['Error_Synchro'] = '<b>账户同步没弄好:</b> ';
$lang['Error_PWG_Dup'] = '<b>Piwigo账户表错误，有重复：</b>';
$lang['Error_PWG2FluxBB'] = '<b>Piwigo账户不在FluxBB里:</b> ';
$lang['Error_Link_Dup'] = '<b>链接表错误，有重复：</b>';
$lang['Error_Link_Del'] = '<b>两用户间链接表错误：</b>';
$lang['Error_Link_Dead'] = '<b>错误链接表，死链接：</b>';
$lang['Error_Link_Break'] = '<b>Piwigo和FluxBB账户之间断链：</b>';
$lang['Error_FluxBB_Dup'] = '<br>FluxBB账户表格有错误，有重复：</b>';
$lang['Disclaimer'] = '＜div class=“警告”>重要：FluxBB和piwigo必须安装在同一数据库里！为安全计，在做任何操作之前，一定要做一个数据库的备份，尤其是 ###_user表。</div><br/><br/>
***开始，跟随这两步*** <br />
步骤1 - 配置：有关FluxBB插件参数的配置<br/>
步骤2 -同步：
- 如果你的FluxBB论坛<b>没有</b>任何用户，那么就从Piwigo同步所有用户帐户至FluxBB <br/>
- 如果你的FluxBB论坛<b>有</b>用户，就审核一下。做FluxBB和Piwigo用户数据之间是否一致性的测试。基于这些结果，提出每种情况的修正结果<br/><br/>

＜div class=“警告”>到目前为止还不能同步现有FluxBB论坛用户到Piwigo画廊。这就是为什么审核操作会删除FluxBB账户。你可以保留这些账户设置为非同步状态的账户，等待日后能做同步的插件来做这个同步操作（而目前，他们将只能够连接到论坛）

。</DIV>
<br/><br/>

注：从FluxBB到Piwigo做手动同步帐户的密码（通过审核或整体同步）是不能恢复的。每个用户应当在下一次登录时更改自己的画廊密码（他将被自动重新定向到他的个人资料页），这样，同步才会有效的，他就能登录论坛。<br/><br/>


＜div class=“警告”>须知：<br/>
默认情况下，<b> FluxBB </b>大小写<U>是不分的</u>用户名。就是说，如果一个用户称为“test”已被注册，其他任何“Test”或“TEST”或“TEst”（等）都将被拒绝。<br/><br/>

默认情况下，<b> Piwigo </b>是反向工作的，因此它是大小写<u>敏感的</u>用户名（“test”对于用户“Test”或“TEST”等..., 将是另一个不同的用户）。<br/>
为了避免出现问题（即使Piwigo的行为可以很容易改变-请查看配置选项），还是使用FluxBB，用Register_FluxBB来连接这两个应用：大小写<u>不敏感</u>用户名。<br/><br/></div>';
$lang['Error_FluxBB2PWG'] = '<b>该FluxBB账户不在Piwigo内：</b>';
$lang['Details_true'] = '最大水平-显示所有同步和迁移操作的详细结果';
$lang['Details_false'] = '最低水平-仅显示同步和迁移操作主要结果的细节';
$lang['Details'] = '操作报告显示的细节水平（同步和迁移）';
$lang['Del_User'] = '删除FluxBB账户';
$lang['Del_Pt_true'] = '全部删除';
$lang['Del_Pt_false'] = '不要删除论坛主题和发布的帖子';
$lang['Del_Pt'] = '从Piwigo删除用户的同时，也删除了论坛用户的主题和消息';
$lang['Confirm_true'] = '不要确认';
$lang['Confirm_false'] = '在对审核采取任何行动之前，需要确认';
$lang['Confirm'] = '审核里的纠正措施的确认';
$lang['Config_Title_d'] = '插件设置';
$lang['Config_Title2'] = '插件高级设置';
$lang['Config_Title1'] = 'FluxBB和Piwigo之间桥梁的设置';
$lang['Config_Title'] = '插件设置';
$lang['Config_Disclaimer'] = '检查你的FluxBB安装设置，如有必要，则改正。<br/>
如果必要的话，则改变这个插件的行为。';
$lang['Bridge_UAM_true'] = '启用Register_Fluxbb / UAM桥';
$lang['Bridge_UAM_false'] = '禁用Register_Fluxbb / UAM桥（默认）';
$lang['Bridge_UAM'] = '使用UserAdvManager插件（UAM）进入论坛的有效性验证：你要激活两个插件之间的桥梁，它允许你去限制进入FluxBB论坛，因为用户还没有验证他或她在画廊的登记注册（相关UAM功能必须处于活动状态）';
$lang['Audit_Synchro_OK'] = '<b>：数据同步通过</b>';
$lang['Audit_Synchro'] = '<b>Piwigo和FluxBB之间邮箱地址和密码同步的审核</b>';
$lang['Audit_PWG_Dup'] = '<b>对Piwigo帐户表的审计</b>';
$lang['Audit_PWG2FluxBB'] = '<b>对Piwigo和FluxBB现有帐户的审计</b>';
$lang['Audit_OK'] = '审计通过<b/><br/>';
$lang['Audit_Link_Break'] = '<b>Piwigo和FluxBB账户之间可修复之链接的审计</b>';
$lang['Audit_Link_Bad'] = '<b>Piwigo和FluxBB账户之间坏掉链接的审计</b>';
$lang['Audit_FluxBB_Dup'] = '<b>FluxBB帐目表的审计</b>';
$lang['Audit_FluxBB2PWG'] = '<b>审查现有FluxBB帐户和Piwigo里丢失的内容</b>';
$lang['Audit_Btn'] = '审计';
$lang['Advise_PWG_Dup'] = '<b>警告！继续之前，你必须更正Piwigo里的错误<br/>使用Piwigo的用户管理器来解决这个问题。</b>';
$lang['Advise_FluxBB_Dup'] = '<b>警告！在继续操作前，你必须在FluxBB里做修正<br/>使用图标去删除FluxBB的用户并解决该问题。</b>';
$lang['Advise_Check_Dup'] = '<b>如果你有重复的Piwigo 或FluxBB的户帐户，将无法继续同步。请改正并再试一次。</b> <br /> <br />';
$lang['Add_User2pwg'] = '添加一个Piwigo账户';
$lang['Add_User'] = '添加一个FluxBB账户';
$lang['About_Reg_Title_d'] = '有用的说明是为了更好整合';
$lang['About_Reg_Title'] = '有关FluxBB 论坛的用户注册';
$lang['About_Bridge_Title_d'] = '关于Register_ FluxBB和UserAdvManager插件之间桥接的指令';
$lang['About_Bridge_Title'] = '关于 Register_FluxBB / UAM bridge';
$lang['%d users registered'] = '%d 用户已注册:';
$lang['%d registrations on error: %s'] = '%d 注册错误：%s';
$lang['%d email addresses rejected: %s'] = '%d 电子邮件地址被拒绝：%s';
$lang['%d email addresses already exist: %s'] = '%d 电子邮件地址已经存在: %s';