<?php 
class Friends extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Friend');
	}

	public function index()
	{
		if ($this->session->userdata('id') !== null) {
        	redirect('homepage');
        } else {
        	$this->load->view('/friends/index');
        }
	}
	public function homepage(){
		if ($this->session->userdata('id') === null) {
		$this->load->view('friends/partials/header1');
		$this->load->view('/friends/homepage');
		$this->load->view('friends/partials/footer');
		} else {
		$this->load->view('friends/partials/header');
		$this->load->view('/friends/homepage');
		$this->load->view('friends/partials/footer');
	}
	}

	public function registration()
	{
        $post = $this->input->post(NULL, true);
		$this->load->model('Friend');
		$result = $this->Friend->validate_registration($post);
		if ($result == 'valid') {
			$this->load->model('Friend');
			$this->Friend->insert_user($post);
			redirect('friends');
		} else {
			$this->load->view('/friends/index');
		}
	}

	public function login()
	{
        $post = $this->input->post(NULL, true);
		$result = $this->Friend->validate_login($post);
		if ($result == 'valid') {
			redirect('homepage');
		} else {
			$this->load->view('friends/index');
		}
	}

	public function admin()
	{
		if ($this->session->userdata('email') == 'admin@example.com') {
			$this->load->view('friends/login_admin');
		} else {
			redirect('homepage');
		}
	}

	public function login_admin()
	{
        $post = $this->input->post(NULL, true);
		$result = $this->Friend->validate_login($post);
		$email_admin=$this->input->post('email_log');
		if (($result == 'valid')&&($email_admin=="admin@example.com")) {
			redirect('admin_settings');
		} else {
			$this->load->view('friends/login_admin');
		}
	}
	public function make_admin()
  	{
  		$nor_email=$this->input->post('nor_email');
  		$this->Friend->make_admin($nor_email);
  		redirect('admin_settings');
  	}
  	public function remove_admin()
  	{
  		$adm_email=$this->input->post('adm_email');
  		$this->Friend->remove_admin($adm_email);
  		redirect('admin_settings');
  	}
  	public function admin_settings()
  	{
	    $all_data_e['all_emails_normal']=$this->Friend->get_all_emails_normal();
	    $all_data_e['all_emails_admin']=$this->Friend->get_all_emails_admin();
	    $this->load->view('friends/partials/header');
	    $this->load->view('friends/admin_page', $all_data_e );
  	}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	public function contact(){
		if ($this->session->userdata('id') === null) {
			$this->load->view('friends/partials/header1');
			$this->load->view('/friends/contact');
			$this->load->view('friends/partials/footer');
		} else {
		$this->load->view('friends/partials/header');
		$this->load->view('/friends/contact');
		$this->load->view('friends/partials/footer');
		}
	}

	public function members()
	
	{
		if ($this->session->userdata('id') === null) {
		redirect('');
		} else {
	        $users = $this->Friend->get_all_users();
	        $industries = $this->Friend->get_industries();
		    $cities = $this->Friend->get_cities();
		    $requests_sent = $this->Friend->get_req_sent();
		    $requests_rec = $this->Friend->get_req_rec();
		    $friends = $this->Friend->get_friends();
	        $this->load->view('friends/partials/header');
	        $this->load->view('friends/friends_page', ['users' => $users, 'industries' => $industries, 'cities' => $cities, 'requests_sent' => $requests_sent, 'requests_rec' => $requests_rec, 'friends' => $friends]);
	        $this->load->view('friends/partials/footer');
		}
	}
	public function members_search()
	{
		if ($this->session->userdata('id') === null) {
		redirect('');
		} else {
			$post = $this->input->post(NULL, true);
	        $users = $this->Friend->get_users($post);
	        $industries = $this->Friend->get_industries();
		    $cities = $this->Friend->get_cities();
		    $requests_sent = $this->Friend->get_req_sent();
			    $requests_rec = $this->Friend->get_req_rec();
			    $friends = $this->Friend->get_friends();
	        $this->load->view('friends/partials/header');
	        $this->load->view('friends/friends_page', ['users' => $users, 'industries' => $industries, 'cities' => $cities, 'requests_sent' => $requests_sent, 'requests_rec' => $requests_rec, 'friends' => $friends]);
	        $this->load->view('friends/partials/footer');
	    }
	}
	
		public function friend_request()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
	        $post = $this->input->post(NULL, true);
	        $this->Friend->friend_request($post);
	        redirect('members');
	    	}
	    	}
		}
		public function friend_profile()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
	        $post = $this->input->post(NULL, true);
	        if(count($post) !== 0){
		        $this->session->set_userdata('profile_id', $post['profile_id']);
		    }
		        $this->load->model('Friend');
		        $profile = $this->Friend->friend_profile();
		    $this->load->view('friends/partials/header');
	        $this->load->view('friends/friend_profile', ['profile' => $profile]);
	        $this->load->view('friends/partials/footer');
	    	}
	    	}
		}
		public function show_friends()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
		    $friends = $this->Friend->get_us_friends();
		    $profile = $this->Friend->friend_profile();
		    $this->load->view('friends/partials/header');
		    $this->load->view('friends/friends', ['friends' => $friends, 'profile' => $profile]);
		    $this->load->view('friends/partials/footer');
			}
		}
		public function show_friends_id()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
			$this->load->model('Friend');
		    $friends = $this->Friend->get_us_friends_id();
		    $profile = $this->Friend->friend_profile();
		    $this->load->view('friends/partials/header');
		    $this->load->view('friends/friends', ['friends' => $friends, 'profile' => $profile]);
		    $this->load->view('friends/partials/footer');
			}
		}
		public function profile()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
		    $profile = $this->Friend->get_profile();
		    $this->load->view('friends/partials/header');
		    $this->load->view('friends/profile', ['profile' => $profile], array('error' => ' ' ));
		    $this->load->view('friends/partials/footer');
			}
		}
		public function edit_profile()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
		    $profile = $this->Friend->get_profile();
		    $industries = $this->Friend->get_industries();
		    $cities = $this->Friend->get_cities();
		    $this->load->view('friends/partials/header');
		    $this->load->view('friends/edit_profile', ['profile' => $profile, 'industries' => $industries, 'cities' => $cities]);
		    $this->load->view('friends/partials/footer');
			}
		}

		public function update_profile()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
		    $post = $this->input->post(NULL, true);
			$result = $this->Friend->validate_update($post);
			if ($result == 'valid') {
				$this->Friend->update_user($post);
				redirect('profile');
			} else {
				$this->session->set_flashdata('first_name_err', form_error('first_name'));
				$this->session->set_flashdata('last_name_err', form_error('first_name'));
				$this->session->set_flashdata('phone_number_err', form_error('phone_number'));
				$this->session->set_flashdata('linkedin_err', form_error('linkedin'));
				redirect('edit_profile');
			}
			}
		}
		public function my_friends()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
		    $profile = $this->Friend->get_profile();
		    $friends = $this->Friend->get_my_friends();
		    $requests_sent = $this->Friend->get_request_sent();
		    $requests_received = $this->Friend->get_request_received();
		    $this->load->view('friends/partials/header');
		    $this->load->view('friends/myfriends', ['friends' => $friends, 'requests_received' => $requests_received, 'requests_sent' => $requests_sent, 'profile' => $profile]);
		    $this->load->view('friends/partials/footer');
			}
		}
		public function add_friend()
		{
			if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
	        $post = $this->input->post(NULL, true);
	        $this->Friend->add_friend($post);
	        redirect('my_friends');
	    	}
		}


  	public function add_post()
  	{
  		if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
  		$this->form_validation->set_rules('posty','post','required');
  		if ($this->form_validation->run() == FALSE)
      	{
			redirect('/all_posts');
      	}
      	else
      	{
			$post=array(
			'post_title'=>$this->input->post('title'),
			'post'=>$this->input->post('posty'),
/*@*/		'user_id'=>$this->session->userdata('id'),
			'public_private'=>$this->input->post('public_private')
   // we need here the user id 
		);                         
	    $this->Friend->add_post($post);
	    redirect('/all_posts');
	    }
		}
	}

    public function all_posts()
    {
    	$all_data_p['all_post']=$this->Friend->get_all_posts();
	    if ($this->session->userdata('id') === null) {
		$this->load->view('friends/partials/header1');
	    $this->load->view('friends/challenge', $all_data_p );
	    $this->load->view('friends/partials/footer');
		} else {
	   
	    $this->load->view('friends/partials/header');
	    $this->load->view('friends/challenge', $all_data_p );
	    $this->load->view('friends/partials/footer');
		}
  	}

	public function add_comm()
	{
		if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
	    $this->form_validation->set_rules('comment','Comment','required'); 
	    if ($this->form_validation->run() == FALSE)
    	{
      		redirect('all_comm');
    	}
    	else
    	{         
		    $post_id=$this->input->post('post_id');
		    $this->session->set_userdata('post_id',$post_id);
		    $comm=array(
		    'comment'=>$this->input->post('comment'),
		    'post_id'=>$post_id,
		    'user_id'=>$this->input->post('user_id')
		    );                         
		    $this->Friend->add_comm($comm);
		    redirect('all_comm');
    	}
    	}
  	}

  	public function all_comm()
  	{
  		
    	$p_id=$this->input->post('post_id');
    	if(!$p_id)
      	{
        	$p_id=$this->session->userdata('post_id');
      	}
    	$this->session->set_userdata('post_id',$p_id);
    	$post_main=$this->input->post('post');
    
    	if($post_main)
      	{
        	$this->session->set_userdata('post_main',$post_main);
      	}
    	$all_data_c['all_comm']=$this->Friend->get_all_comm($p_id);
    	$all_data_c['post'] = $this->Friend->get_post($p_id);
    	if ($this->session->userdata('id') === null) {
			$this->load->view('friends/partials/header1');
    	$this->load->view('friends/comments', $all_data_c);
    	$this->load->view('friends/partials/footer');
			} else {
    	$this->load->view('friends/partials/header');
    	$this->load->view('friends/comments', $all_data_c);
    	$this->load->view('friends/partials/footer');
    }
    	}
 

  	public function delete_comm()
        {
        	if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
          	$comm_id=$this->input->post('comm_id');
          	$this->Friend->delete_comm($comm_id);
          	redirect('all_comm');
          	}
        }

  	public function delete_post()
        {
        	if ($this->session->userdata('id') === null) {
			redirect('');
			} else {
          	$post_id=$this->input->post('post_id');
          	$this->Friend->delete_post($post_id);
          	redirect('all_posts');
          	}
        }
    	public function add_event()
		{
		if ($this->session->userdata('id') === null) {
		redirect('');
		} else {
	    $this->form_validation->set_rules('event','Event','required'); 
	    if ($this->form_validation->run() == FALSE)
    	{
      		redirect('admin_settings');
    	}
    	else
    	{         
		    $event=array(
		    'event_title'=>$this->input->post('title'),
		    'event_description'=>$this->input->post('event'),
		    'event_location'=>$this->input->post('location'),
		    'event_datetime'=>$this->input->post('date'),
		    'event_price'=>$this->input->post('price'),
		    );                         
		    $this->Friend->add_event($event);
		    redirect('all_events');
    	}
    	}
    }
     public function all_events()
  	{
	    $all_data_ev['all_events']=$this->Friend->get_all_events();
	    if ($this->session->userdata('id') === null) {
		$this->load->view('friends/partials/header1');
	    $this->load->view('friends/title_events', $all_data_ev);
	    $this->load->view('friends/partials/footer');
		} else {
	    $this->load->view('friends/partials/header');
	    $this->load->view('friends/title_events', $all_data_ev);
	    $this->load->view('friends/partials/footer');
		}
	}
   	public function get_event()
  	{
  		$event_id=$this->input->post('event_id');
	    $the_data_ev['the_events']=$this->Friend->get_the_events($event_id);
	    $this->load->view('friends/partials/header');
	    $this->load->view('friends/events', $the_data_ev);
	    $this->load->view('friends/partials/footer');
  	
  }

}