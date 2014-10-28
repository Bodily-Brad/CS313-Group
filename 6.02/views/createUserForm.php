<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create User</title>
    </head>
	
	<script>
		function checkPass() 
		{
			var pass = document.getElementById("pass").value;
			var digit = /\d+/.test(pass);
			
			if (digit && pass.length >= 7)
			{
				document.getElementById("warn1").style.visibility = "hidden";
			}
			else
			{
				document.getElementById("warn1").style.visibility = "visible";
			}
		}
		
		function checkCopy() 
		{
			var pass = document.getElementById("pass").value;
			var check = document.getElementById("check").value;
			
			if(check == pass)
			{
				document.getElementById("warn2").style.visibility = "hidden";
			}
			else
			{
				document.getElementById("warn2").style.visibility = "visible";
			}
		}
		
		function validate() 
		{
			var warn1 = document.getElementById("warn1").style.visibility;
			var warn2 = document.getElementById("warn2").style.visibility;
			
			if(warn1 == "hidden" && warn2 == "hidden")
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	</script>
	
    <body>
        <form  action="" method="POST" >
		<table>
			<tr>
				<td>Username: <input name="name"><br></td>
			 </tr>
			  <tr>
				<td>Password: <input type="password" name="pass" id="pass" onkeyup="checkPass()"><br></td>
				<td id="warn1" style="color:red">** Must be at least 7 characters and contain a number</td>
			  </tr>
			  <tr>
				<td>Re-enter Password: <input type="password" onkeyup="checkCopy()" name="check" id="check"><br></td>
				<td id="warn2" style="color:red">** Passwords do not match</td>
			  </tr>
			  <tr>
				<td><input type="submit" onclick="return validate();" value="Create"></td>
			  </tr>
		</table>
        </form>
    </body>
</html>
