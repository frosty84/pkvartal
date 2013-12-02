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
include($phpbb_root_path . 'includes/Podvozilka.class.' . $phpEx);

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
$podvozilka = new Podvozilka();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $action = $_POST['action'];
    switch($action){
        case "add":
            $podvozilka->insertRow($user->data['user_id'], $_POST['data']);
        break;
    
        default:
            #do nothing
        break;
    }
}
#$_POST processing. Stop




#Assigning variables. Start
$whattodo = $_GET[whattodo];
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
    'ICANBRING'         => $user->lang['ICANBRING'],
    'BRINGMEUP'         => $user->lang['BRINGMEUP'],
    
);
$template->assign_vars($varToAssign);

$persons = array(1,2,3,4,5,6,7);
foreach ($persons as $p)
{
    $template->assign_block_vars('block_persons', array('VAL' => $p));
}

$places = $podvozilka->getAllPlaces();
foreach ($places as $id => $place)
{
    $template->assign_block_vars('block_places', array('ID' => $id, 'PLACE' => $place));
}


// Page title, this language variable should be defined in the language file you setup at the top of this page.
page_header($user->lang['PODVOZILKA_TITLE']);
#Assigning variables. Stop
 switch($whattodo){
    case "icanbring":
        $templateName = 'icanbring.html';
    break;

    case "bringmeup":
        $events = $podvozilka->getAllEvents();
        foreach ($events as $eventId => $e)
        {
            $template->assign_block_vars('block_events', $e);
        }
        $templateName = 'bringmeup.html';
    break;

    default:
        $templateName = 'podvozilka.html';
    break;
}
$template->set_filenames(array(
    'body' => $templateName,
));


page_footer();

?>