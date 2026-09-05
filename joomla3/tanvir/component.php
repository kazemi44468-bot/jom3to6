<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$color = $this->params->get('templatecolor');
$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;
$doc = JFactory::getDocument();
$doc->addStyleSheet('templates/'.$this->template.'/css/template_css.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/joomla.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/typography.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/form.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive_rtl.css');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<jdoc:include type="head" />
</head>
<body class="contentpane">
	<div id="all">
		<div id="print">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
</body>
</html>
