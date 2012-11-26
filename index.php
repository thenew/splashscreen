<?php
include dirname(__FILE__).'/inc/register.php';
include dirname(__FILE__).'/inc/tpl/header.php';
?>
<header class="header">
    <div class="v-wrapper">
        <h1 class="logo">Splashsreen</h1>
        <p class="description">Splashsreen is a PHP starter splash page. Perfect to reveal projects in their early phases and to gather emails of future users.</p>
    </div>
</header>
<div class="container">
    <div class="v-wrapper">
        <form action="" method="post" class="splash-form">
            <?php if($splash_log): ?>
                <div class="splash-form-feedback">
                    <?php echo $splash_log; ?>
                </div>
            <?php endif; ?>
            <div class="box splash-email">
                <label for="splash_email">Email</label>
                <input type="text" name="splash_email" class="spash-email-form" value="hello@thenew.fr" />
            </div>
            <div class="box splash-spam">
                <label for="splash_spam">Leave us your email to get the latest news.</label>
                <div class="wrap">
                    <input type="email" name="splash_spam" class="splash-spam-input trans-color" placeholder="john@doe.com" tabindex="1" required />
                    <button type="submit" class="submit trans-all" tabindex="2">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include dirname(__FILE__).'/inc/tpl/footer.php';
