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

$sidebarWidth = $this->params->get("sidebarWidth", "25");
$cellpadding   = $this->params->get("cellpadding", "0.5em");
$contentleft   = $this->countModules("contentleft") ? '_contentleft' : '';
$contentright  = $this->countModules("contentright") ? '_contentright' : '';

if (($contentleft or $contentright) > 0)
{
	$contentleft_sidebar_width    = $sidebarWidth;
	$contentleft_sidebar_width_2  = 100 - $contentleft_sidebar_width;
	$contentright_sidebar_width   = $contentleft_sidebar_width * 1.32;
	$contentright_sidebar_width_2 = 100 - $contentright_sidebar_width;
}
?>
<style type="text/css">
	<?php if ($this->params->get('googleFont', 1)) : ?>
		.jl_module h3, #jl_header h3, #jl_topmenu .jl_small h3, #jl_mainmenu_maxi ul a, #jl_mainmenu_maxi ul .separator {
			font-family: '<?php echo $this->params->get('googleFontFamily', 'Carrois Gothic'); ?>';
		}
	<?php endif; ?>

	#jl_left {
		width: <?php echo $sidebarWidth; ?>%;
	}
	#jl_left .jl_sidebar {
		padding-right: <?php echo $cellpadding; ?>;
	}

	#jl_right {
		width: <?php echo $sidebarWidth; ?>%;
	}

	#jl_right .jl_sidebar {
		padding-left: <?php echo $cellpadding; ?>;
	}

	#jl_content_out, #jl_content_inset1 {
		width: 100%;
	}

	#jl_content_out_left, #jl_content_out_right {
		width: <?php echo 100 - $sidebarWidth; ?>%;
	}

	#jl_content_out_left_right {
		width: <?php echo 100 - 2 * $sidebarWidth; ?>%;
	}

	#jl_contentleft {
		width: <?php echo $contentleft_sidebar_width; ?>%;
	}

	#jl_contentright {
		width: <?php echo $contentright_sidebar_width; ?>%;
	}

	#jl_content_inset, #jl_content_inset_contentright, #jl_content2_inset, #jl_content_contentleft {
		width: 100%;
	}

	#jl_content_inset_contentleft_contentright, #jl_content_inset_contentleft {
		width: <?php echo $contentleft_sidebar_width_2; ?>%;
	}

	#jl_content2_inset_contentright {
		width: <?php echo $contentright_sidebar_width_2; ?>%;
	}

	.jl_un_separate {
		padding-left: <?php echo $cellpadding; ?>;
	}

	#jl_navigation, #jl_header {
		padding-bottom: <?php echo $cellpadding; ?>;
	}

	.jl_content2_inset, #jl_contentright, #jl_contentleft, .jl_module div, #jl_contentleft, #jl_contentright, .jl_contentbottom {
		margin-bottom: <?php echo $cellpadding; ?>;
	}

	.jl_center {
		background-color: <?php echo $this->params->get('containercolor', '#fff'); ?>;
		max-width: <?php echo $this->params->get('templateWidth', '920px'); ?>;
		min-width: 150px;
	}

	body, p, td, tr, li, li span, dd, dt {
		font-family: <?php echo $this->params->get('fontfamily', 'Helvetica, Arial, sans-serif'); ?>;
		font-size: <?php echo $this->params->get('fontsize', '14px'); ?>;
		<?php if ($fontcolor = $this->params->get('fontcolor')) : ?>
			color: <?php echo $fontcolor; ?>;
		<?php endif; ?>
	}

	<?php if (!$this->params->get('backlink', 1)) : ?>
		#jl_copyright {
			display: none;
		}
	<?php endif; ?>

	#jl_background, body {
		<?php if ($background = $this->params->get('background')) : ?>
			background-image: url(<?php echo $this->baseurl; ?>/<?php echo $background; ?>);
		<?php endif; ?>
		<?php if ($backgroundcolor = $this->params->get('backgroundcolor')) : ?>
			background-color: <?php echo $backgroundcolor; ?>;
		<?php endif; ?>
	}

	a:link, a:visited, ul.menu span.separator {
		color: <?php echo $this->params->get('linkcolor', '#6699CC'); ?>;
	}
</style>