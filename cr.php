
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
    <h2>Create Account</h2>
    <form method="post">
    <table  cellpadding="5" cellspacing="5" style="font-size:15px;font-weight:bold;">
    <tr>
    <td>Pin</td>
    <td><input type="password" name="p" id="p"></td>
    </tr>
    <tr>
    <td>Name</td>
    <td><input type="text" name="n" id="n"></td>
    </tr>
    <tr>
    <td>Father name</td>
    <td><input type="text" name="fn" id="fn"></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="email" name="em" id="em"></td>
    </tr>
    <tr>
    <td>Phone no.</td>
    <td><input type="text" name="ph" id="ph"></td>
    </tr>
    <tr>
    <td>Country</td>
    <td><input type="text" name="c" id="c"></td>
    </tr>
    <tr>
    <td>State</td>
    <td><input type="text" name="st" id="st"></td>
    </tr>
    <tr>
    <td>City</td>
    <td><input type="text" name="ci" id="ci"></td>
    </tr>
    <tr>
    <td>Cash Amount</td>
    <td><input type="text" name="cm" id="cm"></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" value="Create" ></td>
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
    $p=$_REQUEST['p'];
    $n=$_REQUEST['n'];
    $fn=$_REQUEST['fn'];
    $em=$_REQUEST['em'];
    $ph=$_REQUEST['ph'];
    $c=$_REQUEST['c'];
    $st=$_REQUEST['st'];
    $ci=$_REQUEST['ci'];
    $cm=$_REQUEST['cm'];

    $ac="SBI";
    $q="select acno from account";
    $rs=mysqli_query($con,$q);
    $r=mysqli_num_rows($rs);
    if($r>0){
        $r++;
        $r=$r+100;
        $ac=$ac.$r;
    }else{
        $ac="SBI101";
    }

    $q1="INSERT INTO `account`(`acno`, `pin`, `name`, `fname`, `email`, `phone`, `country`, `state`, `city`, `camt`) VALUES ('$ac','$p','$n','$fn','$em','$ph','$c','$st','$ci','$cm')";
    $q2=mysqli_query($con,$q1);
    if($q2>0)
        header('location:bank.php');
    else
        echo "Account not created";    
}
?>