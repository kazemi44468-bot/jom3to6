<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$app = Factory::getApplication();
$document = $app->getDocument();
$wa = $document->getWebAssetManager();
$this->language = $document->getLanguage();
$this->direction = $document->getDirection();

foreach (['template_css','joomla','typography','form','bootstrap-rtl'] as $name) {
    $wa->registerAndUseStyle('tanvir.component.' . $name, 'templates/' . $this->template . '/css/' . ($name === 'bootstrap-rtl' ? 'bootstrap-responsive_rtl.css' : $name . '.css'));
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($this->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <jdoc:include type="head">
</head>
<body class="contentpane">
<div id="all"><div id="print">
    <jdoc:include type="message">
    <jdoc:include type="component">
</div></div>
</body>
</html>
