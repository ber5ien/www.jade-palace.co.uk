<?php /* Smarty version 2.6.9, created on 2010-08-09 13:56:48
         compiled from common/viewsettings_all.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/viewsettings_all.tpl', 2, false),array('function', 'counter', 'common/viewsettings_all.tpl', 5, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp='configurations_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>

<!-- Settings -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php $_tplvars_stack = array(); $_tplvars_stack_rank = 0;

  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_configurations');
$this->assign('data', $this->_tpl_vars['config']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>

<!-- Os -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_os');
$this->assign('data', $this->_tpl_vars['os']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>

<!-- Os interests -->
<?php echo smarty_function_counter(array('name' => 'i'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('link', 'configurations_os_interest');
$this->assign('data', $this->_tpl_vars['osinterest']);
$this->assign('template', "common/display_data_array_interest.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array_interest.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>
<div class="centrer">
<img class="detail" src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_os" alt="" />
</div>
<!-- Browsers by type -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_navigateursbytype');
$this->assign('data', $this->_tpl_vars['browserstype']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>
<div class="centrer">
<img class="detail" src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_browsers_type" alt="" />
</div>
<!-- Browsers -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_navigateurs');
$this->assign('data', $this->_tpl_vars['browsers']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>

<!-- Browsers interests -->
<?php echo smarty_function_counter(array('name' => 'i'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('link', 'configurations_navigateurs_interest');
$this->assign('data', $this->_tpl_vars['browsersinterest']);
$this->assign('template', "common/display_data_array_interest.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array_interest.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>
<div class="centrer">
<img class="detail" src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_browsers" alt="" />
</div>
<!-- Plugins -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_plugins');
$this->assign('data', $this->_tpl_vars['plugins']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>
<div class="centrer">
<img class="detail" src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=2&amp;graph_data=settings_plugins" alt="" />
</div>
<!-- Resolution -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_resolutions');
$this->assign('data', $this->_tpl_vars['resolutions']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>

<!-- Resolution Interest -->
<?php echo smarty_function_counter(array('name' => 'i'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('link', 'configurations_resolutions_interest');
$this->assign('data', $this->_tpl_vars['resolutionsinterest']);
$this->assign('template', "common/display_data_array_interest.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array_interest.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>

<div class="centrer">
<img class="detail" src="<?php echo $this->_tpl_vars['url_mod']; ?>
&amp;mod=view_graph&amp;graph_type=3&amp;graph_data=settings_resolutions" alt="" />
</div>
<!-- NormalWidescreen -->
<?php echo smarty_function_counter(array('name' => 'a'), $this);?>

<?php 
  /*** pmv_data_array ***/  
$_tplvars_stack_rank++;
 $_tplvars_stack[$_tplvars_stack_rank] = $this->_tpl_vars; 
$this->assign('headline', 'configurations_rapport');
$this->assign('data', $this->_tpl_vars['normalwidescreen']);
$this->assign('template', "common/display_data_array.tpl");
$this->assign('id', 'int');
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'common/display_data_array.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_tpl_vars = $_tplvars_stack[$_tplvars_stack_rank]; unset($_tplvars_stack[$_tplvars_stack_rank]); $_tplvars_stack--;
 ?>