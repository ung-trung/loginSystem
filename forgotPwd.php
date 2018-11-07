<?php
require "header.php";
?>
<main>
    <div>
        <section>
            <h1>Reset your password</h1>    
            <form action='includes/forgotPwd.inc.php' method='POST'>
                <input type='text' name='mail' placeholder='E-mail'>              
                <button type='submit' name='forgotPwd'>Reset your password</button>
            </form>
        </section>
    </div>

</main>
<?php
require "footer.php";
?>