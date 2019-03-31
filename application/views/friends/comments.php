 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style12.css">

<div class="container">
  <div class="first-container">
      <?php
          $user_id=$this->session->userdata('id');
    /*@*/ $user_admin=$this->session->userdata('admin');
        $post_id=$this->session->userdata('post_id');
        $post_main=$this->session->userdata('post_main');
        ?> 
          <div class="media">
            <div class="media-left">
              <a href="#">
                 <img class="media-object media-object-circle" src="/assets/images/profile/default.jpg" alt="Profile image example" height="70" width="70"/>
              </a>
            </div>
            <div class="media-body">
              <h3 class="media-heading">
             <?php echo $post['first_name'] . " " .  $post['last_name']?></h3>
          <h4><?php echo $post['post_title']?></h4>
          <p><?php echo $post_main ?></p>
          <hr>
           </div>
        </div> 
  </div>     
  <div class="comment-container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <form role="form" method="post" action="add_comm">
        <div class="form-group">
          <textarea type="text" name="comment" class="form-control"></textarea>
          <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        </div>
          <input type="hidden" name="user_id" value="<?php echo $user_id;  ?>">
          <input type="submit" value="Comment" class="btn btn-info btn-sm" id="btn1">
      </form>
      </div>
    </div>
  </div>
  <div class="display-comments">    
    <div class="row">
          <?php
    if($all_comm)
    {
      foreach ($all_comm as $value)
      { 
        ?>

  <div class="col-sm-3">

  </div>
  <div class="col-sm-9"> 
    <div class="media">
      <div class="media-left"> 
        <a href="#">
        <img class="media-object" src="/assets/images/profile/default.jpg" alt="Profile image example" height="70" width="70"/>
       </a>         
      </div>
      <div class="media-body">
        <h4 class="media-heading">
          <?php echo $value['first_name'] ?></h4>
            <p style="text-align:justify;"><?php echo $value['comment']?></p>
            <i id="time"><?php echo $value['comm_time']?></i>
        </div>
      </div>
          <form method="post" action="<?php echo base_url('friends/delete_comm'); ?>">
            <input name="comm_id" type="hidden" value="<?php echo $value['comment_id']; ?>">
            <input type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete"  class="btn btn-info btn-xs" id="btn1">
          </form>
      </div>
    </div>
  </div>
</div>
      </div>
      <br><br>
        <?php
        
        
      }
    }
  ?>
</div>


</div>
</div>
<br><br>




