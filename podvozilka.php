<?php
/**
*
* @author Original Author Username author_email@domain.tld - http://mywebsite.tld
* @author Another Author Username another_email@domain.tld - http://domain.tld
*
* @package {PACKAGENAME}
* @version $Id$
* @copyright (c) 2007 Your Group Name
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
// Specify the path to your phpBB3 installation directory.
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_podvozilka.' . $phpEx);

// since we are grabbing the user avatar, the function is inside the functions_display.php file since RC7
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);

// specify styles and/or localisation
xdebug_break();
$user->setup('mods/podvozilka');
$user->setup('common');

#$_POST processing. Start
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "add":
            insertRow($user->data['user_id'], $_POST['data']);
        break;
    
        default:
            #do nothing
        break;
    }
}
#$_POST processing. Stop




#Assigning variables. Start
$lang = $user->lang;

$varToAssign = array(
    'MY_AVATAR'         => get_user_avatar($user->data['user_avatar'], $user->data['user_avatar_type'], $user->data['user_avatar_width'], $user->data['user_avatar_height']),
    'IS_LOGGED_IN'      => $user->data['user_id'] != ANONYMOUS,
    'USERNAME'          => $user->data['username'],
    'NOT_LOGGED_ERROR'  => $user->lang['NOT_LOGGED_ERROR'],
    'SUBMIT'            => $user->lang['SUBMIT'],
    'OWN_OPTION'        => $user->lang['OWN_OPTION'],
    'ME'                => $user->lang['ME'],
    'CAN_BRING'         => $user->lang['CAN_BRING'],
    'PERSON'            => $user->lang['PERSON'],
    'FROM'              => $user->lang['FROM'],
    'TO'                => $user->lang['TO'],
    'WHEN'              => $user->lang['WHEN'],
);
$template->assign_vars($varToAssign);

$persons = array(1,2,3,4,5,6,7);
foreach ($persons as $p)
{
    $template->assign_block_vars('block_persons', array('VAL' => $p));
}

$places = getAllPlaces();
foreach ($places as $id => $place)
{
    $template->assign_block_vars('block_places', array('ID' => $id, 'PLACE' => $place));
}


// Page title, this language variable should be defined in the language file you setup at the top of this page.
page_header($user->lang['MY_TITLE']);
#Assigning variables. Stop

$template->set_filenames(array(
    'body' => 'podvozilka.html',
));

page_footer();

?>