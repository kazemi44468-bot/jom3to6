<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

$app = Factory::getApplication();
$logo = (string) $this->params->get('logo');
$sitename = (string) $app->get('sitename');
$logo = $logo ?: 'images/joomla_black.png';
if (!preg_match('#^(https?:)?//#i', $logo) && $logo[0] !== '/') {
    $logo = $this->baseurl . '/' . ltrim($logo, '/');
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($this->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/css/offline.css">
    <?php if ($this->direction === 'rtl') : ?><link rel="stylesheet" href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/css/offline_rtl.css"><?php endif; ?>
</head>
<body>
<section id="intro"><header class="row"><div id="logo"><a href="#"><img src="<?php echo htmlspecialchars($logo, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>"></a></div></header>
<div id="main" class="row"><div class="twelve columns">
    <h1><?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php if ((int) $app->get('display_offline_message', 1) === 1 && trim((string) $app->get('offline_message')) !== '') : ?>
        <p><?php echo $app->get('offline_message'); ?></p>
    <?php elseif ((int) $app->get('display_offline_message', 1) === 2 && trim(Text::_('JOFFLINE_MESSAGE')) !== '') : ?>
        <p><?php echo Text::_('JOFFLINE_MESSAGE'); ?></p>
    <?php endif; ?>
    <h5>بزودی با شما خواهیم بود.</h5>
    <div id="counter" class="cf"><span>0<em>روز</em></span><span>0<em>ساعت</em></span><span>0<em>دقیقه</em></span><span>0<em>ثانیه</em></span></div>
</div></div></section>
<footer>
<div id="mc_embed_signup">
<form action="<?php echo Route::_('index.php'); ?>" method="post" id="form-login"><fieldset class="input">
<p id="form-login-username"><label for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label><input name="username" id="username" type="text" class="inputbox" size="18"></p>
<p id="form-login-password"><label for="passwd"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label><input type="password" name="password" class="inputbox" size="18" id="passwd"></p>
<p id="form-login-remember"><label for="remember"><?php echo Text::_('JGLOBAL_REMEMBER_ME'); ?></label><input type="checkbox" name="remember" class="inputbox" value="yes" id="remember"></p>
<input type="submit" name="Submit" class="button" value="<?php echo Text::_('JLOGIN'); ?>">
<input type="hidden" name="option" value="com_users"><input type="hidden" name="task" value="user.login"><input type="hidden" name="return" value="<?php echo base64_encode(Route::_('index.php')); ?>">
<?php echo Factory::getApplication()->getFormToken(); ?>
</fieldset></form></div>
<div id="mc_embed_signup"><jdoc:include type="message"></div>
<div class="row"><div class="twelve columns"><ul class="copyright"><li>&copy; Dima Software Group All Right Reserved!</li><li>Design by <a title="Dima Group" href="https://www.dima.ir/">Dima Group</a></li></ul></div></div>
</footer>
<script src="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/js/jquery.min.js"></script>
<script src="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/js/jquery.countdown.js"></script>
<script>jQuery(function($){var finalDate='<?php echo addslashes((string) $this->params->get('countdown')); ?>';$('div#counter').countdown(finalDate).on('update.countdown',function(event){$(this).html(event.strftime('<span>%D <em>روز</em></span><span>%H <em>ساعت</em></span><span>%M <em>دقیقه</em></span><span>%S <em>ثانیه</em></span>'));});});</script>
</body></html>
