<?php

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

  $name = $_POST['txt_name'];
  $uname = $_POST['txt_uname'];
  $email = $_POST['txt_email'];
  $tablename = $wpdb->prefix."customplugin";

  if($name != '' && $uname != '' && $email != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(name,username,email) values('".$name."','".$uname."','".$email."') ";
       $wpdb->query($insert_sql);
       echo "Save sucessfully.";
     }
   }
}

?>
<h1>Add New Comment</h1>
<form method='post' action=''>
  <table>
    <tr>
      <td>Name</td>
      <td><input type='text' name='txt_name'></td>
    </tr>
    <tr>
     <td>Username</td>
     <td><input type='text' name='txt_uname'></td>
    </tr>
    <tr>
     <td>Email</td>
     <td><input type='text' name='txt_email'></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input type='submit' name='but_submit' value='Submit'></td>
    </tr>
 </table>
</form>