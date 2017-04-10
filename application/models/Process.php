<?php

/**
 * Queries for application, decline, interview, job offers, withdrawal processes
 *
 * @author avillanueva
 */
class Process extends CI_Model {

    function get_applications($job_id) {
        $this->db
                ->select('*')
                ->from('job_bids')
                ->where('job_id', $job_id)
                ->where('bid_reject', '0')
                ->where('status != 1')
                ->where('withdrawn', NULL)
                ->where('job_progres_status', '0');
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }

    function get_rejected($job_id) {
        $this->db
                ->select('*, job_bids.id as bid_id')
                ->from('job_bids')
                ->join('webuser', 'webuser.webuser_id = job_bids.user_id', 'inner')
                ->join('country', 'country.country_id = webuser.webuser_country', 'inner')
                ->join('jobs', 'jobs.id=job_bids.job_id', 'inner')
                ->where('job_bids.job_id', $job_id)
                ->where('job_bids.hired', '0')
                ->where('(job_bids.withdrawn = 1 OR job_bids.bid_reject = 1)');
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }

    function get_interviews($user_id, $job_id) {
        $this->db
                ->select('*')
                ->from('job_conversation')
                ->join('job_bids', 'job_conversation.bid_id = job_bids.id', 'inner')
                ->join('webuser', 'webuser.webuser_id=job_bids.user_id', 'left')
                ->where('job_conversation.sender_id', $user_id)
                ->where('job_conversation.job_id', $job_id)
                ->where('job_bids.bid_reject', 0)
                ->where('job_bids.job_progres_status', 1)
                ->where('job_bids.withdrawn', NULL)
                ->group_by('job_conversation.bid_id');
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }

    function get_offers($job_id) {
        $this->db
                ->select('*, job_bids.id as bid_id')
                ->from('job_bids')
                ->join('webuser', 'webuser.webuser_id = job_bids.user_id', 'inner')
                ->join('country', 'country.country_id = webuser.webuser_country', 'inner')
                ->join('jobs', 'jobs.id=job_bids.job_id', 'inner')
                ->where('job_progres_status', 2)
                ->where('withdrawn',  NULL)
                ->where(array('job_id' => $job_id, 'hired' => '1'));
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
    
    function get_hires($user_id, $job_id){
        $this->db
                ->select('*')
                ->from('job_accepted')
                ->join('webuser', 'webuser.webuser_id=job_accepted.fuser_id', 'inner')
                ->join('webuser_basic_profile', 'webuser_basic_profile.webuser_id=webuser.webuser_id', 'inner')
                ->join('job_bids', 'job_bids.id=job_accepted.bid_id', 'inner')
                ->join('jobs', 'jobs.id=job_bids.job_id', 'inner')
                ->join('country', 'country.country_id=webuser.webuser_country', 'inner')
                ->where('job_accepted.buser_id', $user_id)
                ->where('job_accepted.job_id', $job_id)
                ->where('job_bids.hired', '0')
                ->where('job_bids.jobstatus', '0')
                ->where('job_bids.job_progres_status', 3)
                ->where('job_bids.withdrawn', NULL);
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
    
    function get_posted_jobs($user_id){
        $this->db
                ->join('webuser', 'webuser.webuser_id = jobs.user_id', 'left')
                ->order_by('jobs.id', 'desc');
        $query = $this->db->get_where('jobs', array('user_id' => $user_id, 'status' => 1));
        
        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
    
    function get_bids($job_id){
        $this->db
                ->join('webuser', 'webuser.webuser_id = job_bids.user_id', 'left')
                ->where('job_bids.job_progres_status', 0)
                ->where('job_bids.withdrawn',  NULL)
                ->where('job_id', $job_id)
                ->where('bid_reject', 0)
                ->where('status != 1')
                ->order_by('job_bids.id', 'desc');
        $query = $this->db->get('job_bids');
        
        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
    
    function get_job_details($job_id){
        $this->db->where('id', $job_id);
        $query = $this->db->get('jobs');
        return $query->row_array();
    }

    function cnt_ended_jobs($user_id){
        $this->db
                ->select('*')
                ->from('job_bids')
                ->where('user_id', $user_id)
                ->where('jobstatus',1) ;
        $query = $this->db->get();
        return $query->num_rows();
    }

    function accepted_jobs($user_id, $buser_id = false){
        $this->db->select('*');
        $this->db->from('job_accepted');
        $this->db->join('job_bids', 'job_bids.id = job_accepted.bid_id', 'inner');
        $this->db->join('jobs', 'jobs.id = job_bids.job_id', 'inner');

        if($buser_id){
            $this->db->where('job_accepted.buser_id', $user_id);
        }else{
            $this->db->where('job_accepted.fuser_id', $user_id);
        }

        $query = $this->db->get();
        return $query->result();
    }
    
    function get_feedbacks($fuser_id, $job_id){
        $this->db
                ->select('*')
                ->from('job_feedback')
                ->where('feedback_userid', $fuser_id)
                ->where('sender_id !=', $fuser_id)
                ->where('feedback_job_id', $job_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_withdrawn_by($user_id, $bid_id, $job_id){
        $this->db
                ->select('job_progres_status, withdrawn, bid_reject, withdrawn_by')
                ->from('job_bids')
                ->where('job_bids.id', $bid_id)
                ->where('job_bids.user_id', $user_id)
                ->where('job_bids.job_id', $job_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_conversation($job_id, $bid_id){
        $this->db
                ->select('job_conversation.*,job_conversation.created as conversation_date,webuser.*,jobs.title')
                ->from('job_conversation')
                ->join('webuser', 'job_conversation.sender_id = webuser.webuser_id', 'inner')
                ->join('jobs', 'jobs.id = job_conversation.job_id', 'inner')
                ->where('job_conversation.job_id', $job_id)
                ->where('job_conversation.bid_id', $bid_id);
        $query = $this->db->get();
        
        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
    
    function get_convo_images($id){
        $this->db
                ->select('*')
                ->from('job_conversation_files')
                ->where('job_conversation_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_job_info($user_id, $job_id){
        $this->db
                ->select('job_bids.*, jobs.job_type, jobs.title, job_bids.id AS bid_id')
                ->from('job_bids')
                ->join('jobs', 'jobs.id = job_bids.job_id', 'inner')
                ->where('job_bids.user_id', $user_id)
                ->where('job_bids.job_id', $job_id); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_job_ids($user_id){
        $this->db
                ->select('*')
                ->from('jobs')
                ->where('user_id', $user_id);
        $query = $this->db->get();

        $jobids = array();
        foreach ($query->result() as $jobs) {
            $jobids[] = $jobs->id;
        }

        return implode(",", $jobids);
    }

    function total_hired($jobids){
        $this->db
                ->select('*')
                ->from('job_bids')
                ->where_in('jobs_id', $jobids, FALSE)
                ->where('hired', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_worked_hours($user_id){
        $this->db
                ->select('*')
                ->from('job_workdairy')
                ->where_in('cuser_id', $user_id);
        $query = $this->db->get();

        $total_work = 0;
        if($query->num_rows()){
            foreach($query->result() as $work){
                $total_work += $work->total_hour;
            }
            return $total_work." hours";
        }else{
            return "0.00 hours";
        }
    }
    
    function get_jobs($emp_id){
        $this->db
                ->select('*')
                ->from('jobs')
                ->where('user_id', $emp_id);
        $query = $this->db->get();

        $return_array = array();
        $return_array['rows'] = $query->num_rows();
        if ($return_array['rows'] > 0) {
            $return_array['data'] = $query->result();
        }
        return $return_array;
    }
}