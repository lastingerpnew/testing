<div class="x_content">

	
	
	
	<p class="text-muted font-13 m-b-30"></p> 
		     
<h2>Contact list</h2>
<?php

 $chat_id =  $this->uri->segment(3);
      $user_id = $this->session->userdata('user_id');
?>

 
    <?php
	

    $no = 0;
    $logged_status = 0;
    foreach ($record->result() as $r) {
	    $no++;
	

        if ($r->is_logged_in == 1) {
            $logged_status = '<b>Online</b>';
        } else {
            $logged_status = 'Offline';
        }
		
		// echo "<tr><td>". anchor('chat/redirect/'.$this->session->userdata('user_id').'/'.$r->id, 'Chat', ['class' => 'btn btn-primary btn-sm']) ."</td></tr>";
		
        echo "<p>". $logged_status .'<b>' .anchor('chat/redirect/'.$this->session->userdata('user_id').'/'.$r->id, $r->name.'</b>' ). "</p>";
    }
    ?>
  

<?php
 $chat_with = $this->session->userdata('target_id');

$resulttt = $this->user->getOne($chat_with)->row_array();
$chat_with_name = $resulttt['name'];
?>

 <div class="x_content">
<h1><?php echo $chat_with_name; ?></h1>
<table border="1" width="100%">
  <tr>
    <!-- td 1 -->
    <td>
      <div id="chat_viewport">

      </div>
    </td>
    
    <!--td align="center">
      <div id="container">
        <div id="remotesVideos"></div>
        <video autoplay="true" id="localVideo"></video>
      </div>
    </td-->
 </tr>
  <tr>
    <!-- td 1 -->   
    <td>
      <div id="chat_input" class="col-md-12">
        <!-- <input type="text" name="chat_message" id="chat_message" value="" tabindex="1" /> -->
        <input type="text" name="chat_message" id="chat_message"  />
        <?php echo anchor('#', 'Enter', array('title' => 'Send this chat message', 'id' => 'submit_message', 'class' => 'btn btn-default btn-sm')); ?>
        <div class="clearer"></div>
      </div>
   
      <?php
	  
        echo form_open_multipart('chat/index/'.$this->uri->segment(3));
      ?>
      
      <input type="file" name="userfile" class="form-control"/>
	  <br/>
	  <input type="submit" name="submit" value="Upload" class="btn btn-success btn-sm" />
      <?php echo form_close(); ?>
    </td>
  </tr>
</table>

</div>
</div>

 <script type="text/javascript">
	
      var chat_id = "<?php echo $chat_id; ?>";
      var user_id = "<?php echo $user_id; ?>";
	var base_url = '<?php echo base_url() ?>';

    </script>