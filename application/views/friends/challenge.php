<div style="margin-top: 110px; " class="container">
    <div style="background-color:  #AACACD; color: white; padding: 25px; border-radius: 15px; margin: 15px;" class=" col-md-4 ">
      <h3><?php echo $this->session->userdata('first_name'); ?></h3>
        <form role="form" method="post" action="add_post">
            <div class="form-group">
                <input type="text" placeholder="The Title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" placeholder="your post" name="posty" class="form-control" style="height: 300px;"></textarea>
            </div>
            <input type='radio' name='public_private' value=0>
              <label>Public</label>
            <input type='radio'name='public_private' value=1>
              <label>Private</label>
            <input type="submit" value=" Add " class="btn btn-default" id="bt-add">
        </form>
    </div>
    <!-- add post + title -->
    <div style="background-color:  #AACACD; color:  #588d8d; padding: 25px; border-radius: 15px; margin: 15px;" class="col-md-7 ">
    <?php
    $user_id=$this->session->userdata('id');
    $user_admin=$this->session->userdata('admin');
     if($all_post){
     foreach ($all_post as $value)
     {
      echo "<hr>";
     ?>
<div style="background-color: #dfebec; border-radius: 10px; padding: 10px;">
     <!-- delete the post if this post for you or you are admin -->
     <div style="text-align: right;">
    <form method="post" action="<?php echo base_url('friends/delete_post'); ?>">
        <input name="post_id" type="hidden" value="<?php echo $value['post_id']; ?>">
        <input class="btn btn-default" type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete post"  >
    </form>
    </div>
    <div class='row'>
      <div class='col-xs-4' style="text-align: center;">
    <!-- print all the titles with author of Post -->
    <img style="width: 50%; margin-top: -20px;" class="img-circle img-thumbnail" src="/assets/images/profile/default.jpg" alt="Profile image example"/>
    <h3 style="margin-top: 0;"><?php echo $value['first_name'];?></h3>
    <form action='friend_profile' method='post'>
        <input type='hidden' name='profile_id' value='<?php echo $value['user_id'] ?>'>
        <input type='submit' value='View profile' class='btn btn-default '> 
    </form>
    <br>
    <p><?php echo $value['pos_time']; ?></p>
    </div>
    <div class='col-xs-8'>
    <form style="display: inline;" method="post" action="<?php echo base_url('all_comm'); ?>">
      <input type="hidden" name="post_id" value="<?php  echo $value['post_id']; ?>" >
      <input type="hidden" name="post" value="<?php echo $value['post']; ?>" >
        <h4><?php echo $value['post_title']; ?></h4>
        <p style="display:block;text-overflow: ellipsis; width: 200px; overflow: hidden; white-space: nowrap;"><?php echo $value['post']; ?>
        </p>
      <input class="btn btn-info" type="submit" value="See the post">
    </form>
    
     </div>
</div>
</div>


    <?php
    }
    }
    ?>

  </div>


