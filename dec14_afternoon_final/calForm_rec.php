<?

?>



<form id="form1" name="form1" method="post" action="calendar_rec.php?month=&day=&year=&v=1">
  <table cellpadding="0" cellspacing="0" class="tableClass">
    <tr>
      <td width="142">Event Name</td>
      <td width="146"><div align="left">
        <input type="text" name="calName" id="calName" onKeyup="checkFilled();">
      </div></td>
    </tr>
    <tr>
      <td rowspan="2">Event Desc</td>
      <td><div align="left">
        <textarea name="calDesc" id="calDesc" cols="15" rows="5" onKeyDown="remChars(this, document.form1.txtCount, 200);"
							onKeyUp="remChars(this, document.form1.txtCount, 200);checkFilled();"></textarea>
        <br/>
      </div></td>
    </tr>
    <tr>
      <td>You have
        <input readonly name="txtCount" type="text" id="txtCount" value="200" size="4" maxlength="3">
characters left!</td>
    </tr>
    <tr>
      <td>Event Date</td>
      <td><div align="left">
      
      <?
      
      $month="$kanthmonth"."/"."$kanthday"."/"."$kanthyear";
      
      ?>
        <input type="text" name="calDate" id="calDate" value="<? echo $month?>" readonly>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="Submit" id="Submit" value="Submit" disabled></td>
    </tr>
  </table>
</form>