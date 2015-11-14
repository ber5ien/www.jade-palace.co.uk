<?php /* Smarty version 2.6.9, created on 2010-08-09 14:03:20
         compiled from common/structure_mail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/structure_mail.tpl', 1, false),array('function', 'counter', 'common/structure_mail.tpl', 3, false),)), $this); ?>
<img alt="<?php echo ((is_array($_tmp='menu_visites')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" src="cid:my-attach">

<?php echo smarty_function_counter(array('print' => false,'assign' => 'a','name' => 'a','start' => 0), $this);?>


<?php $this->assign('mod', 'rss');  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/statistics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<a href="<?php echo $this->_tpl_vars['url_phpmv']; ?>
"><?php echo ((is_array($_tmp='rss_go')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>