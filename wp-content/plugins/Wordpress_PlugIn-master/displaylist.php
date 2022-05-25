<?php

global $wpdb;
$tablename = $wpdb->prefix."customplugin";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All coments</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>S.no</th>
   <th>Name</th>
   <th>Username</th>
   <th>Email</th>
   <th>&nbsp;</th>
  </tr>
  <?php
  // Select records
  $comments = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($comments) > 0){
    $count = 1;
    foreach($comments as $comment){
      $id = $comment->id;
      $name = $comment->name;
      $uname = $comment->username;
      $email = $comment->email;

      echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$uname."</td>
      <td>".$email."</td>
      <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>
   No coments found.
   </td></tr>";
 }
?>
</table>