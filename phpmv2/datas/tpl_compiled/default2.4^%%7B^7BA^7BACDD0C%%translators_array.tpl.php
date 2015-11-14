<?php /* Smarty version 2.6.9, created on 2010-08-10 02:29:52
         compiled from common/translators_array.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/translators_array.tpl', 4, false),)), $this); ?>
<div class="centrer">
<table class="resultats">
<tr>
	<th><?php echo ((is_array($_tmp='generique_langue')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</th>
	<th><?php echo ((is_array($_tmp='generique_traducteur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['translators_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
<tr>
	<td><a href="index.php?lang=<?php echo $this->_tpl_vars['info']['lang_file']; ?>
&mod=contacts"><?php echo $this->_tpl_vars['info']['lang_name']; ?>
</a></td>
	<td><a href="mailto:<?php echo $this->_tpl_vars['info']['translator_email']; ?>
"><?php echo $this->_tpl_vars['info']['translator_name']; ?>
</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>