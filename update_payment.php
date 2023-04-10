<?php
require('db.php');




if (isset($_REQUEST['payment'])) {

  $transaction_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);

  $update_query="update payment set transaction_id='$transaction_id',amount='$amount' where transaction_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Payment Area Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from payment where transaction_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>


<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE PAYMENT</h3>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">PAYMENT ID</label>
		<input type="text" name="id" value="<?php echo @$res['transaction_id'];?>" class="form-control">
		<label class="mt-3">AMOUNT</label>
		<input type="text" name="amount" value="<?php echo @$res['amount'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="payment">UPDATE</button>
	</form>
</div>