
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
    <h2>Account Summary</h2>
    <form>
    <table  cellpadding="5" cellspacing="5" style="font-size:15px;font-weight:bold;">
    <tr>
    <td>Account Number</td>
    <td><input type="text" name="ac" id="ac"></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit"  value="Check"></td>
    </tr>
    </table>
    </form>
    </center>
    </div>    
    <div  class="row"><center>
        <table border="2px" cellspacing="10" cellpadding="5" style="width:900px;">
        <?php  
            include('conn.php');
            if(isset($_REQUEST['submit']))
            { 
                $ac=$_REQUEST['ac'];
                $q="select * from trans where acno='$ac'";
                $rs=mysqli_query($con,$q)or die("Could not execute ".mysqli_error($con));
                if($rs>0)
                {
                    while( $r=mysqli_fetch_array($rs)) 
                        
                            {
        ?>
            <tr style="background-color:cyan;">
            <td  style="font-weight:bold;">Transaction id</td>
            <td style="font-weight:bold;">Account number</td>
            <td style="font-weight:bold;">Date</td>
            <td style="font-weight:bold;">Amount</td>
            <td style="font-weight:bold;">Description</td>
            </tr>
            <tr>
            <td> <?php echo "$r[0]"; ?> </td>
            <td> <?php echo "$r[1]"; ?> </td>
            <td> <?php echo "$r[2]"; ?> </td>
            <td> <?php echo "$r[3]"; ?> </td>
            <td> <?php echo "$r[4]"; ?> </td>
            </tr>

        <?php 
            } 
                 }
                 else
                    echo "<h3>Invalid account number</h3>";
                }    
                else
                    echo "<h3>Not able to check try again</h3>";
                 
        ?>    
        </table></center>
    </div>
 </div>     
</body>
</html>