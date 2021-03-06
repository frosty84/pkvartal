<?php
/**
*
* groups [English]
*
* @author My Username email@domain.tld - http://website.tld
*
* @package language
* @version $Id$
* @copyright (c) 2007 Your Group
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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
    'BACK'              => 'Назад',
    'SUCCESS'            => 'Ваше предложение успешно добавлено, спасибо!',
    'FAIL'              => 'Что-то пошло не так, попробуйте позже.',
    'COMMENTS'          => 'Комментарии',
    'PODVOZILKA_TITLE'  => 'Подвозилка',
    'NOT_LOGGED_ERROR'  => 'Войдите или зарегистрируйтесь',
    'OWN_OPTION'        => '...свой вариант',
    'ME'                => 'Я,',
    'CAN_BRING'         => 'могу подвезти',
    'CAN_BRING_ALT'     => 'может подвезти',    
    'PERSON'            => 'человек',
    'FROM'              => 'от',
    'TO'                => 'до',
    'WHEN'              => 'в',
    'ICANBRING'         => 'Я могу подвезти',
    'BRINGMEUP'         => 'Подвезите меня пожалуйста',
    'BRINGMEUP_ALT'     => 'Подвезите меня!!!',

));

?>