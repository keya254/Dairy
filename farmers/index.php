<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<h1>Farmers</h1>
<? 
if(isset($_GET['delete'])){
$f_no = (int) $_GET['id']; 
mysql_query("DELETE FROM `farmers` WHERE `f_no` = '$f_no' ",$conn) ; 
echo (mysql_affected_rows($conn)) ? "farmer deleted.<br /> " : "Nothing deleted.<br /> ";
}
?> 
<a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>Add Farmer</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
        <th>Farmer NO:</th>
        <th>Name:</th>
        <th>Locality</th>
        <th>Account No:</th>
        <th>Phone No:</th>
        <th style="text-align: center">Tasks</th>
        </thead>
    <tbody>
  <?php

$qry=  mysql_query("select * from farmers",$conn) or die("unable to fetch records".  mysql_error());
$i=0;
while($row=  mysql_fetch_array($qry))
{
    foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
    $i+=1;
    echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['f_no'].'</td>';
        echo '<td>'.$row['f_name'].'</td>';
        echo '<td>'.$row['f_locallity'].'</td>';
        echo '<td>'.$row['f_ac'].'</td>';
        echo '<td>'.$row['f_phone'].'</td>';
        echo '<td  style="text-align: center">
                <a href="'.PAGE_URL.'farmers/edit.php?edit=1&id='.$row['f_no'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="'.PAGE_URL.'farmers/?delete=1&id='.$row['f_no'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';

    echo '</tr>';
}
?>
</tbody>
</table>


<?php 
include '../incl/footer.incl.php';
?>