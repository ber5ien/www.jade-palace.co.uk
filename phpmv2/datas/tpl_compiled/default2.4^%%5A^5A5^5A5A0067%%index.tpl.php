<?php /* Smarty version 2.6.9, created on 2010-08-09 13:58:26
         compiled from admin/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'admin/index.tpl', 1, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp='liens_admin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>
<div id="administration">
	<p class="texte"><?php echo ((is_array($_tmp='admin_intro')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['link_doc']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['link_doc'])); ?>
</p>
	<div id="generalAdmin">
		<h3><?php echo ((is_array($_tmp='install_general_setup')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
		<h5><?php echo ((is_array($_tmp='admin_configuration')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=admin_general_config"><?php echo ((is_array($_tmp='admin_general_conf')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_db_config"><?php echo ((is_array($_tmp='install_database_setup')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		<h5><?php echo ((is_array($_tmp='admin_user_title')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=admin_group&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_group_title')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=add&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_user_add')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=mod&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_user_mod')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_user&amp;action=del&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_user_del')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		<h5><?php echo ((is_array($_tmp='admin_server_info')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=admin_server_info"><?php echo ((is_array($_tmp='admin_server_info')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		<h5>Plugins</h5>
		<ul>
		<li><a href="./index.php?mod=admin_plugin_config&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
">Manage plugins</a></li>
		<?php $_from = $this->_tpl_vars['installedPlugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['boucle'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['boucle']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['raw']):
        $this->_foreach['boucle']['iteration']++;
?>
			<?php if ($this->_tpl_vars['raw']['type'] == 'admin'): ?>
			<li><a href="./index.php?mod=<?php echo $this->_tpl_vars['key']; ?>
.<?php echo $this->_tpl_vars['raw']['mod']; ?>
&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php if ($this->_tpl_vars['raw']['langPath']):  echo ((is_array($_tmp=$this->_tpl_vars['raw']['title'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp));  else:  echo $this->_tpl_vars['raw']['title'];  endif; ?></a></li>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
		<h5><?php echo ((is_array($_tmp='generique_other')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=send_mail"><?php echo ((is_array($_tmp='admin_send_mail')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=view_rss&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
"><?php echo ((is_array($_tmp='admin_rss_feed')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=view_rss&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_rss_feed_specific_site')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['site_selected']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['site_selected'])); ?>
</a></li>
		<li><a href="./index.php?mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='pdf_generate_link')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['site_selected']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['site_selected'])); ?>
</a></li>
		<li><a href="./index.php?mod=view_pdf_v2&amp;rss_hash=<?php echo $this->_tpl_vars['rss_hash']; ?>
"><?php echo ((is_array($_tmp='pdf_summary_generate_link')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['site_selected']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['site_selected'])); ?>
</a></li>
		</ul>
		<h5><?php echo ((is_array($_tmp='admin_last_version')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<a href="http://www.phpmyvisites.us/"><img src="http://www.phpmyvisites.net/test-last-version-available.php?version=<?php echo $this->_tpl_vars['PHPMV_VERSION']; ?>
"></a>
	</div>
	<div id="detailAdmin">
		<h3><?php echo ((is_array($_tmp='admin_site_admin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h3>
		<h5><?php echo ((is_array($_tmp='install_general_setup')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=admin_site_general&amp;action=add"><?php echo ((is_array($_tmp='admin_site_add')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_general&amp;action=mod&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_site_mod')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_general&amp;action=del&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_site_del')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_urls&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_url_alias')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		
		<h5><?php echo ((is_array($_tmp='generique_other')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<ul>
		<li><a href="./index.php?mod=admin_site_javascript_code&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_afficherjavascript')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_url_redirection_generate&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_url_generate_title')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_help_pagename&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><b>How to give a friendly name to your pages?</b></a></li>
		<br/>
		<li><a href="./index.php?mod=admin_site_cookie_exclude&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_cookieadmin')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_ip_exclude&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_ip_ranges')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		
		<h5><?php echo ((is_array($_tmp='affluents_newslettersimg')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<p class="helpAdmintext">To detect a visitor from a newsletter in the Referrers section of phpMyVisites, you have
		to add the parameter "<?php echo $this->_tpl_vars['PARAM_URL_NEWSLETTER']; ?>
" in the URLs in your newsletters.</p>
		<p class="helpAdmintext">For example if you have a link in your newsletter which is "http://www.site.com/index.php?part=misc"</p>
		<p class="helpAdmintext">You have to change it to "http://www.site.com/index.php?part=misc&<?php echo $this->_tpl_vars['PARAM_URL_NEWSLETTER']; ?>
=XXXXXXX" where XXXXXXX is the <?php echo $this->_tpl_vars['PARAM_URL_NEWSLETTER']; ?>

		of the newsletter you've saved in phpmyvisites.</p>
		<p class="helpAdmintext">Another example : "http://www.site.com/" will be "http://www.site.com/?<?php echo $this->_tpl_vars['PARAM_URL_NEWSLETTER']; ?>
=XXXXXXX".</p>
		<ul>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=add&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_nl_add')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=mod&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_nl_mod')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_newsletters&amp;action=del&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_nl_del')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		
		<h5><?php echo ((is_array($_tmp='affluents_partenairesimg')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>

		<p class="helpAdmintext">To detect a partner website as is, you have to enter its url or add a parameters to the link from its site
		to your site (as in the newsletters). This parameter's name is "<?php echo $this->_tpl_vars['PARAM_URL_PARTNER']; ?>
".</p>
		<p class="helpAdmintext">For example if the partner "Tourloutiti" has a "<?php echo $this->_tpl_vars['PARAM_URL_PARTNER']; ?>
=14", you can ask him to change its link to your site adding "<?php echo $this->_tpl_vars['PARAM_URL_PARTNER']; ?>
=14" as an URL parameter.
		But the simplest is to save all its urls and "Tourloutiti" will be automatically recognized as a partner website in the Referers part.</p>

		<ul>	
		<li><a href="./index.php?mod=admin_site_partners&amp;action=add&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_partner_add')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_partners&amp;action=mod&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_partner_mod')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_partners&amp;action=del&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_partner_del')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		
		<h5>[ beta ] <?php echo ((is_array($_tmp='generique_pdf')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h5>
		<p class="helpAdmintext">You can create personalized PDF report to create the PDF containing only the statistics you need!</p>
		<ul>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=add&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_pdf_add')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=mod&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_pdf_mod')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		<li><a href="./index.php?mod=admin_site_pdf_config&amp;action=del&amp;site=<?php echo $this->_tpl_vars['site_selected']; ?>
&amp;adminsite=<?php echo $this->_tpl_vars['site_selected']; ?>
"><?php echo ((is_array($_tmp='admin_pdf_del')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</a></li>
		</ul>
		
	</div>
	
	<div class="both"></div>
</div>
<div class="centrer">
<p>Version : phpMyVisites <?php echo $this->_tpl_vars['PHPMV_VERSION']; ?>
</p>
</div>