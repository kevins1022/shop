
<form action="dologin.php" method="post">
    <input type="text" name="username"/>
    <br>
    <input type="text" name="password"/>
    <br/>
    <input type="text" name="verify" />
    <br/>
    <img src="getVerify.php" alt=""/>
    <br/>
    <input type="hidden" name="autoFlag" value="1"/>
    <input type="submit" value="submit"/>
</form>
<?php

?>