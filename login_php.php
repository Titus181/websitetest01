<?php
	header('Content-Type: text/html; charset=utf8');
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	require("conn_mysql.php");
	$sql_query_login="SELECT * FROM employee where username='$username' AND password='$password'";
	$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
	if(mysqli_num_rows($result1)){
		$sql_query="SELECT * FROM books";
		$result=mysqli_query($db_link,$sql_query);
		echo "<table border=1 width=400 cellpadding=5>";
		echo "<tr>
			<td>書籍編號</td>
			<td>書籍名稱</td>
			<td>負責員工編號</td>
			<td>價錢</td>
		      </tr>";
		while($row=mysqli_fetch_array($result)){
			
			echo "<tr>
				<td>$row[0]</td> 
				<td>$row[1]</td>
				<td>$row[2]</td>
				<td>$row[3]</td>
			      </tr>";
		
			
		}
		echo"</table>";
	}else{
		echo"登入失敗";
	}
	
	
?>