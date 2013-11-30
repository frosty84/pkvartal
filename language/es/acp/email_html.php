<?php
/**
*
* acp_email_html [Spanish] by ThE KuKa - http://www.phpbb-es.com
*
* @package language
* @version $Id: email_html.php, ksar $
* @copyright (c) 2008
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Email settings
$lang = array_merge($lang, array(

	'ACP_MASS_EMAIL_EXPLAIN'		=> 'Aquí puede crear y enviar un email con mensaje HTML a todos sus usuarios, o todos los usuarios de un grupo específico <strong>que tengan la opción de recibir Emails habilitado</strong>. Para lograr este objetivo un email se enviará a la dirección de correo de la administración, con copia oculta enviado a todos los destinatarios. La configuración predeterminada es incluir sólo a 50 destinatarios en dicho email, pero puede ser enviados a má destinatarios. Si está escribiendo a un grupo numeroso de usuarios, sea paciente por favor, y no detenga la página después de la presentación. Es normal que un correo electrónico masivo tome un largo tiempo, usted será notificado cuando la secuencia de comandos haya finalizado.',
	'ACP_MASS_EMAIL_VIEW_EXPLAIN'	=> 'Aquí puede ver todos los email masivos HTML enviados a los usuarios<br>Puede eliminar algunos, o mostrarlos<br />Puede seleccionar cuales serán mostrados en la página de Lista de Correo',
	'ALL_USERS'						=> 'Todos los Usuarios',

	'COMPOSE'				=> 'Componer',

	'EMAIL_SEND_ERROR'		=> 'Hubo uno o más errores al mismo tiempo enviando el email. Por favor, vea el %sError LOG%s para los errores detallados.',
	'EMAIL_SENT'			=> 'El mensaje ha sido enviado.',
	'EMAIL_SENT_QUEUE'		=> 'El mensaje ha sido puesto en cola para el envío.',

	'LOG_SESSION'			=> 'LOG de sesión de correo para LOG crítico',

	'SEND_IMMEDIATELY'		=> 'Enviar inmediatamente',
	'SEND_TO_GROUP'			=> 'Enviar al Grupo',
	'SEND_TO_USERS'			=> 'Enviar a los Usuarios',
	'SEND_TO_USERS_EXPLAIN'	=> 'Introduzca los nombres aquí, se anularán cualquier grupo seleccionado anteriormente. Ingrese cada nombre de usuario, en una nueva línea.',

	'MAIL_HIGH_PRIORITY'	=> 'Alta',
	'MAIL_LOW_PRIORITY'		=> 'Baja',
	'MAIL_NORMAL_PRIORITY'	=> 'Normal',
	'MAIL_PRIORITY'			=> 'Prioridad de Email',
	'MASS_MESSAGE'			=> 'Su Mensaje',
	'MASS_MESSAGE_EXPLAIN'	=> 'Por favor, introduzca solamente texto HTML. Todos los BBCodes serán eliminados antes de ser enviado.',
	
	'NO_EMAIL_MESSAGE'		=> 'Debe introducir un mensaje.',
	'NO_EMAIL_SUBJECT'		=> 'Debe especificar un asunto para el mensaje.',
	
	'TINY_MCE_LANGUAGE'		=> 'es',
	
	'DISPLAY_IT'			=> 'Mostrar el email en la página de Lista de Correo',
	'NEWS_PAGE'				=> 'Página de Lista de Correo',
	'BY'					=> 'Por',
	'HIDE'					=> 'Ocultar',
	'SHOW'					=> 'Mostrar',
	'TIME'					=> 'Fecha',
	'SEND_BY'				=> 'Enviado por',
	'BACK'					=> 'Previsualizar página',
	'DELETE'				=> 'Borrar este Email',
	
	'DELETE_MAIL_SUCCES'	=> 'El email HTML ha sido enviado',
	'DISPLAY_MAIL_SUCCES'	=> 'El email HTML será mostrado en la página de Lista de Correo',
	'HIDE_MAIL_SUCCES'		=> 'El email HTML <b>NO</b> será mostrado en la página de Lista de Correo',
	'ID_NOT_EXIST'			=> 'Este ID de correo no existe',
));

?>