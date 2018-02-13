<?php 
/**
 *
 * Default view
 *
 * @version             1.0.0
 * @package             Joomlike Framework
 * @copyright			Copyright (C) 2012 vonfio.de. All rights reserved.
 *               
 */
 
// No direct access.
defined('_JEXEC') or die; 
$app	= JFactory::getApplication(); 
?>

<div id="jl_footer">
    <div id="jl_footer_hr">
    
    	<div id="jl_footer_left">
    		<jdoc:include type="modules" name="footer" style="xhtml" />
    		<div id="jl_copyright">&copy; <?php echo JHTML::Date( 'now', 'Y' ); ?> <?php echo $app->getCfg('sitename'); ?> | Design by <a href="https://www.schefa.com">schefa.com</a></div>
    	</div>
        
    	<div id="jl_footer_right">
        	<jdoc:include type="modules" name="footer-nav" style="xhtml" /> 
        </div>
    
    </div>
    <div class="jl_clear"></div>
</div>
