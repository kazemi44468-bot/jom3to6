<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Factory;

if (!isset($this->error)) {
    $this->error = new \RuntimeException(Text::_('JERROR_ALERTNOAUTHOR'), 404);
    $this->debug = false;
}

$document = Factory::getApplication()->getDocument();
$this->language = $document->getLanguage();
$this->direction = $document->getDirection();
$code = (int) $this->error->getCode();
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($this->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $code; ?> - <?php echo htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/css/error.css">
    <?php if ($this->direction === 'rtl') : ?><link rel="stylesheet" href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/templates/<?php echo htmlspecialchars($this->template, ENT_QUOTES, 'UTF-8'); ?>/css/error_rtl.css"><?php endif; ?>
</head>
<body class="error-<?php echo $code; ?>">
<div id="container"><div id="content-wrap"><div id="logo"></div><div id="content">
    <div id="title"></div>
    <div id="description">
        <h1><?php echo $code; ?></h1>
        <p><?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
        <p><?php echo Text::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
    </div>
    <a id="final-destination" href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/index.php"><?php echo Text::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></a>
    <div id="other-destinations">
        <div class="search">
            <form action="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/index.php" method="get" class="form-inline">
                <input name="searchword" id="mod-search-searchword" maxlength="200" class="inputbox search-query" type="search" size="20" placeholder="جستجو...">
                <button class="button btn btn-primary" type="submit">جستجو</button>
                <input type="hidden" name="option" value="com_search">
            </form>
        </div>
        <div class="description">لطفا یکی از صفحات زیر را امتحان کنید:</div>
        <ul class="links">
            <li><a href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/index.php">Home</a></li>
            <li><a href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/index.php?option=com_search">Search</a></li>
            <li><a href="<?php echo htmlspecialchars($this->baseurl, ENT_QUOTES, 'UTF-8'); ?>/index.php?option=com_contact">Contact US</a></li>
        </ul>
    </div>
</div></div></div>
</body>
</html>
