<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:21
         compiled from common/link_population.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/link_population.tpl', 3, false),)), $this); ?>
<p class="includexecludeall">
<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['id_sort']]['4'] == "0.0"): ?>
<a href="javascript:void(0);" onclick="javascript:changeDetails(this,'<?php echo $this->_tpl_vars['url_a_int_sort']; ?>
&amp;a_<?php echo $this->_tpl_vars['id_sort']; ?>
_sort=<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id_sort']]['0']; ?>
.<?php echo $this->_tpl_vars['i']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id_sort']]['7']; ?>
');"><?php echo ((is_array($_tmp='generique_lowpop')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
<?php else: ?>
<a href="javascript:void(0);" onclick="javascript:changeDetails(this,'<?php echo $this->_tpl_vars['url_a_int_sort']; ?>
&amp;a_<?php echo $this->_tpl_vars['id_sort']; ?>
_sort=<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id_sort']]['0']; ?>
.<?php echo $this->_tpl_vars['i']; ?>
.0.0');"><?php echo ((is_array($_tmp='generique_allpop')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a>
<?php endif; ?>
</p>