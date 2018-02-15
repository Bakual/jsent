<?php
/**
 * @package     JSEnt
 * @subpackage  Template
 * @author      Thomas Hunziker <bakual@bakual.net>
 * @copyright   © 2018 - Thomas Hunziker
 * @license     https://creativecommons.org/licenses/by-sa/3.0/
 **/

// No direct access. 
defined('_JEXEC') or die;

/*
 * Module chrome : Main Menu
 */
function modChrome_mainmenu($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div id="jl_mainmenu">
			<a href="#<?php echo $module->id; ?>"
			   title="<?php echo JText::_('TPL_JSENT_CLICK'); ?>"
			   onclick="auf('jl_mainmenu_mini'); return false"
			   class="toggleMainmenu" id="link_<?php echo $module->id ?>"><?php echo $module->title; ?></a>
			<div class="jl_menu" id="jl_mainmenu_maxi">
				<?php
				$modulecontent = str_replace('<ul class="menu">', '<ul class="mainmenu suckerfish">', $module->content);
				echo $modulecontent; ?>
				<div class="clearfix"></div>
			</div>
			<div class="responsive_menu" id="jl_mainmenu_mini" style="display:none;">
				<?php
				$modulecontent = str_replace('<ul class="menu">', '<ul class="mainmenu suckerfish">', $module->content);
				echo $modulecontent; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif;
}

/*
 * Module chrome : Sub Menu
 */
function modChrome_submenu($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div id="jl_submenu">
			<a href="#<?php echo $module->id; ?>"
			   title="<?php echo JText::_('TPL_JSENT_CLICK'); ?>"
			   onclick="auf('jl_submenu_mini'); return false"
			   class="toggleSubmenu" id="link_<?php echo $module->id ?>"><?php echo $module->title; ?></a>
			<div class="jl_menu" id="jl_submenu_maxi">
				<?php
				$modulecontent = str_replace('<ul class="menu">', '<ul class="submenu suckerfish">', $module->content);
				echo $modulecontent; ?>
				<div class="clearfix"></div>
			</div>
			<div class="responsive_menu" id="jl_submenu_mini" style="display:none;">
				<?php
				$modulecontent = str_replace('<ul class="menu">', '<ul class="submenu suckerfish">', $module->content);
				echo $modulecontent; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php endif;
}

/*
 * Module chrome : Responsive
 */
function modChrome_responsive($module, &$params, &$attribs)
{
	if (empty ($module->content))
	{
		return '';
	}
	$moduleTag      = htmlspecialchars($params->get('module_tag', 'div'), ENT_QUOTES, 'UTF-8');
	$moduleSuffix   = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'), ENT_QUOTES, 'UTF-8');
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$bootstrapClass = $bootstrapSize ? ' span' . $bootstrapSize : ''; ?>
	<<?php echo $moduleTag; ?> class="moduletable<?php echo $moduleSuffix . $bootstrapClass; ?>">
		<div class="module_responsive_out">

			<?php if ($module->showtitle) : ?>
				<<?php echo $headerTag; ?> class="<?php echo htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8'); ?>">
					<?php echo $module->title; ?>
				</<?php echo $headerTag; ?>>
			<?php endif; ?>

			<div><?php echo $module->content; ?></div>
		</div>
	</<?php echo $moduleTag; ?>>
	<?php
}
