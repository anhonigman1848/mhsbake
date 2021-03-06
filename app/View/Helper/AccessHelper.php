<?php
/* /app/View/Helper/AccessHelper.php */
// App::uses('AppHelper', 'View/Helper');

class AccessHelper extends AppHelper {
    
    private $role = '';
    
    
    private $staff = array( 'selected' => true,
                            'archive_reel_id' => true,
                            'newspaper_reel_id' => true,
                            'title' => true,
                            'city' => true,
                            'county' => true,
                            'title_control' => true,
                            'aleph_number' => true,
                            'series' => true,
                            'series_number' => true,
                            'author_citation' => true,
                            'reel_number' => true,
                            'reel_control' => true,
                            'begin_date' => true,
                            'end_date' => true,                            
                            'gaps' => true,
                            'contents' => true,
                            'comments' => true,
                            'usage_rights' => true,
                            'reel_polarity' => true,
                            'generation' => true,
                            'redox_quality_date' => true,
                            'redox_quality_present' => true,
                            'scratches' => true,
                            'quality_in' => true,
                            'sdn_number' => true,
                            'shipping_box' => true,
                            'date_of_last_access' => true,
                            'date_of_microfilm' => true,
                            'checked_out' => true,
                            'created' => true,
                            'modified' => true,
                            'deleted' => false,
                            'setusertypeadmin' => false, // new
                            'setusertypestaff' => true, // new
                            'inlineedit' => true, // new
                            
                            'add' => true,
                            'view' => true,
                            'edit' => true,
                            'delete' => false,
                            'soft_delete' => true,
                            'changelog' => true,
                            'last_name' => true,
                            'first_name' => true);
    
    private $basic = array( 'selected' => true,
                            'archive_reel_id' => false,
                            'newspaper_reel_id' => false,
                            'title' => true,
                            'city' => true,
                            'county' => true,
                            'title_control' => true,
                            'aleph_number' => true,
                            'series' => true,
                            'series_number' => true,
                            'author_citation' => true,
                            'reel_number' => true,
                            'reel_control' => true,
                            'begin_date' => true,
                            'end_date' => true,                            
                            'gaps' => true,
                            'contents' => true,
                            'comments' => true,
                            'usage_rights' => true,
                            'reel_polarity' => true,
                            'generation' => true,
                            'redox_quality_date' => false,
                            'redox_quality_present' => false,
                            'scratches' => false,
                            'quality_in' => false,
                            'sdn_number' => false,
                            'shipping_box' => false,
                            'date_of_last_access' => false,
                            'date_of_microfilm' => false,
                            'checked_out' => true,
                            'created' => false,
                            'modified' => false,
                            'deleted' => false,
                            'setusertypeadmin' => false, // new
                            'setusertypestaff' => false, // new
                            'inlineedit' => false, // new
                            
                            'add' => false,
                            'view' => true,
                            'edit' => false,
                            'delete' => false,
                            'soft_delete' => false,
                            'changelog' => false,
                            'last_name' => false,
                            'first_name' => false);
    
    
    private $signedOut = array(
                            'selected' => true,
                            'archive_reel_id' => false,
                            'newspaper_reel_id' => false,
                            'title' => false,
                            'city' => false,
                            'county' => false,
                            'title_control' => false,
                            'aleph_number' => false,
                            'series' => false,
                            'series_number' => false,
                            'author_citation' => false,
                            'reel_number' => false,
                            'reel_control' => false,
                            'begin_date' => false,
                            'end_date' => false,                            
                            'gaps' => false,
                            'contents' => false,
                            'comments' => false,
                            'usage_rights' => false,
                            'reel_polarity' => false,
                            'generation' => false,
                            'redox_quality_date' => false,
                            'redox_quality_present' => false,
                            'scratches' => false,
                            'quality_in' => false,
                            'sdn_number' => false,
                            'shipping_box' => false,
                            'date_of_last_access' => false,
                            'date_of_microfilm' => false,
                            'checked_out' => false,
                            'created' => false,
                            'modified' => false,
                            'deleted' => false,
                            'setusertypeadmin' => false, // new
                            'setusertypestaff' => false, // new
                            'inlineedit' => false, // new
                            
                            'add' => false,
                            'view' => false,
                            'edit' => false,
                            'delete' => false,
                            'soft_delete' => false,
                            'changelog' => false,
                            'last_name' => false,
                            'first_name' => false);

    public function cat($attribute) {
        // Use the cat helper to determine if a table attribute can be viewed
        // by current user role
        
        if($this->role == 'admin') {
            return true;
        }
        if($this->role == 'staff') {
            return $this->staff[$attribute];
        }
        if($this->role == 'basic') {
            return $this->basic[$attribute];
        }
        if($this->role == '') {
            return $this->signedOut[$attribute];
        }
    }
    
    public function setRole ($userRole) {
        $this->role = $userRole;
    }
}
