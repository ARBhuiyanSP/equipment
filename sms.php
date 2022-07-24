
			<!--sms send start-->
			<?php			
			
			function sendSms($number,$message)
			{   
				
				$posturl=file_get_contents("http://users.sendsmsbd.com/smsapi?api_key=R60002505a71cb1cc6de84.40113933&type=text&contacts=".$number."&senderid=8801847169884&msg=$message");
				die();
				return $posturl;
				
			}

			if($_POST['submit'])
			{ 
				$number=$_POST['number'];
			
				$message=trim($_POST['message']);
				
				$xml_result=sendSms($number,$message);
				if($xml_result=="GENERAL_ERROR")
					echo "<h3 style='color:red;'>Message Not Sent </h3>";
				else
				{
					$xml_array = simplexml_load_string($xml_result);   /// read xml
					$result=$xml_array->result;       ///result node
					if($result->status==0)
						echo "<h3 style='color:green;'>Message Sent Successfully </h3>";
					else
						echo "<h3 style='color:red;'>Message Not Sent  </h3>";
				}
					
			}
			
			?>

			<form action="sms.php" method="POST">
			To <br/>
			<input type="text" name="number" /><br/><br/>
			message<br/>
			<textarea type="text" name="message"></textarea><br/><br/>
			<input type="submit" name="submit" />

			<form>
            <!--sms send end-->
			
    