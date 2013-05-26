<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2013 Piwigo Team                  http://piwigo.org |
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
$lang['UAM_Bridge_advice'] = 'O plugin permite que UserAdvManager forçar novos inscritos para confirmar a sua inscrição antes de permitir que eles acessem a galeria inteira. A utilização conjunta deste plugin com Register_FluxBB pode fazer o mesmo no fórum vinculado: Titulares não pode postar até que tenham validado a sua inscrição para a galeria. <br/>
Aqui é o procedimento geral para aplicar:
<br/>
- No painel do seu fórum FluxBB administração, definir pelo menos dois grupos de usuários (por exemplo: "validado" e "não_validado").<br/>
- Dê o primeiro grupo ("validado") as permissões de acesso que você quer em seu fórum e defina como o grupo padrão.<br/>
- Remover para o segundo grupo ("não_validado"), todas as permissões em seu fórum (os membros deste grupo podem apenas ler postagens públicas).<br/>
- Localize o ID do segundo grupo "não_validado".<br/>
- Digite este ID no plugin de Register_FluxBB, ative a ponte e salve as configurações.
<br/>
<b class="mod"><u>Notas importantes:</u></b>
<br/>
Se você já usou uma versão anterior do Register_FluxBB, as contas da Piwigo ligados entre sua galeria e seu fórum FluxBB não será afetado pelos efeitos da ponte. Apenas os novos registros serão impactados após a ativação da ponte.<b><u>A função de resincronização de contas não será usada.</u></b><br/>
Da mesma forma, se você nunca usou Register_FluxBB, o processo de migração de contas do Piwigo da sua galeria para o seu fórum FluxBB vai ignorar o estado validado ou não para as contas no lançamento da migração.';
$lang['error_config_admin1'] = 'ERRO: O nome de usuário do "Webmaster" do Piwigo é errado!';
$lang['error_config_admin2'] = 'ERRO: O nome de usuário da conta "Administrador" do FluxBB é diferente de Piwigo! Verifique a configuração do seu fórum FluxBB e renomeie o nomr de usuário da conta do "Administrador", da mesma forma como no Piwigo';
$lang['error_config_guest'] = 'ERRO: O nome de usuário da conta "Convidado" do FluxBB está errado!';
$lang['save_config'] = 'Configurações salvas';
$lang['Sync_Title'] = 'Sincronizar contas do Piwigo para FluxBB';
$lang['Sync_Title_d'] = 'Use para sincronizar contas';
$lang['Sync_User'] = 'Sincronização de contas:';
$lang['Title'] = 'Register_FluxBB - Versão: ';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = 'Para sincronizar o seu acesso ao fórum com a galeria, você foi registrado no %s!';
$lang['Please change your password at your first connexion on the gallery'] = 'Por favor, altere sua senha em sua primeira conexão com a galeria para acabar com a sincronização de dados';
$lang['Prefix'] = 'Prefixo de tabelas FluxBB';
$lang['RegFluxBB_Email_or_Username_already_exist'] = 'Sincronização de FluxBB para Piwigo parado: e-mail de destino ou nome de usuário já existe na tabela de usuários do Piwigo.';
$lang['RegFluxBB_Password_Reset_Msg'] = 'Por favor, atualize sua senha para sincronização com o fórum. Então você será capaz de entrar no fórum com a mesma conta da galeria.';
$lang['Sync_Btn'] = 'Sincronização';
$lang['Sync_Check_Dup'] = '<b>Análise de tabelas de usuário para o controle de duplicatas </b>';
$lang['Sync_DataUser'] = '<b>Análise de senhas e endereços de e-mail entre contas Piwigo e contas FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Análise das contas existentes em FluxBB mas que faltam em Piwigo</b>';
$lang['Sync_Link_Bad'] = '<b>Análise das relações ruins entre contas FluxBB e Piwigo</b>';
$lang['Sync_Link_Break'] = '<b>Análise de ligações reparáveis ​​entre contas Piwigo e FluxBB</b>';
$lang['Sync_OK'] = 'Sincronização OK<br/><br/>';
$lang['Sync_PWG2FluxBB'] = '<b>Análise das contas existentes no Piwigo mas falta em FluxBB</b>';
$lang['Sync_Text'] = '  <div class="warning">A sincronização é uma ação de massa que irá drenar seus usuários do fórum, se houver! Executar uma auditoria para gerenciar cada caso.</div><br/><br/>
  
  Lembretes:<br/>
  As senhas de contas sincronizadas manualmente (por auditoria ou a sincronização global) do Piwigo para FluxBB não são recuperadas. Cada utilizador deve alterar sua senha no próximo login para a galeria (ele será automaticamente redirecionado para sua página do perfil) para que a sincronização seja eficaz e que ele possa se conectar ao fórum.<br/><br/>
  Até o momento ainda não é possível sincronizar os usuários existentes em um fórum FluxBB a uma galeria Piwigo. É por isso que a ação de auditoria proposto está excluindo contas FluxBB. Você pode deixar essas contas não-sincronizadas (elas serão capazes apenas de se conectar ao forum) esperando a próxima evolução do plugin que irá fazer a sincronização.<br/><br/>';
$lang['No_Reg_advise'] = 'Para uma melhor integração, é aconselhável fazer as seguintes alterações no seu fórum FluxBB (<b> Aviso: Estas mudanças irão desaparecer quando atualizar o script forum </b>):
<br/><br/>
   <b> * No painel de administração do FluxBB, a mudança "Permitir novos registros" para NÃO (ver: Opções - Registro) </b>
<br/><br/>
   <b> * Modifique o arquivo </b>: [FluxBBRoot]/lang/Inglês/register.php substituindo a seguinte linha:
   <div class="mod"> \'No new regs\' => \'Este fórum não está aceitando novos usuários. "</div>
   <b>com:</b>
   <div class="info"> \'No new regs\' => \'<a href="http://[YourPiwigoRoot]/register.php"> Ir aqui para se cadastrar </a><br/><br/>\'</div>
   <br/>
   Claro que você também deve fazer a mesma mudança para outras linguagens de seu fórum FluxBB.
<br/><br/>
   <b> * Modifique o arquivo </b>:[FluxBBRoot]/login.php, substituindo em torno da linha 64:
   <div class="mod"> message($lang_login[\'errado user / pass\']. \'<a href="login.php?action=forget"> </ div>
   <b> com: </ b>
   <div class="info"> mensagem ($ lang_login [\'Wrong user/pass\']. \'<a href="../[YourPiwigoRoot]/password.php"> </div>
<br/>
   e em torno da linha 295:
   <div class="mod"> <a href="login.php?action=forget"tabindex="5"> <? php echo $lang_login[\'Forgotten pass\']</a></div>
   <b>com:</b>
   <div class="info"> <a href="../[YourPiwigoRoot]/password.php" tabindex="5"> <? php echo $lang_login[\'Forgotten pass\']></a></div>
   <br/>';
$lang['FluxBB_Group'] = 'Aqui você especificar o ID (formato: inteiro) de <b> um grupo de usuários do FluxBB </b> em que os usuários não validados devem ser localizados, caso não tenham validado a sua inscrição para a galeria. Este grupo de usuários tem que ser criado pela primeira vez em FluxBB. Para ser eficaz, este grupo não deve ter quaisquer permissões no fórum (consulte a seção "Instruções" para obter informações detalhadas)';
$lang['Guest'] = 'Nome de usuário convidado do FluxBB';
$lang['Instruction_Title'] = 'Instruções (importante ler primeiro!)';
$lang['Instruction_Title_d'] = 'Instruções e informações importantes';
$lang['Link_Dead'] = 'Remoção de links mortos';
$lang['Link_Del'] = 'Remoção do link:';
$lang['Link_Dup'] = 'Remoção de duplicatas';
$lang['New_Link'] = 'Conta vinculada:';
$lang['Error_PWG2FluxBB'] = '<b> A conta Piwigo não existe em FluxBB: </b>';
$lang['Error_PWG_Dup'] = '<b> Erro na tabela de contas do Piwigo, existem duplicatas: </b>';
$lang['Error_Synchro'] = '<b> Má sincronização de conta: </b>';
$lang['Error_Synchro_Mail'] = 'no endereço de e-mail';
$lang['Error_Synchro_Pswd'] = 'Este usuário terá que modificar sua senha no próximo login para a galeria';
$lang['Error_FluxBB2PWG'] = '<b> A conta FluxBB não existe em Piwigo: </b>';
$lang['Error_FluxBB_Dup'] = '<b> Erro na tabela de contas do FluxBB, existem duplicatas: </b>';
$lang['Error_Link_Break'] = '<b> Vínculo quebrado entre contas FluxBB e Piwigo : </b>';
$lang['Error_Link_Dead'] = '<b> Erro na tabela de link, links quebrados: </b>';
$lang['Error_Link_Del'] = '<b> Erro na tabela de ligação entre dois usuários: </b>';
$lang['Error_Link_Dup'] = '<b> Erro na tabela de Vínculo, há duplicatas: </b>';
$lang['Bridge_UAM'] = 'Validação de acesso ao fórum usando UserAdvManager plugin (UAM): Aqui você ativa a ponte entre os dois plugins, o que permite que você restrinja o acesso ao seu fórum FluxBB, se o usuário não validou o seu registo na galeria (o relacionado função UAM deve estar ativo)';
$lang['Bridge_UAM_false'] = '-> Desativar ponte Register_FluxBB/UAM (padrão)';
$lang['Bridge_UAM_true'] = '-> Habilitar ponte Register_FluxBB/UAM';
$lang['Config_Disclaimer'] = 'Verifique as configurações da sua instalação FluxBB e corrigia se necessário. <br/>
Alterar, se necessário, o comportamento do plugin como você quiser.';
$lang['Config_Title'] = 'Configuração do Plugin';
$lang['Config_Title1'] = 'Configurações da ponte entre FluxBB e Piwigo';
$lang['Config_Title2'] = 'Configurações avançadas do plugin';
$lang['Config_Title_d'] = 'Configuração do Plugin';
$lang['Confirm'] = 'Confirmação de ações corretivas na auditoria';
$lang['Confirm_false'] = '--&gt;Confirmation required before any action in audit';
$lang['Confirm_true'] = '--&gt;Não pedir confirmação';
$lang['Del_Pt'] = 'Apagar tópicos do usuário e mensagens do fórum, quando ele é excluído do Piwigo Não pedir confirmação';
$lang['Del_Pt_false'] = '--&gt;Não excluir tópicos e mensagens do fórum';
$lang['Del_Pt_true'] = '--&gt;Excluir tudo';
$lang['Del_User'] = 'Remoção de conta no FluxBB:';
$lang['Details'] = 'Nível de detalhe para exibir nos relatórios de operações (sincronização e migração)';
$lang['Details_false'] = '--&gt;Nível Mínimo - Exibe apenas os principais resultados das operações de sincronização e migração';
$lang['Details_true'] = '--&gt;Nível máximo - Exibe todos os detalhes dos resultados das operações de sincronização e migração';
$lang['Disclaimer'] = '<div class="warning"> Importante: FluxBB e Piwigo devem ser instalados no mesmo banco de dados! Para sua segurança, certifique-se de fazer um backup do seu banco de dados e, especialmente, suas tabelas de ### _user antes de qualquer ação. </div><br/>
   *** Para começar, siga estas duas etapas *** <br/>
   Passo 1 - Configuração: configurar os parâmetros do plugin relacionados com parâmetros FluxBB <br/>
   Passo 2 - Sincronização:
   - Se o seu fórum <b> FluxBB não tem </b> qualquer usuário, sincronizar todas as contas de usuários a partir de Piwigo para FluxBB <br/>
   - Se o seu fórum <b> FluxBB tem </b> usuários, lançar uma auditoria. A auditoria realiza testes de consistência de dados entre Piwigo e usuários FluxBB. Com base nos resultados, serão propostas ações de correções em cada caso <br/>
<div class="warning"> Até o momento ainda não é possível sincronizar os usuários existentes em um fórum FluxBB a uma galeria Piwigo. É por isso que a ação de auditoria proposto está excluindo contas FluxBB. Você pode deixar estes estado não sincronizados contas  (que eles serão capazes apenas de se conectar ao forum) espere para a próxima evolução do plugin que vai fazer essa sincronização. </div>
<br/><br/>
Nota: As senhas de contas sincronizadas manualmente (por auditoria ou a sincronização global) de Piwigo para FluxBB não são recuperadas. Cada utilizador em atingido deve alterar sua senha no próximo login para a galeria (ele será automaticamente redirecionado para sua página do perfil) para que a sincronização seja eficaz e que ele possa entrar no fórum.
<br/><br/>
<div class="warning"> Importante saber: <br/>
   Por padrão, <b> FluxBB </b> não <u>distíngui</u> maiúscula de minúscula em nomes de usuários. Ou seja, se um usuário chamado "teste" já está registrado, outras entradas como "Test" ou "TEST" ou "teste" (etc. ..) serão rejeitados. <br/>
   Por padrão, <b> Piwigo </b> funciona em sentido inverso e, portanto, <u> sensível </u> faz destinção em nomes de usuários ("teste" será um usuário diferente de "Teste" ou "TESTE", etc .. .). <br/>
   . Para evitar problemas (mesmo que o comportamento do Piwigo possa ser facilmente alterado - Veja as opções de configuração), Register_FluxBB ligará as duas aplicações que utilizam o comportamento FluxBB: Não haverá <u> destinção</u>entre maiúscula e minúscula para nome de usuáriios <br/> </div>';
$lang['About_Bridge_Title'] = 'Sobre uma ponte entre Register_FluxBB/UAM';
$lang['About_Bridge_Title_d'] = 'Instrução sobre a ponte entre o Register_FluxBB e UserAdvManager plugins';
$lang['About_Reg_Title'] = 'Sobre o registro de usuário no fórum FluxBB';
$lang['About_Reg_Title_d'] = 'Instruções úteis para uma melhor integração';
$lang['Add_User'] = 'Adicionando uma conta no FluxBB:';
$lang['Add_User2pwg'] = 'Adicionando uma conta no Piwigo:';
$lang['Admin'] = 'Nome da conta "Webmaster" do Piwigo. <b style="color:red"> conta do usuário "Administrador" do FluxBB deve combinar! </ b>';
$lang['Advise_Check_Dup'] = '<b>IMPOSSÍVEL continuar a sincronização se você tiver contas de usuários duplicados no Piwigo ou FluxBB. Por favor, corrija e tente novamente.</b><br/><br/>';
$lang['Advise_FluxBB_Dup'] = '<b> AVISO! Você deve fazer essas correções em FluxBB antes de continuar <br/> Use os ícones para excluir usuários de FluxBB e resolver o problema. </b>';
$lang['Advise_PWG_Dup'] = '<b> AVISO! Você deve fazer essas correções no Piwigo antes de continuar <br/> Use o gerenciador de usuários do Piwigo para resolver o problema. </b>';
$lang['Audit_Btn'] = 'Auditar';
$lang['Audit_FluxBB2PWG'] = '<b> Auditoria das contas existentes no FluxBB e faltando no Piwigo </b>';
$lang['Audit_FluxBB_Dup'] = '<b> Auditoria da tabela de contas do FluxBB </b>';
$lang['Audit_Link_Bad'] = '<b> Auditoria de más ligações entre Piwigo e contas FluxBB </b>';
$lang['Audit_Link_Break'] = '<b> Auditoria de ligações reparáveis ​​entre Piwigo e contas FluxBB </b>';
$lang['Audit_OK'] = 'Auditoria OK<br/><br/>';
$lang['Audit_PWG2FluxBB'] = '<b> Auditoria das contas existentes no Piwigo e faltando no FluxBB </b>';
$lang['Audit_PWG_Dup'] = '<b> Auditoria da tabela de contas do Piwigo </b>';
$lang['Audit_Synchro'] = '<b> Auditoria da sincronização de senhas e endereços de e-mail entre Piwigo e contas FluxBB </b>';
$lang['Audit_Synchro_OK'] = ' <b>: Sincronização de dados OK </b';
?>