<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Dima Groups, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();
$logo     = $this->params->get('logo');
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>"><!--<![endif]-->
<head>
   <meta charset="utf-8">
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/offline.css">
</head>
<body>
   <section id="intro">
   	<header class="row">	 
			<div id="logo" >
				<a href="#" >
                 <img src="<?php echo $logo; ?>" alt="<?php echo htmlspecialchars($app->getCfg('sitename')); ?>">                  
              </a>					
			</div>
   	</header>
   	<div  id="main" class="row">
	   	<div class="twelve columns">
	   		<h1><?php echo htmlspecialchars($app->getCfg('sitename')); ?></h1>
			<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
                <p>
                    <?php echo $app->getCfg('offline_message'); ?>
                </p>
            <?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
                <p>
                    <?php echo JText::_('JOFFLINE_MESSAGE'); ?>
                </p>
            <?php  endif; ?>
	   		<h5>بزودی با شما خواهیم بود.</h5>
	   		<div id="counter" class="cf">
	   				<span>0<em>days</em></span> 
 					<span>0<em>hours</em></span>
					<span>0<em>minutes</em></span>
 					<span>0<em>seconds</em></span> 
   			</div>					

   			<!-- Begin MailChimp Signup Form -->
	          
      </div>
   </section>
   <footer>
   <div id="mc_embed_signup">
				<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
	<fieldset class="input">
		<p id="form-login-username">
			<label for="username"><?php echo JText::_('JGLOBAL_USERNAME') ?></label>
			<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME') ?>" size="18" />
		</p>
		<p id="form-login-password">
			<label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
			<input type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" id="passwd" />
		</p>
		<p id="form-login-remember">
			<label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME') ?></label>
			<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME') ?>" id="remember" />
		</p>
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
	</form>
	         </div>
        <div id="mc_embed_signup">
    <jdoc:include type="message" />
        </div>
         </div>
      <div class="row">
         <div class="twelve columns">            
            <ul class="copyright">
               <li>&copy; Dima Software Group All Right Reserved!</li>
               <li>Design by <a title="Styleshout" href="http://www.dima.ir/">Dima Group</a></li>          
            </ul>
         </div>          
      </div>
   </footer> <!-- Footer End-->   
   <!-- Java Script
   ================================================== -->
   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.min.js"></script>
   <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.countdown.js"></script>
   <script type="text/javascript">
	jQuery(document).ready(function($) {
		var finalDate = '<?php echo $this->params->get("countdown");?>';
	
		$('div#counter').countdown(finalDate)
		.on('update.countdown', function(event) {
	
			$(this).html(event.strftime('<span>%D <em>روز</em></span>' + 
												 '<span>%H <em>ساعت</em></span>' + 
												 '<span>%M <em>دقیقه</em></span>' +
												 '<span>%S <em>ثانیه</em></span>'));
	
	   });  
	/*----------------------------------------------------*/
	/*	Make sure that #intro height is
	/* equal to the browser height.
	------------------------------------------------------ */
	});   
   </script>

</body>

</html>