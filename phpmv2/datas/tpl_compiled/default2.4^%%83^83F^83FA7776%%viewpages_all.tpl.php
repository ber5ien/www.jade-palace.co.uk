<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:47
         compiled from common/viewpages_all.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/viewpages_all.tpl', 2, false),array('function', 'counter', 'common/viewpages_all.tpl', 34, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp='pagesvues_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>

<!-- Summary Pages -->
<?php $this->assign('idtouse', 'sum'); ?>
<table class="resultats full">
	<tr>
		<th></th>
		<th><?php if ($this->_tpl_vars['period'] == 1): ?> <?php echo ((is_array($_tmp='pagesvues_joursel')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <small>(<?php endif;  echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['0']['0'];  if ($this->_tpl_vars['period'] == 1): ?>)</small><?php endif; ?></th>	
		<th><?php if ($this->_tpl_vars['period'] == 1): ?>	<?php echo ((is_array($_tmp='pagesvues_jmoins7')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <small>(<?php endif;  echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['0']['1'];  if ($this->_tpl_vars['period'] == 1): ?>)</small><?php endif; ?></th>
		<th><?php if ($this->_tpl_vars['period'] == 1): ?> <?php echo ((is_array($_tmp='pagesvues_jmoins14')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 <small>(<?php endif;  echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['0']['2'];  if ($this->_tpl_vars['period'] == 1): ?>)</small><?php endif; ?></th>
	</tr>
	<tr>
		<td class="libelle"><?php echo ((is_array($_tmp='pagesvues_pagesvues')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['0']['nb_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['1']['nb_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['2']['nb_pag']; ?>
</td>
	</tr>
	<tr>
		<td class="libelle"><?php echo ((is_array($_tmp='pagesvues_pagesvudiff')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['0']['nb_uniq_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['1']['nb_uniq_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['2']['nb_uniq_pag']; ?>
</td>
	</tr>
	<tr>
		<td class="libelle"><?php echo ((is_array($_tmp='pagesvues_recordpages')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['0']['nb_max_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['1']['nb_max_pag']; ?>
</td>
		<td class="columndetail"><?php echo $this->_tpl_vars['zoom'][$this->_tpl_vars['idtouse']]['2']['2']['nb_max_pag']; ?>
</td>
	</tr>
</table>

<!-- Pages table -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php echo smarty_function_counter(array('name' => 'i'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<a id="i<?php echo $this->_tpl_vars['i']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='pagesvues_pagesvues')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<table class="resultats full">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/viewpages_details.tpl", 'smarty_include_vars' => array('includeFromPage' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>
<?php $_tplvars_stack = array(); $_tplvars_stack_rank = 0;

  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('id', 'pag');
$this->assign('data', 'pag');
$this->assign('template', "common/link_population_pages.tpl");
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/link_population_pages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>
<p>
<a class="help_pagename" href="./index.php?mod=admin_help_pagename"><?php echo ((is_array($_tmp='pagesvues_help_pagename')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
<br/>
<a class="help_pagename" href="./index.php?mod=admin_url_redirection_generate"><?php echo ((is_array($_tmp='pagesvues_help_track_dls')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
</p>
<!-- Time per pages -->
<?php $this->assign('idtouse', 'sumtime');  echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php echo smarty_function_counter(array('name' => 'i'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<a id="i<?php echo $this->_tpl_vars['i']; ?>
"></a>
<a id="ancre1"></a>
<h3><?php echo ((is_array($_tmp='pagesvues_tempsparpage')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<table class="resultats full">
	<tr>
		<th>
		</th>
		<th>
			<?php echo ((is_array($_tmp='pagesvues_total_time')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<em>
			<a href="<?php echo $this->_tpl_vars['url_a_exit_sort']; ?>
&amp;a_sumtime_sort=sumtime.asc.<?php echo $this->_tpl_vars['a']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['4']; ?>
#a<?php echo $this->_tpl_vars['a']; ?>
"><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/sortasc<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['0'] == "sumtime.asc"): ?>r<?php endif; ?>.gif" alt="" /></a> 
			<a href="<?php echo $this->_tpl_vars['url_a_exit_sort']; ?>
&amp;a_sumtime_sort=sumtime.desc.<?php echo $this->_tpl_vars['a']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['4']; ?>
#a<?php echo $this->_tpl_vars['a']; ?>
"><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/sortdesc<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['0'] == "sumtime.desc"): ?>r<?php endif; ?>.gif" alt="" /></a>
			</em>
		</th>
		<th>
			<?php echo ((is_array($_tmp='pagesvues_avg_time')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			<em>
			<a href="<?php echo $this->_tpl_vars['url_a_exit_sort']; ?>
&amp;a_sumtime_sort=avgtime.asc.<?php echo $this->_tpl_vars['a']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['4']; ?>
#a<?php echo $this->_tpl_vars['a']; ?>
"><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/sortasc<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['0'] == "avgtime.asc"): ?>r<?php endif; ?>.gif" alt="" /></a> 
			<a href="<?php echo $this->_tpl_vars['url_a_exit_sort']; ?>
&amp;a_sumtime_sort=avgtime.desc.<?php echo $this->_tpl_vars['a']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['4']; ?>
#a<?php echo $this->_tpl_vars['a']; ?>
"><img src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
images/sortdesc<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['idtouse']]['0'] == "avgtime.desc"): ?>r<?php endif; ?>.gif" alt="" /></a>
			</em>
		</th>
	</tr>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/viewpages_details.tpl", 'smarty_include_vars' => array('includeFromPage' => 'true')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('id', 'sumtime');
$this->assign('data', 'sumtime');
$this->assign('template', "common/link_population_pages.tpl");
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/link_population_pages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?> 
<div class="centrer">
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<a id="a<?php echo $this->_tpl_vars['a']; ?>
"></a>
<h3><?php echo ((is_array($_tmp='pagesvues_graphsnbpages')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
<img src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=pages_by_visit" alt="" />
</div>