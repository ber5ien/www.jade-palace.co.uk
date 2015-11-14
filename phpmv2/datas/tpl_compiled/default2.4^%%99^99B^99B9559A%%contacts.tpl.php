<?php /* Smarty version 2.6.9, created on 2010-08-10 02:29:52
         compiled from common/contacts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'common/contacts.tpl', 1, false),)), $this); ?>
<h1><?php echo ((is_array($_tmp='contacts_titre')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>

<p class="texte"><?php echo ((is_array($_tmp='contacts_auteur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
<p class="texte"><?php echo ((is_array($_tmp='contacts_questions')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['link_forums']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['link_forums'])); ?>
</p>
<p class="texte"><?php echo ((is_array($_tmp='contacts_doc')) ? $this->_run_mod_handler('translate', true, $_tmp, $this->_tpl_vars['link_doc']) : smarty_modifier_translate($_tmp, $this->_tpl_vars['link_doc'])); ?>
</p>

<h1><?php echo ((is_array($_tmp='contacts_merci')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</h1>
<p class="texte"><?php echo ((is_array($_tmp='contacts_thanks_dev')) ? $this->_run_mod_handler('translate', true, $_tmp, "Christophe (PDF Generation, Plugins, etc.), Marc (XHTML/CSS, General), Xavier (Smarty, General),  Jarda (bug fix & other features), All beta testers!") : smarty_modifier_translate($_tmp, "Christophe (PDF Generation, Plugins, etc.), Marc (XHTML/CSS, General), Xavier (Smarty, General),  Jarda (bug fix & other features), All beta testers!")); ?>
</p>
<p class="texte"><?php echo ((is_array($_tmp='contacts_merci3')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>
<p class="texte"><?php echo ((is_array($_tmp='contacts_merci2')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
</p>

<div class="centrer">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/translators_array.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<p>
<a href="http://www.php.net/"><img src="./images/misc/php.png" alt="Powered by PHP" /></a>
<a href="http://pear.php.net/"><img src="./images/misc/pear.png" alt="Powered by PEAR" /></a>
<a href="http://smarty.php.net/"><img src="./images/misc/smarty.png" alt="Powered by Smarty" /></a>
</p>
<p>
<a href="http://www.mysql.com/"><img src="./images/misc/mysql.png" alt="Powered by MySQL" /></a>
</p>	
<p>
<a href="http://www.phpmyvisites.us/"><img src="./images/logos/1.png" alt="web analytics" /></a>
</p>	
<p>
<a href="http://www.getfirefox.com/"><img src="./images/misc/firefox2.png" alt="Powered by Firefox browser" /></a>
<a href="http://en.wikipedia.org/wiki/Linux"><img src="./images/misc/linux.png" alt="Powered by Linux" /></a>
<a href="http://www.kde.org/"><img src="./images/misc/kde.png" alt="Powered by KDE" /></a>
<a href="http://amarok.kde.org/"><img src="./images/misc/amarok.png" alt="Music powered by Amarok" /></a>
</p>
<p>
<a href="http://validator.w3.org/check/referer"><img src="./images/misc/vw3c11.png" alt="Valid XHTML 1.1!" height="31" width="88" /></a>
<a href="http://jigsaw.w3.org/css-validator/"><img src="./images/misc/vcss.png" alt="Valid CSS!" height="31" width="88" /></a>
</p>
</div>