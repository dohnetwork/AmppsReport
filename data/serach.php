<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;
    $strddlSelect = null;
	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
	if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Jan") 
	{
		echo  "selected";
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">

<tr>   


	<select name="ddlSelect" id="ddlSelect">
          <option>- Select -</option>
	 <option value="Jan" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Jan") echo "selected"; ?>>มกราคม </option>
	 <option value="Feb" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Feb") echo "selected"; ?>>ุมภาพันธ์ </option>
	<option value="Mar" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Mar") echo "selected"; ?>>   มีนาคม   </option>
	<option value="Apr" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Apr") echo "selected"; ?>>   เมษายน   </option>
	<option value="May" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "May") echo "selected"; ?>>   พฤษภาคม   </option>
	<option value="Jun" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Jun") echo "selected"; ?>>   มิถุนายน   </option>
          <option value="Jul" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Jul") echo "selected"; ?>>   กรกฏาคม   </option>
          <option value="Aug" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Aug") echo "selected"; ?>>   สิงหาคม   </option>
          <option value="Sep" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Sep") echo "selected"; ?>> กันยายน </option>
          <option value="Oct" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Oct") echo "selected"; ?>> ตุลาคม   </option>
          <option value="Nov" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Nov") echo "selected"; ?>>พฤศจิกายน </option>
          <option value="Dec" <?if(isset($_POST["ddlSelect"]) && $_POST["ddlSelect"]  == "Dec") echo "selected"; ?>> ธันวาคม   </option>
 		</select>


        <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>




<?php

   $serverName = "172.16.1.212";
   $userName = "root";
   $userPassword = "camel";
   $dbName = "test";

$conn = new mysqli($serverName, $userName, $userPassword, $dbName);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	
   $sql = "SELECT * FROM customer WHERE Name LIKE '%".$strKeyword."%' ";

   $query = mysqli_query($conn,$sql);

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["CustomerID"];?></div></td>
    <td><?php echo $result["Name"];?></td>
    <td><?php echo $result["Email"];?></td>
    <td><div align="center"><?php echo $result["CountryCode"];?></div></td>
    <td align="right"><?php echo $result["Budget"];?></td>
    <td align="right"><?php echo $result["Used"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>
