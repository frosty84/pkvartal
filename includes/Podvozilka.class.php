<?php
if (!defined('IN_PHPBB'))
{
        exit;
}
class Podvozilka {

        public function __construct(){}
        
        public static function getAllPlaces() {
                global $db;
                
                $sql = 'SELECT id, place FROM ' . PODVOZILKA_PLACES_TABLE;
                $result = $db->sql_query($sql);
                $places = array();
                while ($row = $db->sql_fetchrow($result))
                {
                        $places[$row['id']] = $row['place'];
                }
                $db->sql_freeresult($result);
                
                return $places;
        }
        
        public function insertRow($userId, $data)
        {
                global $db;
                
                $db->sql_return_on_error(true);
                        
                $sql_ary = array(
                        'user_id'               => (int) $userId,
                        'place_from'            => (int) $data[place_from],
                        'place_to'              => (int) $data[place_to],
                        'datewhen'              => date("Y-m-d H:i:s", strtotime($data['datewhen'])),
                        'comments'              => (string) $data[comments],
                        'persons'               => (int) $data[persons],
                );
                
                $query = 'INSERT INTO ' . PODVOZILKA_EVENTS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
                $db->sql_query($query);
                
                $db->sql_return_on_error(false);
                return $db->sql_affectedrows() ? "SUCCESS" : "FAIL";
        }
        
        public function insertEventRow($eventId, $userId, $message)
        {
                global $db;
                
                $db->sql_return_on_error(true);
                
                $sql_ary = array(
                        'event_id'              => (int) $eventId,
                        'user_id'               => (int) $userId,
                        'comment'               => (string) $message,
                        'current'               => 1,
                );
                
                $query = 'INSERT INTO ' . PODVOZILKA_EVENTS_LOG_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ary);
                $db->sql_query($query);
                
                $db->sql_return_on_error(false);
                return $db->sql_affectedrows() ? $query : "FAIL";
        }
        
        public function getAllEvents(){
                global $db;
                
                $events = array();
                
                $sql = "SELECT
                                e.`id` as 'ID', 
                                e.`user_id` as 'USER_ID', 
                                u.`username` as 'USERNAME',
                                e.`persons` as 'PERSONS', 
                                pfrom.`place` as 'PLACE_FROM', 
                                pto.`place` as 'PLACE_TO', 
                                e.`datewhen` as 'DATEWHEN', 
                                e.`comments` as 'COMMENTS', 
                                e.`datecreation` as 'DATECREATION'  
                        FROM ".PODVOZILKA_EVENTS_TABLE." e
                        left join ".PODVOZILKA_PLACES_TABLE." pfrom on pfrom.`id` = e.`place_from`
                        left join ".PODVOZILKA_PLACES_TABLE." pto on pto.`id` = e.`place_to`
                        left join ".USERS_TABLE." u on u.`user_id` = e.`user_id`
                        ";
		$result = $db->sql_query($sql);
		$count = 0;
		while ($row = $db->sql_fetchrow($result))	
		{
			$events[$count++] = $row;
		}
		$db->sql_freeresult($result);
                
                return $events;
        }
}
?>