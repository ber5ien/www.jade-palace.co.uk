<?php /* Smarty version 2.6.9, created on 2010-08-09 13:55:21
         compiled from common/page_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/page_index.tpl', 7, false),)), $this); ?>
<?php if ($this->_tpl_vars['offset'] > 0 || $this->_tpl_vars['nb_elements'] > $this->_tpl_vars['offset'] + $this->_tpl_vars['data_limit']): ?>
<tr>
	<td colspan="2" class="nextpreview">
<?php endif; ?>
		<?php if ($this->_tpl_vars['offset'] > 0): ?>
			<a href="javascript:void(0);" onclick="viewNextPreviousRowsDetails(this,'<?php echo $this->_tpl_vars['url_offset']; ?>
&amp;offset=<?php echo $this->_tpl_vars['offset']-$this->_tpl_vars['data_limit'];  if ($this->_tpl_vars['continent_asked']): ?>&amp;id_details_continent=<?php echo $this->_tpl_vars['continent_asked'];  endif; ?>');">
			&lt; <?php echo ((is_array($_tmp='generique_previous')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>

			</a>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['offset'] > 0 && $this->_tpl_vars['nb_elements'] > $this->_tpl_vars['offset'] + $this->_tpl_vars['data_limit']): ?> | <?php endif; ?>
		<?php if ($this->_tpl_vars['nb_elements'] > $this->_tpl_vars['offset'] + $this->_tpl_vars['data_limit']): ?>
			<a href="javascript:void(0);" onclick="viewNextPreviousRowsDetails(this,'<?php echo $this->_tpl_vars['url_offset']; ?>
&amp;offset=<?php echo $this->_tpl_vars['offset']+$this->_tpl_vars['data_limit'];  if ($this->_tpl_vars['continent_asked']): ?>&amp;id_details_continent=<?php echo $this->_tpl_vars['continent_asked'];  endif; ?>');">
			<?php echo ((is_array($_tmp='generique_next')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
 &gt;
			</a>
		<?php endif;  if ($this->_tpl_vars['offset'] > 0 || $this->_tpl_vars['nb_elements'] > $this->_tpl_vars['offset'] + $this->_tpl_vars['data_limit']): ?>
		</td>
	</tr>
<?php endif; ?>