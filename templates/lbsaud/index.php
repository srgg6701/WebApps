<?php
/**
 * Date         January 30, 2012
 * Copyright    Copyright (C) 2012 Lal B. Saud
 * License  GPL
 */
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$leftbar = 1;
$rightbar = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/equalcolumns.js" type="text/javascript"></script>
<?php
if ($this->countModules('left') == 0)
	$leftbar	= "0";

if ($this->countModules('right') == 0)
	$rightbar	= "0";
?>
</head>

<body> 
<div id="header">
	<!--  <h1><?php //echo $app->getCfg('sitename');?></h1> -->
		<?php
	  	if ($this->params->get('logoType') == 'image') { ?>
	  	<h1 class="logo">
	  		<a href="index.php" title="<?php echo $app->getCfg('sitename'); ?>"><span><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.gif" border="0" alt="Logo"></img></span></a>
	  	</h1>
	  	<?php } else { ?>
	  	<div class="logo-text">
	  		<h1><a href="index.php" title="<?php echo $this->params->get('logoText'); ?>"><span><?php echo $this->params->get('logoText'); ?></span></a></h1>
	  		<p class="site-slogan"><?php echo $this->params->get('sloganText');?></p>
	  	</div>
	  	<?php } ?>
</div>

<div id="message">
  <jdoc:include type="modules" name="top" style="xhtml" />
</div>

<div id="main_wrapper">
  <?php if($this->countModules('left')) : ?>
  <div id="sidebar_left">
    <jdoc:include type="modules" name="left"style="xhtml" />
  </div>
  <?php endif; ?>
  <div id="maincolumn<?php echo (2-$leftbar-$rightbar); ?>">
    <jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
    <jdoc:include type="message" />
    <jdoc:include type="component" />
  </div>
  <?php if($this->countModules('right')) : ?>
  <div id="sidebar_right">
    <jdoc:include type="modules" name="right" style="xhtml" />
  </div>
  <?php endif; ?>
  <div class="clear">
</div>
</div>
<div id="footer">
  <jdoc:include type="modules" name="footer" style="xhtml" />
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>