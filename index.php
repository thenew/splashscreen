<?php
include dirname(__FILE__).'/inc/register.php';
include dirname(__FILE__).'/inc/tpl/header.php';
?>
<div>
    <?php if($splash_log) echo $splash_log; ?>
    <form action="" method="post" class="splash-form">
        <input type="email" name="splash_email" value="hello@thenew.fr" required />
        <input type="email" name="splash_spam" required />
        <button type="submit">OK</button>
    </form>
</div>
<?php
include dirname(__FILE__).'/inc/tpl/footer.php';
