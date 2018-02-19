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

// Output as HTML5
$this->setHtml5(true);

// Shortcuts
$path = $this->baseurl . '/templates/' . $this->template . '/';

// Load Bootstrap
JHtml::_('script', 'template.js', array('relative' => true));
JHtmlBootstrap::loadCss(true, $this->direction);
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<jdoc:include type="head"/>
	<link href="<?php echo $path; ?>css/template.css" rel="stylesheet"/>
	<link href="<?php echo $path; ?>css/style_<?php echo $this->params->get('colorVariation'); ?>.css" rel="stylesheet"/>
	<link href="<?php echo $path; ?>css/typo.css" rel="stylesheet"/>
	<link href="<?php echo $path; ?>css/responsive.css" rel="stylesheet"/>
	<link href="<?php echo $path; ?>css/custom.css" rel="stylesheet"/>
	<?php if ($this->direction == 'rtl') : ?>
		<link href="<?php echo $path; ?>css/template_rtl.css" rel="stylesheet"/>
	<?php endif; ?>
	<?php if ($this->params->get('googleFont', 1)) : ?>
		<?php $googleFontFamily = str_replace('+', ' ', $this->params->get('googleFontFamily')); ?>
		<link href="//fonts.googleapis.com/css?family=<?php echo $googleFontFamily; ?>" rel="stylesheet"/>
	<?php endif; ?>
	<?php require_once 'templates/jsent/lib/modules.php'; ?>
</head>
<body class="jl_style_<?php echo $this->params->get('colorVariation'); ?>">
<jdoc:include type="message"/>
<div id="jl_background">
	<div id="jl_bg">
		<div class="jl_container">
			<div class="jl_center">

				<?php if ($this->countModules('logo or article or topmenu or position-0')) : ?>
					<div id="jl_top">

						<?php if ($this->countModules('logo')) : ?>
							<?php $idSuffix = $this->countModules('article') ? '_breaking' : ''; ?>
							<?php $idSuffix .= $this->countModules('topmenu') ? '_topmenu' : ''; ?>
							<?php $idSuffix .= $this->countModules('search') ? '_search' : ''; ?>
							<div id="jl_topleft<?php echo $idSuffix; ?>">
								<div id="jl_logo">
									<a href="<?php echo $this->baseurl; ?>">
										<jdoc:include type="modules" name="logo" style="xhtml"/>
									</a>
								</div>
							</div>
						<?php endif; ?>

						<?php if ($this->countModules('article or topmenu or position-0')) : ?>
							<?php $idSuffix = $this->countModules('article') ? '_breaking' : ''; ?>
							<?php $idSuffix .= $this->countModules('topmenu') ? '_topmenu' : ''; ?>
							<?php $idSuffix .= $this->countModules('search') ? '_search' : ''; ?>
							<?php $idSuffix .= $this->countModules("logo") ? '_logo' : ''; ?>
							<div id="jl_topright<?php echo $idSuffix; ?>">

								<?php if ($this->countModules('article')) : ?>
									<div id="jl_article">
										<jdoc:include type="modules" name="article" style="xhtml"/>
									</div>
								<?php endif; ?>

								<?php if ($this->countModules('topmenu')) : ?>
									<div id="jl_topmenu">
										<jdoc:include type="modules" name="topmenu" style="responsive"/>
									</div>
								<?php endif; ?>

								<?php if ($this->countModules('position-0')) : ?>
									<div id="jl_search">
										<jdoc:include type="modules" name="position-0" style="xhtml"/>
									</div>
								<?php endif; ?>

							</div>
						<?php endif; ?>

						<div class="clearfix"></div>
					</div>
				<?php endif; ?>

				<?php if ($this->countModules('position-1 or position-1-1')) : ?>
					<div id="jl_navigation">
						<div id="jl_navigation_inner">
							<jdoc:include type="modules" name="position-1" style="mainmenu"/>
							<jdoc:include type="modules" name="position-1-1" style="submenu"/>
						</div>
						<div class="clearfix"></div>

						<?php if ($this->countModules('toolbar or login')) : ?>
							<div id="jl_toolbar">
								<div class="pull-left">
									<jdoc:include type="modules" name="toolbar" style="xhtml"/>
								</div>
								<div class="pull-right">
									<jdoc:include type="modules" name="login" style="xhtml"/>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php endif; ?>

					</div>
				<?php endif; ?>

				<div class="jl_white">

					<?php if ($this->countModules('header')) : ?>
						<div id="jl_header">
							<div id="jl_headerimage">
								<div class="jl_header">
									<jdoc:include type="modules" name="header" style="xhtml"/>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php endif; ?>

					<div id="jl_container_main">

						<?php if ($this->countModules('afterheader')) : ?>
							<div class="jl_positions clearfix">
								<div class="jl_module">
									<jdoc:include type="modules" name="afterheader" style="responsive"/>
								</div>
							</div>
						<?php endif; ?>

						<div id="jl_maincontent" class="clearfix">
							<?php if ($this->countModules('position-7')) : ?>
								<div id="jl_left">
									<div class="jl_sidebar">
										<div class="jl_module">
											<jdoc:include type="modules" name="position-7" style="xhtml"/>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php $idSuffix = $this->countModules('position-7') ? '_left' : ''; ?>
							<?php $idSuffix .= $this->countModules('position-8') ? '_right' : ''; ?>
							<div id="jl_content_out<?php echo $idSuffix; ?>">

								<?php if ($this->countModules('top')) : ?>
									<div class="jl_over_content">
										<div class="jl_module row-fluid">
											<jdoc:include type="modules" name="top" style="responsive"/>
										</div>
									</div>
								<?php endif; ?>

								<div id="jl_maincontent_2" class="clearfix">

									<?php if ($this->countModules('contentleft')) : ?>
										<div id="jl_contentleft">
											<div class="jl_sidebar">
												<div class="jl_module">
													<jdoc:include type="modules" name="contentleft" style="xhtml"/>
												</div>
											</div>
										</div>
									<?php endif ?>

									<?php $idSuffix = $this->countModules('contentleft') ? '_left' : ''; ?>
									<?php $idSuffix .= $this->countModules('contentright') ? '_right' : ''; ?>
									<div id="jl_content_inset<?php echo $idSuffix; ?>">
										<div id="jl_content2_inset">

											<?php if ($this->countModules('content-top')) : ?>
												<div class="jl_contenttop clearfix">
													<div class="jl_module row-fluid">
														<jdoc:include type="modules" name="content-top" style="responsive"/>
													</div>
												</div>
											<?php endif; ?>

											<?php if ($this->countModules('position-2')) : ?>
												<div id="jl_breadcrumbs">
													<jdoc:include type="modules" name="position-2" style="xhtml"/>
												</div>
											<?php endif; ?>

											<div id="jl_content">
												<div id="jl_content_component">
													<jdoc:include type="component"/>
												</div>
												<div class="clearfix"></div>
											</div>

											<?php if ($this->countModules('content-bottom')) : ?>
												<div class="jl_contentbottom">
													<div class="jl_module row-fluid">
														<jdoc:include type="modules" name="content-bottom" style="responsive"/>
													</div>
													<div class="clearfix"></div>
												</div>
											<?php endif; ?>

										</div>
									</div>

									<?php if ($this->countModules('contentright')) : ?>
										<div id="jl_contentright">
											<div class="jl_sidebar">
												<div class="jl_module">
													<jdoc:include type="modules" name="contentright" style="xhtml"/>
												</div>
											</div>
										</div>
									<?php endif ?>

								</div>

								<?php if ($this->countModules('bottom')) : ?>
									<div class="jl_under_content">
										<div class="jl_module row-fluid">
											<jdoc:include type="modules" name="bottom" style="responsive"/>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<?php if ($this->countModules('position-8')) : ?>
								<div id="jl_right">
									<div class="jl_sidebar">
										<div class="jl_module">
											<jdoc:include type="modules" name="position-8" style="xhtml"/>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<?php if ($this->countModules('beforefooter')) : ?>
							<div class="jl_positions clearfix">
								<div class="jl_module">
									<jdoc:include type="modules" name="beforefooter" style="xhtml"/>
								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>
				<div id="jl_footer">
					<div id="jl_footer_hr">
						<div id="jl_footer_left">
							<jdoc:include type="modules" name="footer" style="xhtml"/>
							<div id="jl_copyright">Design by <a href="http://www.schefa.com" target="_blank">schefa.com</a></div>
						</div>
						<div id="jl_footer_right">
							<jdoc:include type="modules" name="footer-nav" style="xhtml"/>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
