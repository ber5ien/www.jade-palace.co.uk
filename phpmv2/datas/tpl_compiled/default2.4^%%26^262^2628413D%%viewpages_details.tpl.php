<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:48
         compiled from common/viewpages_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'common/viewpages_details.tpl', 4, false),array('modifier', 'truncate', 'common/viewpages_details.tpl', 13, false),array('modifier', 'translate', 'common/viewpages_details.tpl', 27, false),array('modifier', 'time', 'common/viewpages_details.tpl', 40, false),array('modifier', 'print_percent', 'common/viewpages_details.tpl', 45, false),array('modifier', 'string_format', 'common/viewpages_details.tpl', 49, false),)), $this); ?>
<?php if ($this->_tpl_vars['includeFromPage'] != 'true'): ?>
<div>
<?php endif;  echo smarty_function_counter(array('print' => false,'assign' => 'cwtb','start' => 0), $this);?>

<?php $_from = $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
 if ($this->_tpl_vars['info'][$this->_tpl_vars['idtouse']] != 0): ?>
<tr <?php if ($this->_tpl_vars['info']['type'] == 'category'): ?> class="expandcollapse" onclick="loadDetailXML ('<?php echo $this->_tpl_vars['idtouse']; ?>
', this, '<?php echo $this->_tpl_vars['url_pages_details']; ?>
&amp;mod=view_pages_details&amp;idtouse=<?php echo $this->_tpl_vars['idtouse']; ?>
&amp;c_id_zoom=<?php echo $this->_tpl_vars['info']['id']; ?>
');"<?php endif; ?>>
<?php echo smarty_function_counter(array('print' => false,'assign' => 'cwtb'), $this);?>

<td class="libelle">
<?php if ($this->_tpl_vars['info']['type'] == 'category'): ?>
<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/groupswitcha.png" alt="expend collapse" style="margin-left: -15px;" />
<?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['info']['data'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, "...") : smarty_modifier_truncate($_tmp, 50, "...")); ?>

	<?php if ($this->_tpl_vars['info']['type'] == 'file'): ?>
		<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/download.png" />
	<?php elseif ($this->_tpl_vars['info']['type'] == 'rss'): ?>
		<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/rss.png" />
	<?php elseif ($this->_tpl_vars['info']['type'] == 'podcast'): ?>
		<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/podcast.png" />
<?php endif; ?>
	<?php if (sizeof ( $this->_tpl_vars['info']['vars'] ) != 0 && $this->_tpl_vars['idtouse'] == 'sum'): ?>
	<span style="cursor:pointer;color:red;font-size:x-small;vertical-align:50%;" onmouseover="pointer(this)"
	  onclick="displayVariables( this.parentNode );"> + </span>
		<div style="display:none;">
				<table cellspacing="0" align="right">
				<tr><th colspan="2">
				<?php echo ((is_array($_tmp='generique_variables')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

				</th></tr>
				<?php $_from = $this->_tpl_vars['info']['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var_name'] => $this->_tpl_vars['a_var']):
?>
					<tr><td colspan="2" class="header"><?php echo $this->_tpl_vars['var_name']; ?>
</td></tr>
					<?php $_from = $this->_tpl_vars['a_var']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['var_value'] => $this->_tpl_vars['var_count']):
?>
					<tr><td class="data"><?php echo $this->_tpl_vars['var_value']; ?>
</td><td class="nb"> <?php echo $this->_tpl_vars['var_count']; ?>
</td></tr>
					<?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
				</table>
		</div>
	<?php endif; ?>
</td>
<td class="columndetail">
<?php if ($this->_tpl_vars['idtouse'] == 'sumtime'):  echo ((is_array($_tmp=$this->_tpl_vars['info'][$this->_tpl_vars['idtouse']])) ? $this->_run_mod_handler('time', true, $_tmp) : smarty_modifier_time($_tmp));  else:  echo $this->_tpl_vars['info'][$this->_tpl_vars['idtouse']]; ?>

<?php endif; ?>
</td>
<?php if ($this->_tpl_vars['idtouse'] == 'sum'): ?>
<td class="columndetail"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['percentn1'])) ? $this->_run_mod_handler('print_percent', true, $_tmp) : smarty_modifier_print_percent($_tmp)); ?>
 <small>(<?php echo $this->_tpl_vars['info']['sumn1']; ?>
)</small></td>
<td class="columndetail"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['percentn2'])) ? $this->_run_mod_handler('print_percent', true, $_tmp) : smarty_modifier_print_percent($_tmp)); ?>
 <small>(<?php echo $this->_tpl_vars['info']['sumn2']; ?>
)</small></td>
<?php endif;  if ($this->_tpl_vars['idtouse'] == 'exit'): ?>
<td class="columndetail"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['exitrate'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 %</td>
<?php endif;  if ($this->_tpl_vars['idtouse'] == 'sumtime'): ?>
<td class="columndetail"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['avgtime'])) ? $this->_run_mod_handler('time', true, $_tmp) : smarty_modifier_time($_tmp)); ?>
</td>
<?php endif; ?>
</tr>
<?php endif;  endforeach; endif; unset($_from);  if ($this->_tpl_vars['includeFromPage'] != 'true'): ?>
</div>
<?php endif; ?>