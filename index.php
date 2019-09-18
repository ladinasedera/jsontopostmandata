<?php 


//JSON Validator function
function is_valid_json($json_data=NULL) 
{
  	if (!empty($json_data)) 
  	{
        @json_decode($json_data);
        return (json_last_error() === JSON_ERROR_NONE);
    }
    return false;
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>CHANGE JSON TO POSTMAN DATA</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="https://milankyncl.github.io/jquery-copy-to-clipboard/jquery.copy-to-clipboard.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('#postman').CopyToClipboard();
		});
	</script>
</head>
<body >
<pre>
	<center>
		 ___________________________________________
		|                                           |
		| JSON DATA TO POSTMAN PARAM                |
		|      github.com/ladina/jsontopostman 2019 |
		|___________________________________________|
	</center>

<div style="display: inline;">
<b>Result:</b> <button data-clipboard-target="#postman">Copy Result To Clipboard</button>
</div>

<div style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;" id="postman">
<?php

			if (!isset($_GET['json']) ||  !$_GET['json']) 
			{
				die('Required param : json');
			}

			$json   = trim($_GET['json']);
			$output = '';
			if (is_valid_json($json)) 
			{
				$toarray = json_decode($json,true);
				foreach ($toarray as $key => $value) 
				{
					$output .= "$key:$value\n";
				}
echo htmlentities(trim($output));
			}
			else
			{
				die('Invalid Json Data : '.$json);
			}

?>
<br>
</div>
</pre>
</body>
</html>
