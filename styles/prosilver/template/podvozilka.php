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
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
// The common.php file is required.
include($phpbb_root_path . 'common.' . $phpEx);

// since we are grabbing the user avatar, the function is inside the functions_display.php file since RC7
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);

// specify styles and/or localisation
// in this example, we specify that we will be using the file: my_language_file.php
$user->setup('mods/podvozilka');

/*
* All of your coding will be here, setting up vars, database selects, inserts, etc...
*
* This is a very primitive example, it’s meant to show you a working example only.
*/
$example_variable = sprintf($user->lang['TIME_NOW'], $user->format_date(time()));
$google_logo = '<a href="http://www.google.com/"><img src="http://www.google.com/intl/en_ALL/images/logo.gif" alt="Google" /></a>';

// A typical usage for sending your variables to your template.
$template->assign_vars(array(
    'EXAMPLE_VAR'    => $example_variable,
    'GOOGLE_LOGO'    => $google_logo,
    'MY_AVATAR'        => get_user_avatar($user->data['user_avatar'], $user->data['user_avatar_type'], $user->data['user_avatar_width'], $user->data['user_avatar_height']),
));

/*
 * assigning some static example data to an array.
 * all language strings would normally be included in the language file,
 * this is meant for demonstration purposes ONLY.
 */
$some_array = array(
    array(
        'example'        => 'Just an Example 1',
        'demonstration'    => 'Somecount',
    ),
    array(
        'example'        => 'Just an Example 2',
        'demonstration'    => 'Somecount again',
    ),
);

/*
 * basic example of the assign block vars for the templates
 * This basically will allow you to easily display a block or array of data in a template
 * this is useful for items such as SQL queries to the database and displaying them in your templates.
 */
foreach ($some_array as $row)
{
    $template->assign_block_vars('block_name', array(
        'EXAMPLE'        => $row['example'],
        'DEMO'            => $row['demonstration'],
    ));
}

// Page title, this language variable should be defined in the language file you setup at the top of this page.
page_header($user->lang['MY_TITLE']);

// Set the filename of the template you want to use for this file.
// This is the name of our template file located in /styles/<style>/templates/.
$template->set_filenames(array(
    'body' => 'podvozilka.html',
));

// Completing the script and displaying the page.
page_footer();

?>