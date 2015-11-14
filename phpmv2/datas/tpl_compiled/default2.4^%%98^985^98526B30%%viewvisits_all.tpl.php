<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:00
         compiled from common/viewvisits_all.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/viewvisits_all.tpl', 2, false),array('modifier', 'print_percent', 'common/viewvisits_all.tpl', 25, false),array('function', 'counter', 'common/viewvisits_all.tpl', 3, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp='visites_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/statistics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_recapperiode')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<div class="centrer">

<table class="resultats full">
<tr>
	<td class="vide"></td>
<?php $_from = $this->_tpl_vars['periodsummaries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
	<th><?php echo $this->_tpl_vars['info']['date']; ?>
</th>
<?php endforeach; endif; unset($_from); ?>
</tr>
<tr>
	<td><strong><?php echo ((is_array($_tmp='visites_nbvisites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong></td>
<?php $_from = $this->_tpl_vars['periodsummaries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
	<td>
		<?php if ($this->_tpl_vars['info']['visits'] == 0): ?> <?php echo ((is_array($_tmp='visites_aucunevivisite')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

		<?php else:  echo ((is_array($_tmp=$this->_tpl_vars['info']['visits_percent'])) ? $this->_run_mod_handler('print_percent', true, $_tmp) : smarty_modifier_print_percent($_tmp)); ?>
 <small>(<?php echo $this->_tpl_vars['info']['visits']; ?>
)</small>
		<?php endif; ?>
	</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
<tr>
	<td><strong><?php echo ((is_array($_tmp='visites_pagesvues')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong></td>
<?php $_from = $this->_tpl_vars['periodsummaries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
	<td>
		<?php if ($this->_tpl_vars['info']['visits'] == 0): ?> <?php echo ((is_array($_tmp='visites_aucunevivisite')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

		<?php else:  echo ((is_array($_tmp=$this->_tpl_vars['info']['pages_percent'])) ? $this->_run_mod_handler('print_percent', true, $_tmp) : smarty_modifier_print_percent($_tmp)); ?>
 <small>(<?php echo $this->_tpl_vars['info']['pages']; ?>
)</small>
		<?php endif; ?>
	</td>
<?php endforeach; endif; unset($_from); ?>

</tr>
</table>

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_grapghrecap')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=1&amp;graph_data=visits_period_summaries" alt="" />

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_grapghrecaplongterm')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=1&amp;graph_data=visits_all_period_summary" alt="" />

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_graphtempsvisites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_time" alt="" />

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_graphheureserveur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_server_time" alt="" />

<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='visites_graphheurevisiteur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=visits_local_time" alt="" />
</div>