<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:48
         compiled from common/link_population_pages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/link_population_pages.tpl', 4, false),)), $this); ?>
<p class="includexecludeall">
<?php if ($this->_tpl_vars['info_sort'][$this->_tpl_vars['id']]['4'] == "0.0"): ?>
<a href="<?php echo $this->_tpl_vars['url_a_int_sort']; ?>
&amp;a_<?php echo $this->_tpl_vars['id']; ?>
_sort=<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id']]['0']; ?>
.<?php echo $this->_tpl_vars['i']; ?>
.<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id']]['7']; ?>
#i<?php echo $this->_tpl_vars['i']; ?>
">
	<?php echo ((is_array($_tmp='generique_lowpop')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

</a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['url_a_int_sort']; ?>
&amp;a_<?php echo $this->_tpl_vars['id']; ?>
_sort=<?php echo $this->_tpl_vars['info_sort'][$this->_tpl_vars['id']]['0']; ?>
.<?php echo $this->_tpl_vars['i']; ?>
.0.0#i<?php echo $this->_tpl_vars['i']; ?>
">
	<?php echo ((is_array($_tmp='generique_allpop')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

</a>
<?php endif; ?>
</p>