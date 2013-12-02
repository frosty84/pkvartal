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
        }
        
        public function getAllEvents(){
                global $db;
                
                $events = array();
                
                $sql = 'SELECT * FROM ' . PODVOZILKA_EVENTS_TABLE;
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))	
		{
			$events[$row['id']] = $row;
		}
		$db->sql_freeresult($result);
                
                return $events;
        }
}
?>