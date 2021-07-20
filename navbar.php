<html>
<head>
    <link href="mybt/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="mybt/dist/umd/popper.min.js"></script>
	<script src="mybt/dist/js/bootstrap.min.js" ></script>
    <style>
    #nav tr td:hover{
        color:#b22222;
        display:block;
        font-weight:bold;
        text-decoration:underline;
    }
    #nav tr td a{
        text-decoration:none;
        color:white;
    }
    
    </style>
</head>
<body>
    <!-----Head section------>
    <div class="row" style="background-color:#ffbf80;">
        <div class="col-md-4">
            <img src="banklogo.png" alt="logo" style="width:130px;height:100px;">
        </div>
        <div class="col-md-8">
            <h1 style="font-family:Calibri;">My Personal Bank</h1>
            <h3 style="font-family:Calibri;"><i>~"Bank at your door step"</i></h3>
        </div>
    </div>
<!----------nav section------->
    <div class="row">
        <table id="nav" style="width:99%;background-color:#b22222;color:white;height:50px;font-size:20px;" cellpadding="15">
        <tr>
        <td><a href="bank.php">Home</a></td>
        <td><a href="">About</a></td>
        <td><a href="cr.php">Create Account</a></td>
        <td><a href="wi.php">Withdraw</a></td>
        <td><a href="be.php">Balance Enquiry</a></td>
        <td><a href="dp.php">Deposit</a></td>
        <td><a href="ft.php">Fund Transfer</a></td>
        <td><a href="pn.php">Pin Change</a></td>
        <td><a href="as.php">Account Summary</a></td>
        </tr>
        </table>
    </div>
</body>
</html>