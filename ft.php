
<html>
<head>
    <link href="mybt/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="mybt/dist/umd/popper.min.js"></script>
	<script src="mybt/dist/js/bootstrap.min.js" ></script>
    <style>
    #submit{
        color:black;
        font-weight:bold;
        background-color:#90ee90;
    }
    #submit:hover{
        background-color:yellow;
        color:green;
    }
    </style>

</head>
<body>
<div>
<?php include_once('navbar.php'); ?>  
<!----Data section--------->
    <div class="row" style="margin-left:15px;margin-right:15px;background-color:#ffffbf;height:450px;">
    <center>
    <h2>Fund Transfer </h2>
    <form>
    <table  cellpadding="5" cellspacing="5" style="font-size:15px;font-weight:bold;">
    <tr>
    <td>Account Number</td>
    <td><input type="text" name="ac" id="p"></td>
    </tr>
    
    <tr>
    <td>Pin</td>
    <td><input type="password" name="p" id="p"></td>
    </tr>
    <tr>
    <td>Amount to Withdraw</td>
    <td><input type="text" name="w" id="w"></td>
    </tr>
    <tr>
    <td>Benificiary Account</td>
    <td><input type="text" name="tac" id="p"></td>
    </tr>
    
  
    <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" value="Transfer"></td>
    </tr>
    </table>
    </form>
    </center>
    </div>    
 </div>     
</body>
</html>

<?php 
include('conn.php');

if(isset($_REQUEST['submit'])){
    $ac=$_REQUEST['ac'];

    $p=$_REQUEST['p'];
    $amt=$_REQUEST['w'];
    $tac=$_REQUEST['tac'];
 $q="select * from account where acno='$ac' && pin='$p'";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);
$r=mysqli_fetch_array($rs);
$camt=$r['camt'];
if($x>0)
{
    if($camt>=$amt)
    {
        $q="select * from account where acno='$tac'";
        $rs1=mysqli_query($con,$q);
        $x1=mysqli_num_rows($rs1);
        $r1=mysqli_fetch_array($rs1);
        $tamt=$r1['camt'];
        if($x1>0)
{
        $camt=$camt-$amt;
        $tamt=$tamt+$amt;
        $q="update account set camt='$camt' where acno='$ac'";
        mysqli_query($con,$q);
        $d=date('d-m-y');
        $t=date('h:i:s');
        $dt=$d.$t;
        $q="insert into trans(acno,dt,amount,desr) values('$ac','$dt','$amt','withdraw')";
        mysqli_query($con,$q);
        $q="update account set camt='$tamt' where acno='$tac'";
        mysqli_query($con,$q);
        $s=date('d-m-y');
        $t=date('h:i:s');
        $dt=$d.$t;
        $q="insert into trans(acno,dt,amount,desr) values('$tac','$dt','$amt','credited')";
        mysqli_query($con,$q);
        
        echo "<h3>Afeter Transfer  $amt Your Current blance is = $camt</h3>";
}
else
echo "<h3>Invlaid Benificary Account </h3>";
    }
    else
    echo "<h3>Invsufficient balance</h3>";
}
else
echo "<h3>Invlaid Account or Pin<h3>";
}
?>