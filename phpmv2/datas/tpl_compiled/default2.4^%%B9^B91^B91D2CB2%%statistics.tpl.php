<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:00
         compiled from common/statistics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/statistics.tpl', 1, false),array('modifier', 'string_format', 'common/statistics.tpl', 29, false),array('modifier', 'time_visit', 'common/statistics.tpl', 37, false),)), $this); ?>
<h3><?php echo ((is_array($_tmp='visites_statistiques')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<div class="centrer">
<table class="resultats expansive">
<tbody>
<tr>
	<th colspan="2">
			<strong><?php echo ((is_array($_tmp='visites_periodesel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</strong>
	</th>
</tr>
<tr>
	<td class="damieralign">
		<?php echo ((is_array($_tmp='visites_visites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

	</td>
	<td>
		<strong><?php echo $this->_tpl_vars['statistics']['nb_vis']; ?>
</strong>
	</td>
</tr>
<tr>
	<td class="align"><?php echo ((is_array($_tmp='visites_uniques')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td class="damier"><strong><?php echo $this->_tpl_vars['statistics']['nb_uniq_vis']; ?>
</strong></td>
</tr>

<tr>
	<td class="damieralign"><?php echo ((is_array($_tmp='visites_pagesvues')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td><strong><?php echo $this->_tpl_vars['statistics']['nb_pag']; ?>
</strong></td>
</tr>
<tr>
	<td class="align"><?php echo ((is_array($_tmp='visites_pagesvisiteurs')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td class="damier"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['nb_pag_per_vis'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.1f") : smarty_modifier_string_format($_tmp, "%.1f")); ?>
</strong></td>
</tr>
<tr>
	<td class="damieralign"><?php echo ((is_array($_tmp='visites_pagesvisitessign')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['nb_pag_per_vis_sig'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.1f") : smarty_modifier_string_format($_tmp, "%.1f")); ?>
</strong></td>
</tr>
<tr>
	<td class="align"><?php echo ((is_array($_tmp='visites_tempsmoyen')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td class="damier"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['time_per_vis'])) ? $this->_run_mod_handler('time_visit', true, $_tmp) : smarty_modifier_time_visit($_tmp)); ?>
</strong></td>
</tr>
<tr>
	<td class="damieralign"><?php echo ((is_array($_tmp='visites_tempsmoyenpv')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['time_per_pag'])) ? $this->_run_mod_handler('time_visit', true, $_tmp) : smarty_modifier_time_visit($_tmp)); ?>
</strong></td>
</tr>
<tr>
	<td class="align"><?php echo ((is_array($_tmp='visites_tauxvisite')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td class="damier"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['one_page_rate'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.0f") : smarty_modifier_string_format($_tmp, "%.0f")); ?>
%</strong></td>
</tr>
<?php if ($this->_tpl_vars['statistics']['average_visits_per_day']): ?>
<tr>
	<td class="damieralign"><?php echo ((is_array($_tmp='visites_average_visits_per_day')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
	<td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['statistics']['average_visits_per_day'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%d") : smarty_modifier_string_format($_tmp, "%d")); ?>
</strong></td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>