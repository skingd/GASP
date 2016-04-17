<?php
class AchievementModel{
    
    protected $db;
    
    public function __construct(PDO $db){
        $this->db = $db;
    }
    
    //This retrieves events for the event view. It does not return any events that are older than the current day.
    public function getUnlockedAchievements($user_id){
        return $this->db->query("
         SELECT user.user_name, unlocked_achievements.user_id_ach, unlocked_achievements.ach_id_unlocked,
                user.user_id, achievements.ach_id, achievements.ach_name,
                achievements.ach_desc, achievements.ach_image, achievements.ach_value,
                achievements.ach_creator
                
        FROM user, achievements, unlocked_achievements
        WHERE user.user_id = unlocked_achievements.user_id_ach AND achievements.ach_id = unlocked_achievements.user_id_ach AND unlocked_achievements.user_id_ach = $user_id
        ");
    
    }
    
    //This retrieves data for the archive view. The main difference is that it displays only the selected
    //categories from the beginning of time
    public function scanProximity(){
        return $this->db->query("
        SELECT trigger_gps_id, ach_id, trigger_latitude, trigger_longitude
        FROM trigger_gps
        ");
    }
    
    //This retrieves data for the archive view. It shows every single event since the beginning of time
    public function getCompleteEventArchive(){
        return $this->db->query("SELECT users.user_first_name, users.user_last_name, program_events.event_link, program_events.event_category, program_events.event_submission_date, program_events.event_title, program_events.event_date, program_events.event_body, program_events.eventend, program_events.eventbeginhour, program_events.eventendhour, program_events.eventendhour, program_events.beginmeridiem, program_events.endmeridiem, program_events.event_id
        FROM users
        JOIN program_events ON program_events.event_author_id = users.user_id
        WHERE program_events.isVisible = 't'
        ORDER BY program_events.event_date DESC");
    }
    
    public function setEvents($userid, $eventname, $eventdescription, $eventdate, $eventcategory, $eventlink, $eventEnd, $eventBeginHour, $eventEndHour, $beginmeridiem, $endmeridiem){
        $stmt = $this->db->prepare(
            "INSERT INTO program_events (event_author_id, event_title, event_date, event_body, event_category, event_link, eventend, eventbeginhour, eventendhour, beginmeridiem, endmeridiem)
             VALUES(:event_author_id, :event_title, :event_date, :event_body, :event_category, :event_link, :eventend, :eventbeginhour, :eventendhour, :beginmeridiem, :endmeridiem)"
        );
        
        //Bindings
        $stmt->bindParam(':event_author_id', $userid);
        $stmt->bindParam(':event_title', $eventname);
        $stmt->bindParam(':event_date', $eventdate);
        $stmt->bindParam(':event_body', $eventdescription);
        $stmt->bindParam(':event_category', $eventcategory);
        $stmt->bindParam(':event_link', $eventlink);
        $stmt->bindParam(':eventend', $eventEnd);
        $stmt->bindParam(':eventbeginhour', $eventBeginHour);
        $stmt->bindParam(':eventendhour', $eventEndHour);
        $stmt->bindParam(':beginmeridiem', $beginmeridiem);
        $stmt->bindParam(':endmeridiem', $endmeridiem);
        
        $stmt->execute();
        
        return $stmt->rowCount();
    }
    
     public function deleteEvent($eventId){
        $stmt = $this->db->prepare(
            "UPDATE program_events
             SET isVisible = 'f'
             WHERE event_id = {$eventId}"
        );
        
        //Bindings
        $stmt->bindParam(':event_id', $eventId);
       
        
        $stmt->execute();
        
        return $stmt->rowCount();
    
     }
}

?>