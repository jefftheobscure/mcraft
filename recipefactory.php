<?php
//look at input button type
//recursive input creation function
echo "<tr>
  	<td>
  	Enter Step</td> <td><input type=\"text\" name=\"r1\" size=<?php echo \"\" $rsteplimit \"\" ?>></td>
  	<td>
  	<input type=\"button\" onChange=\"ajaxFunction();\" value=\"+\">
  	</td>
  	</tr> ";
?>
