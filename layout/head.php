<?php
/**
 *
 * head view
 *
 * @version             1.0.0
 * @package             Joomlike Framework
 * @copyright			Copyright (C) 2012 vonfio.de. All rights reserved.
 *               
 */
 
// No direct access
defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;
$tpn		= $this->template;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" > 

<head>
	
  <jdoc:include type="head" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

	<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/templates/<?php echo $tpn; ?>/favicon.ico" />

<?php
	$itemid		= JRequest::getVar('Itemid');
	$menu		= JFactory::getApplication()->getMenu();
	$active		= $menu->getItem($itemid);
	$pageclass	= $menu->getParams($itemid);
	$pageclass	= $pageclass->get( 'pageclass_sfx' );
	
  $doc = JFactory::getDocument();
  
  // CSS
	if ($this->params->get('bootstrap')) {
	$doc->addStyleSheet('templates/'.$tpn.'/css/bootstrap.min.css'); }
	$doc->addStyleSheet('templates/'.$tpn.'/css/template.css');
	if ($this->direction == 'rtl') {
	$doc->addStyleSheet('templates/'.$tpn.'/css/template_rtl.css'); }
	$doc->addStyleSheet('templates/'.$tpn.'/css/style_'.$this->params->get('colorVariation').'.css');
	$doc->addStyleSheet('templates/'.$tpn.'/css/typo.css');
	
	// Google Font
	if ($this->params->get('googleFont')) {
	$googleFontFamily =	str_replace('+', ' ', $this->params->get('googleFontFamily'));
	$doc->addStyleSheet('//fonts.googleapis.com/css?family='. $googleFontFamily);
	}
	
	require_once 'templates/joomlike/lib/modules.php' ;
?>
<script type="text/javascript">

function auf(key) {
	jQuery('#'+key).slideToggle();
}

sfHover = function() {
	var sfEls = document.getElementById("navigation").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover); 

</script>
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $tpn; ?>/css/responsive.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $tpn; ?>/css/custom.css" type="text/css" />


</head>

<?php if(count($app->getMessageQueue())) : ?>
<jdoc:include type="message" />
<?php endif; ?>