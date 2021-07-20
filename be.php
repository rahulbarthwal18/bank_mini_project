
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
    <h2>Balance Enquiry </h2>
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
    <td colspan="2"><input type="submit" name="submit" id="submit"  value="Show Balance"></td>
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
$q="select * from account where acno='$ac' && pin='$p'";
$rs=mysqli_query($con,$q);
$x=mysqli_num_rows($rs);
$r=mysqli_fetch_array($rs);
$camt=$r['camt'];
if($x>0)
{

        echo "<h3> Your Current blance is = $camt</h3>";
    

}
else
echo "<h3>Invlaid Account or Pin<h3>";
}
?>