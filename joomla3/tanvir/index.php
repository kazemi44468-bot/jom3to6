<?php
// ensure this file is being included by a parent file
defined( '_JEXEC' ) or die( 'Restricted access' );
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
$loading=$this->params->get("loading");
$doc->addScript('templates/' .$this->template. '/js/template.js');
$doc->addScript('templates/' .$this->template. '/js/wow.js');
$doc->addScript('templates/' .$this->template. '/js/parallax.js');
if($loading=='1'):
$doc->addScript('templates/' .$this->template. '/js/pace.min.js');
endif;




// Add current user information
$user = JFactory::getUser();

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template_css.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/joomla.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/typography.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/form.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/animation.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/dima_icon.css');
$sitename = $app->getCfg('sitename');
$MetaDesc = $app->getCfg('MetaDesc');
$MetaKeys = $app->getCfg('MetaKeys');
$option   = $app->input->getCmd('option', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$view     = $app->input->getCmd('view', '');
$logo     = $this->params->get('logo');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head profile="http://dublincore.org/documents/2008/08/04/dc-html/">
<meta property="og:locale" content="<?php echo $this->language; ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $doc->getTitle(); ?>" />
<meta property="og:description" content="<?php echo $MetaDesc; ?>" />
<meta property="og:site_name" content="<?php echo $sitename; ?>" />
<meta property="og:image" content="templates/tanvir/images/header_1.gif" />
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:description" content="<?php echo $MetaKeys; ?>"/>
<meta name="twitter:title" content="<?php echo $doc->getTitle(); ?>"/>
<meta name="twitter:domain" content="<?php echo $sitename; ?>"/>
<meta name="twitter:image" content="templates/tanvir/images/header_1.gif"/>
<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
<meta name="DC.Title" content="<?php echo $doc->getTitle(); ?>" />
<meta name="DC.Creator" content="<?php echo $sitename; ?>" />
<meta name="DC.Subject" content="<?php echo $doc->getTitle(); ?>" />
<meta name="DC.Description" content="<?php echo $MetaDesc; ?>" />
<meta name="DC.Publisher" content="<?php echo $sitename; ?>" />
<meta name="DC.Contributor" content="<?php echo $sitename; ?>" />
<meta name="DC.Date" content="2015" />
<meta name="DC.Language" content="<?php echo $this->language; ?>" />
<jdoc:include type="head" />
<script type="text/javascript">
	  jQuery(document).ready(function() {
	
		//Default Action
		jQuery(".tab_content").hide(); //Hide all content
		jQuery("ul.tabs li:first").addClass("active").show(); //Activate first tab
		jQuery(".tab_content:first").show(); //Show first tab content
		
		//On Click Event
		jQuery("ul.tabs li").click(function() {
			jQuery("ul.tabs li").removeClass("active"); //Remove any "active" class
			jQuery(this).addClass("active"); //Add "active" class to selected tab
			jQuery(".tab_content").hide(); //Hide all tab content
			var activeTab = jQuery(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			jQuery(activeTab).fadeIn(); //Fade in the active content
			return false;
		});
	
	  });
</script>
</head>
<body>
<div class="center">
<div id="dima_wrapper">
	<div id="dima">
		<div id="dima_1_wrapper">
			<div id="dima_1">
				<div id="dima_1_1_wrapper">
					<div id="dima_1_1">
						<div class="logo"><a href="."><img src="templates/tanvir/images/header_1.gif" alt="<?php echo $sitename; ?>" title="<?php echo $sitename; ?>" border="0" /></a></div>
					</div>
				</div>
			</div>
		</div>
		<div id="dima_2_wrapper">
			<div id="dima_2">
				<div id="dima_2_1_wrapper">
					<div id="dima_2_1">
						<div class="searchmod"><jdoc:include type="modules" name="search" /></div>
					</div>
				</div>
				<div id="dima_2_2_wrapper">
					<div id="dima_2_2">
						<div class="topmenu"><jdoc:include type="modules" name="menu" /></div>
					</div>
				</div>
			</div>
		</div>
		<div id="dima_3_wrapper">
			<div id="dima_3">
				<div id="dima_3_1_wrapper">
					<div id="dima_3_1">
						<jdoc:include type="modules" name="ticker" />
					</div>
				</div>
				<div id="dima_3_2_wrapper">
					<div id="dima_3_2">
						<jdoc:include type="modules" name="time" />
					</div>
				</div>
			</div>
		</div>
        <?php if($this->countModules("tab or slider")) : ?>
		<div id="dima_4_wrapper">
			<div id="dima_4">
				<div id="dima_4_1_wrapper">
					<div id="dima_4_1">
						
							<div class="containers">
                            	<ul class="tabs">
                                    <?php
										// this is where you want to load your module position
										$modules = JModuleHelper::getModules('tab'); 
										$mods='0';
										foreach($modules as $module)
										{
											$mods = $mods+1;
											echo '<li><a href="#tab'.$mods.'" title="'.$module->title.'">'.$module->title.'</a></li>';
										} 
									?>
                                </ul>
                                <div class="tab_container">
                                    <?php
										// this is where you want to load your module position
										$modules = JModuleHelper::getModules('tab'); 
										$mods='0';
										foreach($modules as $module)
										{
											$mods = $mods+1;
											echo '<div id="tab'.$mods.'" class="tab_content">';
											echo JModuleHelper::renderModule($module);
											echo '</div>';
										} 
									?>
                                </div>
                            </div>
	
					</div>
				</div>
				<div id="dima_4_2_wrapper">
					<div id="dima_4_2">
						<jdoc:include type="modules" name="slider" />
					</div>
				</div>
			</div>
		</div>
        <?php endif; ?>
		<?php if($this->countModules("right")) :
            $size1='';
        else:
            $size1='205';
        endif;
        ?>
        <?php if($this->countModules("left")) :
            $size2='';
        else:
            $size2='205';
        endif;
        ?>
        <?php
        $size3=(390+$size1+$size2);
        ?>
		<div id="dima_5_wrapper">
			<div id="dima_5">
            	<?php if($this->countModules("banner")) : ?>
				<div id="dima_5_1_wrapper">
					<div id="dima_5_1">
						<jdoc:include type="modules" name="banner" />
					</div>
				</div>
                <?php endif; ?>
                <?php if($this->countModules("left")) : ?>
				<div id="dima_5_2_wrapper">
					<div id="dima_5_2">
						<jdoc:include type="modules" name="left" style="xhtml" />
					</div>
				</div>
                <?php endif; ?>
				<div id="dima_5_3_wrapper" <?php if($this->countModules("left")) : ?><?php else: ?>style="width:<?php echo $size3; ?>px;"<?php endif; ?>>
					<div id="dima_5_3" <?php if($this->countModules("left")) : ?><?php else: ?>style="width:<?php echo $size3-5; ?>px"<?php endif; ?>>
                    	<?php if($view=='featured'): ?>
                    	<div class="compmod"><jdoc:include type="modules" name="component" /></div>
                        <?php else: ?>
						<div class="breadcrumbs"><jdoc:include type="modules" name="position-2" /></div>
                        <div class="pm"><jdoc:include type="message" /></div>
                        <main class="component"><jdoc:include type="component" /></main>
                        <?php endif; ?>
					</div>
				</div>
                <?php if($this->countModules("right")) : ?>
				<div id="dima_5_4_wrapper">
					<div id="dima_5_4">
						<jdoc:include type="modules" name="right" style="rounded" />
					</div>
				</div>
                <?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="clear">Template Design:<a href="http://www.dima.ir" target="_blank">Dima Group</a></div>
</div>
<div class="bottom">
	<div class="center">
		<div id="dima_6_wrapper">
			<div id="dima_6">
				<div id="dima_6_1_wrapper">
					<div id="dima_6_1">
						<jdoc:include type="modules" name="bottom" />
					</div>
				</div>
			</div>
		</div>
		<div id="dima_7_wrapper">
			<div id="dima_7">
				<div id="dima_7_1_wrapper">
					<div id="dima_7_1">
						
					<div class="footer">
						<jdoc:include type="modules" name="footer" />
					</div>

					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">

jQuery(document).ready(function() {	
	jQuery('.menu li').hover(function() {
		jQuery('ul', this).slideDown(200);
		jQuery(this).children('a:first').addClass("hov");
	}, function() {
		jQuery('ul', this).slideUp(100);
		jQuery(this).children('a:first').removeClass("hov");		
	});
});

    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();

</script>
</body>
</html>
