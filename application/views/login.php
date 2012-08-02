<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="<?php echo base_url()?>login/do_login">
            <fieldset>
                <label>Username:</label><input type="text" name="username"/><br/>
                <label>Password:</label><input type="password" name="password"/><br/>
                <span>&nbsp;</span><input type="submit"/>
            </fieldset>
        </form>
    </body>
</html>
