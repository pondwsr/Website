<html>
<head>

<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title></title>
</head>
<body>
<style>
body{
	
	background-image:url(img/bg.jpg);
	background-repeat:;
	font-family: 'Kanit', sans-serif;
	}
	table {
		box-shadow: 5px 5px 10px #F00;
		}
</style>
<!---------------------------------->
&nbsp;
<div class="container-fluid">
<div class="row">
<div align="right">
<button class="btn-danger"><a href="logout.php"><font color="#FFFFFF">Logout</font></a></button>
</div>
</div>
<?php
error_reporting(0);
ini_set('display_errors', 0);
$objConnect = mysqli_connect("localhost","root","03112541") or die("Error To Conect DTB");
$objDB = mysqli_select_db($objConnect,"test");

//Add //
if($_POST["hdnCmd"] == "Add")
{
	$strSQL = "INSERT INTO customer";
	$strSQL .="(CustomerID,Name,Tel,List,Price,Total) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddCustomerID"]."','".$_POST["txtAddName"]."' ";
	$strSQL .=",'".$_POST["txtAddTel"]."' ";
	$strSQL .=",'".$_POST["txtAddList"]."','".$_POST["txtAddPrice"]."' ";
	$strSQL .=",'".$_POST["txtAddTotal"]."') ";
	$objQuery = mysqli_query($objConnect,$strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysqli_error($objConnect)."]";
	}

}

//Update//

if($_POST["hdnCmd"] == "Update")
{
	$strSQL = "UPDATE customer SET ";
	$strSQL .="CustomerID = '".$_POST["txtEditCustomerID"]."' ";
	$strSQL .=",Name = '".$_POST["txtEditName"]."' ";
	$strSQL .=",Tel = '".$_POST["txtEditTel"]."' ";
	$strSQL .=",List = '".$_POST["txtEditList"]."' ";
	$strSQL .=",Price = '".$_POST["txtEditPrice"]."' ";
	$strSQL .=",Total = '".$_POST["txtEditTotal"]."' ";
	$strSQL .="WHERE CustomerID = '".$_POST["hdnEditCustomerID"]."' ";
	$objQuery = mysqli_query($objConnect,$strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysqli_error($objConnect)."]";
	}
	
}

//Delete//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM customer ";
	$strSQL .="WHERE CustomerID = '".$_GET["CusID"]."' ";
	$objQuery = mysqli_query($objConnect,$strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysqli_error($objConnect)."]";
	}
	
}

$strSQL = "SELECT * FROM customer";
$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
?>
<form name="frmMain" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<div align="center">
<img width="200" src="img/book.png">
<h3><b>ระบบจัดการหนังสือ</b></h3>
<table class="table-responsive-sm table table-hover table-dark" width="100%" border="1">
 <thead class="thead-dark">
  <tr>
    <th width="20"> <div align="center">ิรหัสหนังสือ</div></th>
    <th width="50"> <div align="center">หมวดหมู่</div></th>
    <th width="20"> <div align="center">ชื่อหนังสือ</div></th>
    <th width="20"> <div align="center">ปีที่ตีพิมพ์</div></th>
    <th width="59"> <div align="center">ผู้แต่ง</div></th>
    <th width="71"> <div align="center">ราคา</div></th>
    <th width="40"> <div align="center">แก้ไข</div></th>
    <th width="30"> <div align="center">ลบ</div></th>
    </thead>
  </tr>
  </div>
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>

  <?php
	if($objResult["CustomerID"] == $_GET["CusID"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
    <td><div align="center">
		<input type="text" name="txtEditCustomerID" size="5" value="<?php echo $objResult["CustomerID"];?>">
		<input type="hidden" name="hdnEditCustomerID" size="5" value="<?php echo $objResult["CustomerID"];?>">
	</div></td>
    <td><input type="text" name="txtEditName" size="20" value="<?php echo $objResult["Name"];?>"></td>
    <td><input type="text" name="txtEditTel" size="50" value="<?php echo $objResult["Tel"];?>"></td>
    <td><div align="center"><input type="text" name="txtEditList" size="2" value="<?php echo $objResult["List"];?>"></div></td>
    <td align="right"><input type="text" name="txtEditPrice" size="5" value="<?php echo $objResult["Price"];?>"></td>
    <td align="right"><input type="text" name="txtEditTotal" size="5" value="<?php echo $objResult["Total"];?>"></td>
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">
	  <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>';">
    </div></td>
  </tr>
  <?php
	}
  else
	{
  ?>
  <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Tel"];?></td>
    <td><div align="center"><?php echo $objResult["List"];?></div></td>
    <td align="right"><?php echo $objResult["Price"];?></td>
    <td align="right"><?php echo $objResult["Total"];?></td>
    <td align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?php echo $objResult["CustomerID"];?>">Edit</a></td>
	<td align="center"><a href="JavaScript:if(confirm('ลบรายการนี้ใช่หรือไม่?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?php echo $objResult["CustomerID"];?>';}">Delete</a></td>
  </tr>
  <?php
	}
  ?>
<?php
}
?>
  <tr>
    <td><div align="center"><input type="text" name="txtAddCustomerID" size="5"></div></td>
    <td><input type="text" name="txtAddName" size="20"></td>
    <td><input type="text" name="txtAddTel" size="20"></td>
    <td><div align="center"><input type="text" name="txtAddList" size="2"></div></td>
    <td align="right"><input type="text" name="txtAddPrice" size="5"></td>
    <td align="right"><input type="text" name="txtAddTotal" size="5"></td>
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">
    </div></td>
  </tr>
</table>
</form>
<?php
mysqli_close($objConnect);
?>
<!------------------------------------>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>