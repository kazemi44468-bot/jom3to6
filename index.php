<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$document = $app->getDocument();
$this->language = $document->getLanguage();
$this->direction = $document->getDirection();
$this->template = $this->template ?: 'tanvir';
$wa = $document->getWebAssetManager();

// Joomla 6-compatible asset loading. Legacy Document::addScript/addStyleSheet calls
// were removed from this template in favour of WebAssetManager.
$styles = [
    'template_css' => 'templates/' . $this->template . '/css/template_css.css',
    'joomla'      => 'templates/' . $this->template . '/css/joomla.css',
    'typography'  => 'templates/' . $this->template . '/css/typography.css',
    'form'        => 'templates/' . $this->template . '/css/form.css',
    'animation'   => 'templates/' . $this->template . '/css/animation.css',
    'dima-icon'   => 'templates/' . $this->template . '/css/dima_icon.css',
    'bootstrap-rtl' => 'templates/' . $this->template . '/css/bootstrap-responsive_rtl.css',
];
foreach ($styles as $name => $uri) {
    $wa->registerAndUseStyle('tanvir.' . $name, $uri);
}

$wa->registerAndUseScript('tanvir.template', 'templates/' . $this->template . '/js/template.js', [], ['defer' => true], ['jquery']);
$wa->registerAndUseScript('tanvir.wow', 'templates/' . $this->template . '/js/wow.js', [], ['defer' => true]);
$wa->registerAndUseScript('tanvir.parallax', 'templates/' . $this->template . '/js/parallax.js', [], ['defer' => true]);

if ((int) $this->params->get('loading', 0) === 1) {
    $wa->registerAndUseScript('tanvir.pace', 'templates/' . $this->template . '/js/pace.min.js', [], ['defer' => true]);
}

$sitename = (string) $app->get('sitename');
$metaDesc = (string) $app->get('MetaDesc');
$metaKeys = (string) $app->get('MetaKeys');
$logo = (string) $this->params->get('logo');
$view = $app->input->getCmd('view', '');
$headerImage = Uri::root() . 'templates/' . $this->template . '/images/header_1.gif';

$modules = $this->getModules('tab');
$hasTabs = !empty($modules);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($this->direction, ENT_QUOTES, 'UTF-8'); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:locale" content="<?php echo htmlspecialchars($this->language, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($document->getTitle(), ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDesc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($headerImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaKeys, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($document->getTitle(), ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:domain" content="<?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($headerImage, ENT_QUOTES, 'UTF-8'); ?>">
    <jdoc:include type="head">
</head>
<body>
<div class="center">
<div id="dima_wrapper">
<div id="dima">
    <div id="dima_1_wrapper"><div id="dima_1"><div id="dima_1_1_wrapper"><div id="dima_1_1">
        <div class="logo"><a href="<?php echo Uri::root(); ?>"><img src="<?php echo htmlspecialchars($headerImage, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($sitename, ENT_QUOTES, 'UTF-8'); ?>"></a></div>
    </div></div></div></div>

    <div id="dima_2_wrapper"><div id="dima_2">
        <div id="dima_2_1_wrapper"><div id="dima_2_1"><div class="searchmod"><jdoc:include type="modules" name="search"></div></div></div>
        <div id="dima_2_2_wrapper"><div id="dima_2_2"><div class="topmenu"><jdoc:include type="modules" name="menu"></div></div></div>
    </div></div>

    <div id="dima_3_wrapper"><div id="dima_3">
        <div id="dima_3_1_wrapper"><div id="dima_3_1"><jdoc:include type="modules" name="ticker"></div></div>
        <div id="dima_3_2_wrapper"><div id="dima_3_2"><jdoc:include type="modules" name="time"></div></div>
    </div></div>

<?php if ($hasTabs || $this->countModules('slider')) : ?>
    <div id="dima_4_wrapper"><div id="dima_4">
        <?php if ($hasTabs) : ?>
        <div id="dima_4_1_wrapper"><div id="dima_4_1">
            <div class="containers">
                <ul class="tabs">
                    <?php foreach ($modules as $index => $module) : $tabId = 'tab' . ($index + 1); ?>
                        <li<?php echo $index === 0 ? ' class="active"' : ''; ?>><a href="#<?php echo $tabId; ?>" title="<?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($module->title, ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="tab_container">
                    <?php foreach ($modules as $index => $module) : $tabId = 'tab' . ($index + 1); ?>
                        <div id="<?php echo $tabId; ?>" class="tab_content"<?php echo $index !== 0 ? ' style="display:none"' : ''; ?>><?php echo $this->loadModule($module); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div></div>
        <?php endif; ?>
        <?php if ($this->countModules('slider')) : ?>
        <div id="dima_4_2_wrapper"><div id="dima_4_2"><jdoc:include type="modules" name="slider"></div></div>
        <?php endif; ?>
    </div></div>
<?php endif; ?>

<?php
$hasRight = $this->countModules('right');
$hasLeft = $this->countModules('left');
$size1 = $hasRight ? '' : 205;
$size2 = $hasLeft ? '' : 205;
$size3 = 390 + $size1 + $size2;
?>
    <div id="dima_5_wrapper"><div id="dima_5">
        <?php if ($this->countModules('banner')) : ?><div id="dima_5_1_wrapper"><div id="dima_5_1"><jdoc:include type="modules" name="banner"></div></div><?php endif; ?>
        <?php if ($hasLeft) : ?><div id="dima_5_2_wrapper"><div id="dima_5_2"><jdoc:include type="modules" name="left" style="xhtml"></div></div><?php endif; ?>
        <div id="dima_5_3_wrapper"<?php echo !$hasLeft ? ' style="width:' . (int) $size3 . 'px;"' : ''; ?>><div id="dima_5_3"<?php echo !$hasLeft ? ' style="width:' . ((int) $size3 - 5) . 'px"' : ''; ?>>
            <?php if ($view === 'featured') : ?>
                <div class="compmod"><jdoc:include type="modules" name="component"></div>
            <?php else : ?>
                <div class="breadcrumbs"><jdoc:include type="modules" name="position-2"></div>
                <div class="pm"><jdoc:include type="message"></div>
                <main class="component"><jdoc:include type="component"></main>
            <?php endif; ?>
        </div></div>
        <?php if ($hasRight) : ?><div id="dima_5_4_wrapper"><div id="dima_5_4"><jdoc:include type="modules" name="right" style="rounded"></div></div><?php endif; ?>
    </div></div>
</div>
</div>
<div class="clear">Template Design:<a href="https://www.dima.ir" target="_blank" rel="noopener">Dima Group</a></div>
</div>
<div class="bottom"><div class="center">
    <div id="dima_6_wrapper"><div id="dima_6"><div id="dima_6_1_wrapper"><div id="dima_6_1"><jdoc:include type="modules" name="bottom"></div></div></div></div>
    <div id="dima_7_wrapper"><div id="dima_7"><div id="dima_7_1_wrapper"><div id="dima_7_1"><div class="footer"><jdoc:include type="modules" name="footer"></div></div></div></div></div>
</div></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('ul.tabs li a').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var target = document.querySelector(link.getAttribute('href'));
            document.querySelectorAll('ul.tabs li').forEach(function (item) { item.classList.remove('active'); });
            document.querySelectorAll('.tab_content').forEach(function (item) { item.style.display = 'none'; });
            link.parentElement.classList.add('active');
            if (target) target.style.display = 'block';
        });
    });
    document.querySelectorAll('.menu li').forEach(function (item) {
        item.addEventListener('mouseenter', function () {
            var submenu = item.querySelector(':scope > ul');
            var link = item.querySelector(':scope > a');
            if (submenu) submenu.style.display = 'block';
            if (link) link.classList.add('hov');
        });
        item.addEventListener('mouseleave', function () {
            var submenu = item.querySelector(':scope > ul');
            var link = item.querySelector(':scope > a');
            if (submenu) submenu.style.display = '';
            if (link) link.classList.remove('hov');
        });
    });
    if (typeof WOW !== 'undefined') new WOW({animateClass: 'animated', offset: 100}).init();
});
</script>
</body>
</html>
