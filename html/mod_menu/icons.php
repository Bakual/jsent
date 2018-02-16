<?php
/**
 * Alternatives Layout um ein Menü mit Icons darzustellen
 *
 * @author Thomas Hunziker
 */

defined('_JEXEC') or die;

$span = 'span' . floor(12 / count($list));

?>
<ul class="nav<?php echo $class_sfx; ?>">
	<?php foreach ($list as $i => $item) :
	$class = $span . ' item-' . $item->id;

	if ($item->id == $default_id)
	{
		$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type === 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type === 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	$attributes = array();

	if ($item->anchor_title)
	{
		$attributes['title'] = $item->anchor_title;
	}

	if ($item->anchor_css)
	{
		$attributes['class'] = $item->anchor_css;
	}

	if ($item->anchor_rel)
	{
		$attributes['rel'] = $item->anchor_rel;
	}

	if ($item->browserNav == 1)
	{
		$attributes['target'] = '_blank';
	}
	elseif ($item->browserNav == 2)
	{
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';

		$attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
	}

	?>
	<li class="<?php echo $class; ?>">
		<?php if ($item->params->get('menu_text', 1)) : ?>
			<h3><?php echo $item->title; ?></h3>
		<?php endif; ?>
		<?php $link = JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)); ?>
		<?php echo JHtml::_('link', $link, '<img src="' . $item->menu_image . '" class="nav-icon" />', $attributes); ?>
		<?php if ($item->deeper) : ?>
		<ul class="nav-child unstyled small">
			<?php elseif ($item->shallower) : ?>
				</li>
				<?php echo str_repeat('</ul></li>', $item->level_diff); ?>
			<?php else : ?>
				</li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
