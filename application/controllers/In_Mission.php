<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_Mission extends CI_Controller {
    
        function __construct()
	{
            parent::__construct();
            $this->load->library(array('ion_auth','form_validation'));
            $this->load->helper('xml');
            $this->load->model('inmission/In_mission_model');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
	}
        
	public function index()
	{
            if (!$this->ion_auth->logged_in())
            {
                //redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            
            $data['feeds_query'] = $this->In_mission_model->get_feeds();
            $data['items_query'] = $this->In_mission_model->get_feed_items();
            $data['cat_query'] = $this->In_mission_model->get_item_categories();
            $this->load->view('inmission/header');
            $this->load->view('inmission/combined',$data);
            $this->load->view('inmission/footer');
            
	}
        
        public function feed()
        {
            $data['channel'] = $this->In_mission_model->get_feed(1);
            $data['items'] = $this->In_mission_model->get_feed_items();
            header("Content-Type: application/rss+xml");
            $this->load->view('inmission/feed',$data);
        }
        
        public function create_item()
        {
            if (!$this->ion_auth->logged_in())
            {
                //redirect them to the login page
                redirect('auth/login', 'refresh');
            }
            
            $this->form_validation->set_rules('dtitle', 'Title', 'required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('dbody', 'Body', 'required|min_length[5]|max_length[300]');
            $this->form_validation->set_rules('dlink', 'Link', 'valid_url');
            $this->form_validation->set_rules('dcategory', 'Category', 'required');
            $this->form_validation->set_rules('dposton', 'Post On', 'required');
            $this->form_validation->set_rules('dfeed', 'Feed', 'required');
            
            if ($this->form_validation->run() == false)
            {
                $catfields=$this->In_mission_model->get_item_categories();
                $categories = array();
                foreach ($catfields as $item)
                {
                    $categories[$item->id] = $item->name; 
                }
                $feedfields=$this->In_mission_model->get_feeds();
                $feeds = array();
                foreach ($feedfields as $item)
                {
                    $feeds[$item->id] = $item->title; 
                }
                $data['category_list'] = $categories;
                $data['feed_list'] = $feeds;
                $this->load->view('inmission/create_item',$data);
                
            }
            else
            {
                $auth_name = $this->ion_auth->user()->row();
                
                $insert = array(
                    'title' => $this->input->post('dtitle'),
                    'body' => $this->input->post('dbody'),
                    'link' => $this->input->post('dlink'),
                    'author' => $auth_name->username,
                    'category_id' => intval($this->input->post('dcategory')),
                    'post_on' => date($this->input->post('dposton')),
                    'feed_id' => intval($this->input->post('dfeed'))
                );
                $this->In_mission_model->create_feed_item($insert);
                
                //After I create the new record, reload tables and return to the dashboard.
                $data['feeds_query'] = $this->In_mission_model->get_feeds();
                $data['items_query'] = $this->In_mission_model->get_feed_items();
                $data['cat_query'] = $this->In_mission_model->get_item_categories();
                $this->load->view('inmission/header');
                $this->load->view('inmission/combined',$data);
                $this->load->view('inmission/footer','refresh');
                
            }
        }
        
        public function test()
        {
            //$auth_name = $this->ion_auth->user();
            $data['user_stuff'] = $this->ion_auth->user()->row();
            $this->load->view('inmission/test',$data);
        }
}