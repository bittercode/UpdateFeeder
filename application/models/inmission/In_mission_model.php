<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class In_mission_model extends CI_Model
{
    
    public $title;
    public $description;
    public $link;
    public $category;
    
    public function __construct()
        {
                parent::__construct();
        }
        
    public function get_feed_items()
    {
        $query = $this->db->get('rss_items');
        return $query->result();
    }
    
    public function get_feed($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('rss_details');
        return $query->row();
    }
    
    public function get_feeds()
    {
        $query = $this->db->get('rss_details');
        return $query->result();
    }
    
    public function get_item_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }
    
    public function create_feed_item($data)
    {
        $this->db->insert('rss_items',$data);
    }
    
}


