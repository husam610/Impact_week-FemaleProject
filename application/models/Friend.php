<?php
class Friend extends CI_Model {
	public function validate_registration($post)
	{
		$this->form_validation->set_data($post);
		
		//----------------first name validation-------
		$this->form_validation->set_rules('first_name', $post['first_name'], 'trim|required|alpha', 
			array('required'=>'Please fill in First Name field!', 
			'alpha'=>'No numbers please!'));
		//----------------last name validation-------
		$this->form_validation->set_rules('last_name', $post['last_name'], 'trim|required|alpha', 
			array('required'=>'Please fill in Last Name field!', 
			'alpha'=>'No numbers please!'));
		//-----------------valid_email----------------------
		$this->form_validation->set_rules('email', $post['email'], 'trim|required|valid_email|is_unique[users.email]', 
			array('required'=>'Please fill in Email field!', 
			'valid_email'=>'Please check if your email is correct (includes @, . etc)', 'is_unique'=>'This email already exists'));
		//--------------password length validation----------------
		$this->form_validation->set_rules('password', $post['password'], 'trim|required|min_length[8]', 
			array('required'=>'Please fill in Password field!', 
			'min_length'=>'Your password should contain at least 8 characters'));
		//-----------confirm password validation-------------------
		$this->form_validation->set_rules('confirm_password', $post['confirm_password'], 'trim|required|matches[password]', 
			array('required'=>'Please fill in Confirm Password field!', 
			'matches'=>'You entered different passwords'));

		if ($this->form_validation->run())
		{
			return "valid";
		}
	}

	//---------------Login validation (optional)------------
		public function validate_login($post)
	{
		$this->form_validation->set_data($post);
		$this->session->unset_userdata('error_email_log');
		$this->session->unset_userdata('error_pass_log');
		$email = $post['email_log'];
		$query = $this->db->query("SELECT user_id FROM users WHERE email='{$email}'");
		$id_check = $query->row();

		if (!isset($id_check)) {
			$this->session->set_userdata('error_email_log', 'Please, register first');
		} else {
			$query = $this->db->query("SELECT password FROM users WHERE email='{$email}'");
			$pass = $query->row();
			$query = $this->db->query("SELECT salt FROM users WHERE email='{$email}'");
			$salt = $query->row();
			if ($pass->password != md5($post['password_log'] . $salt->salt)) {
				$this->session->set_userdata('email_log', $post['email_log']);
				$this->session->set_userdata('error_pass_log', 'User/password combination is incorrect');

			} else {
				$query = $this->db->query("SELECT * FROM users WHERE email='{$email}'");
				foreach ($query->result_array() as $row) {
					$fn = $row['first_name'];
					$ln = $row['last_name'];
					$em = $row['email'];
					$id = $row['user_id'];
					$admin = $row['user_admin'];
				}
				$this->session->set_userdata('first_name', $fn);
				$this->session->set_userdata('last_name', $ln);
				$this->session->set_userdata('email', $em);
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('admin', $admin);
				return "valid";
			}
		}
	}

	public function get_all_emails_normal()
  	{
	    return $this->db->query("
	    SELECT
	    users.user_id,
	    users.user_admin,
	    users.first_name,
	    users.email
	    from users
	    WHERE user_admin=0
	    ORDER BY email DESC 
	    ")->result_array();
  	}
  	public function get_all_emails_admin()
  	{
	    return $this->db->query("
	    SELECT
	    users.user_id,
	    users.user_admin,
	    users.first_name,
	    users.email
	    from users
	    WHERE user_admin=1
	    ORDER BY email DESC 
	    ")->result_array();
  	}
  	public function make_admin($id)
  	{
  		$this->db->query("
            UPDATE users
            SET users.user_admin = 1 
            WHERE user_id = $id ;
      ");
  	}
  	public function remove_admin($id)
  	{
  		$this->db->query("
            UPDATE users
            SET users.user_admin = 0 
            WHERE user_id = $id ;
      ");
  	}

	//-------------insert user------------------
		public function insert_user($post)
	{
		$this->form_validation->set_data($post);
		$query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$values = [$post['first_name'], $post['last_name'], $post['email'], md5($post['password'] . $salt), $salt,
		date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")];
		$this->db->query($query, $values);
	}

	public function get_all_users()
	{	
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email!=', 'admin@example.com');
		$this->db->order_by("user_id", "desc");
		return $this->db->get()->result_array();
	}
	public function get_users($post)
	{	
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email!=', 'admin@example.com');
		if ($post['first_name'] != '')
		{
			$this->db->where('first_name', $post['first_name']);
		}
		if ($post['last_name'] !== '')
		{
			$this->db->where('last_name', $post['last_name']);
		}
		if ($post['city_id'] !== '5')
		{
			$this->db->where('city_id', $post['city_id']);
		}
		if ($post['industry_id'] !== '25')
		{
			$this->db->where('industry_id', $post['industry_id']);
		}
		if (isset($post['mentor_mentee']))
		{
			$this->db->where('mentor_mentee', $post['mentor_mentee']);
		}
		$this->db->order_by("user_id", "desc");
		return $this->db->get()->result_array();
	}


		public function friend_request($post)
	{	
		$query = "INSERT INTO requests (from_user, to_user) VALUES (?, ?)";
		$values = [$this->session->userdata('id'), $post['request_id']];
		$this->db->query($query, $values);
	}
	public function friend_profile()
	{	
		$query = "SELECT * FROM users LEFT JOIN cities ON users.city_id=cities.city_id LEFT JOIN industries ON users.industry_id=industries.industry_id WHERE user_id=?";
		$values = [$this->session->userdata('profile_id')];
		return $this->db->query($query, $values)->row_array();
	}
	public function get_friends()
	{	
		$query = "SELECT * FROM friends WHERE friends.user_id=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	
	public function get_req_sent()
	{	
		$query = "SELECT * FROM requests WHERE requests.from_user=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_req_rec()
	{	
		$query = "SELECT * FROM requests WHERE requests.to_user=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_my_friends()
	{	
		$query = "SELECT * FROM users JOIN friends ON 
		users.user_id = friends.friend_id WHERE friends.user_id=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_us_friends()
	{	
		$query = "SELECT * FROM users JOIN friends ON 
		users.user_id = friends.friend_id WHERE friends.user_id=?";
		$values = [$this->session->userdata('profile_id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_us_friends_id()
	{	
		$query = "SELECT * FROM users JOIN friends ON 
		users.user_id = friends.friend_id WHERE friends.user_id=?";
		$values = $this->session->set_userdata('friend_id');
		$this->session->userdata('friend_id');
		return $this->db->query($query, $values)->result_array();
	}
	public function get_request_received()
	{	
		$query = "SELECT * FROM users JOIN requests ON 
		users.user_id = requests.from_user WHERE requests.to_user=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_request_sent()
	{	
		$query = "SELECT * FROM users JOIN requests ON 
		users.user_id = requests.to_user WHERE requests.from_user=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function add_friend($post)
	{	
		
		$query ="SELECT from_user FROM requests WHERE requests_id=?";
		$values = [$post['requests_id']];
		$from_user = $this->db->query($query, $values)->row_array();

		$query = "INSERT INTO friends (user_id, friend_id) VALUES (?, ?)";
		
		$values = [$this->session->userdata('id'), $from_user['from_user']];
		$this->db->query($query, $values);

		$query = "INSERT INTO friends (friend_id, user_id) VALUES (?, ?)";
		$values = [$this->session->userdata('id'), $from_user['from_user']];
		$this->db->query($query, $values);

		$this->db->where('requests_id', $post['requests_id']);
		$this->db->delete('requests');
	}

	public function get_profile()
	{	
		$query = "SELECT * FROM users LEFT JOIN cities ON users.city_id=cities.city_id LEFT JOIN industries ON users.industry_id=industries.industry_id WHERE user_id=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}

	public function get_industries()
	{	
		$query = "SELECT * FROM industries ORDER BY industry ASC";
		return $this->db->query($query)->result_array();
	}

	public function get_cities()
	{	
		$query = "SELECT * FROM cities ORDER BY city_name ASC";
		return $this->db->query($query)->result_array();
	}

	public function validate_update($post)
	{
		$this->form_validation->set_data($post);
		
		//----------------first name validation-------
		$this->form_validation->set_rules('first_name', $post['first_name'], 'alpha', 
			array('alpha'=>'No numbers please!'));
		//----------------last name validation-------
		$this->form_validation->set_rules('last_name', $post['last_name'], 'alpha', 
			array('alpha'=>'No numbers please!'));
		//----------------phone number validation-------
		$this->form_validation->set_rules('phone_number', $post['phone_number'], 'numeric', 
			array('numeric'=>'Use only numbers, please'));
		//----------------linkedin validation-------
		$this->form_validation->set_rules('linkedin', $post['linkedin'], 'valid_url', 
			array('valid_url'=>'Please enter valid url'));
		if ($this->form_validation->run())
		{
			return "valid";
		}
	}

	public function update_user($post)
	{
		$data = array(
			'first_name' => $post['first_name'],
			'last_name' => $post['last_name'],
			'city_id' => $post['city_id'],
			'phone_number' => $post['phone_number'],
			'birth_date' => $post['birth_date'],
			'linkedin' => $post['linkedin'],
			'biography' => $post['biography'],
			'student_professional' => $post['student_professional'],
			'work_place' => $post['work_place'],
			'expertise' => $post['expertise'],
			'experience' => $post['experience'],
			'industry_id' => $post['industry_id'],
			'support_for' => $post['support_for'],
			'support' => $post['support'],
			'mentor_mentee' => $post['mentor_mentee'],
			'recruitment_no_yes' => $post['recruitment_no_yes']
		);
		$this->db->where('user_id', $this->session->userdata('id'));
		$this->db->update('users', $data);
	}

	public function add_post($post)
	{
   		$this->db->insert('posts', $post);
  	}

  	public function add_comm($com)
  	{
 		$this->db->insert('comments', $com);
  	}

  	public function get_all_posts()
  	{
  		if($this->session->userdata('id') !== NULL)
  		{
		    return $this->db->query("
		    SELECT
		    users.user_id,
		    users.user_admin,
		    users.first_name,
		    posts.post_id ,
		    posts.post_title,
		    posts.post,
		    posts.created_at AS pos_time ,
		    posts.updated_at AS pos_up_time
		    from users
		    join posts
		    on users.user_id = posts.user_id
		    ORDER BY pos_time DESC 
		    ")->result_array();
		} else {
			return $this->db->query("
		    SELECT
		    users.user_id,
		    users.user_admin,
		    users.first_name,
		    posts.post_id ,
		    posts.post_title,
		    posts.post,
		    posts.created_at AS pos_time ,
		    posts.updated_at AS pos_up_time
		    from users
		    join posts
		    on users.user_id = posts.user_id
		    WHERE public_private = 0
		    ORDER BY pos_time DESC 
		    ")->result_array();
		}
  	}

  	public function get_post($p_id)
  	{
	    return $this->db->query("
	    SELECT
	    users.user_id,
	    users.user_admin,
	    users.first_name,
	    users.last_name,
	    posts.post_id ,
	    posts.post_title,
	    posts.post,
	    posts.created_at AS pos_time ,
	    posts.updated_at AS pos_up_time
	    from users
	    join posts
	    on users.user_id = posts.user_id
	    WHERE posts.post_id = $p_id
	    ")->row_array();
  	}

  	public function get_all_comm($p_id)
  	{
	    return $this->db->query("
	    SELECT 
	    users.user_id,
	    users.first_name,
	    users.user_admin,
	    posts.post_title,
	    posts.post,
	    comments.comment_id,
	    comments.created_at AS comm_time ,
	    comments.comment
	    from comments
	    join posts on comments.post_id = posts.post_id
	    join users on comments.user_id = users.user_id
	    WHERE posts.post_id = $p_id
	    ORDER BY comm_time ASC ;
	    ")->result_array();
  	}
  
  	public function delete_comm($id)
  	{
      	$this->db->query("
        DELETE from comments
        WHERE comment_id = $id ;
     	");
    }
  	public function delete_post($id)
  	{
    	$this->db->query("
        DELETE from posts
        WHERE post_id = $id ;
    	");
  	}
  	public function add_event($event)
  	{
 		$this->db->insert('events', $event);
  	}
   	public function get_all_events()
  	{
	    return $this->db->query("
	    SELECT
	    event_id,
	    event_title,
	    event_description,
	    event_location,
	    event_datetime,
	    event_price
	    from events
	    ORDER BY event_datetime ASC 
	    ")->result_array();
  	}
   	public function get_the_events($id)
  	{
	    return $this->db->query("
	    SELECT
	    *
	    from events
	    WHERE event_id = $id
	    ")->result_array();
  	}
}