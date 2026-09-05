<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Dima Groups, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />
	<?php if ($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/error_rtl.css" type="text/css" />
	<?php endif; ?>
</head>
        <body class="error-<?php echo $this->error->getCode(); ?>">
        <div id="container">
	<div id="content-wrap">
       <div id="logo"></div>
         <div id="content">
         	<div id="title"></div>
         	<div id="description">
            	<h1><?php echo $this->error->getCode(); ?></h1>
                <p><?php echo $this->error->getMessage(); ?></p>
                <p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
            </div>
            <!-- #description -->
            <a id="final-destination" href="<?php echo $this->baseurl; ?>/index.php"><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a>
                    <div id="other-destinations">
                        <div class="search">
                            <form action="<?php echo $this->baseurl; ?>/index.php?option=com_search" method="post" class="form-inline">
                                <input name="searchword" id="mod-search-searchword" maxlength="200"  class="inputbox search-query" type="search" size="20" placeholder="جستجو..." />
                                <button class="button btn btn-primary" onclick="this.form.searchword.focus();">جستجو</button>
                                <input type="hidden" name="task" value="search" />
                                <input type="hidden" name="option" value="com_search" />
                                <input type="hidden" name="Itemid" value="101" />
                            </form>
                        </div>
                        <div class="description">لطفا یکی از صفحات زیر را امتحان کنید:</div>
                        <ul class="links">
                              <li><a href="<?php echo $this->baseurl; ?>/index.php">Home</a></li>
                              <li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_search">Search</a></li>
                              <li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_contact">Contact US</a></li>
                        </ul>
                    </div>
                </div>
            	<!-- #content -->
            </div>
            <!-- #content-wrap -->
        </div>
        </body>
</html>
