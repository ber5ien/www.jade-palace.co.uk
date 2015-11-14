<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:21
         compiled from common/data_array.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/data_array.tpl', 6, false),array('modifier', 'mb_truncate', 'common/data_array.tpl', 22, false),array('modifier', 'string_format', 'common/data_array.tpl', 28, false),array('function', 'cycle', 'common/data_array.tpl', 10, false),)), $this); ?>
<?php if ($this->_tpl_vars['data']): ?>
<div class="centrer">
<table class="resultats expansive" width="<?php if ($this->_tpl_vars['id'] == 'refererskeywords'): ?>600<?php elseif ($this->_tpl_vars['id'] == 'settingsconfig' || $this->_tpl_vars['id'] == 'refererssites'): ?>500<?php else: ?>400<?php endif; ?>px">
<tr>
<th><?php echo $this->_tpl_vars['headline']; ?>
</th>
<th width="130px"><?php echo ((is_array($_tmp='generique_nombre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['boucle'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['boucle']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['raw']):
        $this->_foreach['boucle']['iteration']++;
?>
<tr	<?php if ($this->_tpl_vars['raw']['id']): ?>class="expandcollapse" onclick="viewRowsDetails(this,'<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_data_array&amp;method_name=<?php echo $this->_tpl_vars['id']; ?>
details&amp;id_details=<?php echo $this->_tpl_vars['raw']['id']; ?>
');"<?php elseif ($this->_tpl_vars['raw']['continent']): ?>class="expandcollapse" onclick="window.location.href='<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_source&amp;id_details_continent=<?php echo $this->_tpl_vars['raw']['continent']; ?>
#a1';"<?php endif; ?>>
<?php echo smarty_function_cycle(array('values' => ",damier",'assign' => 'style'), $this);?>

<td class="<?php echo $this->_tpl_vars['style']; ?>
align" >
<strong>
<?php if ($this->_tpl_vars['raw']['img']): ?>
<img src="<?php echo $this->_tpl_vars['path'][$this->_tpl_vars['id']]; ?>
/<?php echo $this->_tpl_vars['raw']['img']; ?>
" alt="" />
<?php elseif ($this->_tpl_vars['raw']['id']): ?>
<img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/f5switcha.png" alt="" />
<?php elseif ($this->_tpl_vars['raw']['url']): ?>
<a href="<?php echo $this->_tpl_vars['raw']['url']; ?>
">
<?php elseif ($this->_tpl_vars['id'] == 'world'): ?>
<a href="<?php echo $this->_tpl_vars['url']; ?>
&amp;continent_zoom=<?php echo $this->_tpl_vars['raw']['continent']; ?>
#a<?php echo $this->_tpl_vars['a']; ?>
">
<?php endif; ?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['raw']['data'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 60, '...') : smarty_modifier_mb_truncate($_tmp, 60, '...')); ?>

	<?php if ($this->_tpl_vars['raw']['url'] || $this->_tpl_vars['id'] == 'world'): ?></a>
<?php endif; ?>
</strong>
</td>
<td <?php if ($this->_tpl_vars['style']): ?>class="<?php echo $this->_tpl_vars['style']; ?>
"<?php endif; ?>>
<?php echo $this->_tpl_vars['raw']['sum']; ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['raw']['percent'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 %)
</td>
</tr>
<?php endforeach; endif; unset($_from);  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/page_index.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>
</div>
<?php else: ?>null<?php endif; ?>