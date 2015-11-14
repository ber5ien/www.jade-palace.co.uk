<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:21
         compiled from common/display_data_array_interest.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count_words', 'common/display_data_array_interest.tpl', 1, false),array('modifier', 'translate', 'common/display_data_array_interest.tpl', 3, false),)), $this); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('count_words', true, $_tmp) : smarty_modifier_count_words($_tmp)) > 25): ?>
<a class="moreinterrest" href="#" onclick="displayInterest(this);return(false);">
<span>+</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

</a>
<div class="center hiddendetails">
<?php echo $this->_tpl_vars['data']; ?>

</div>
<?php endif; ?>