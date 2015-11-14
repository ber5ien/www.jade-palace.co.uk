<?php /* Smarty version 2.6.9, created on 2010-08-09 14:02:47
         compiled from admin/site_pdf_config.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'translate', 'admin/site_pdf_config.tpl', 38, false),)), $this); ?>
<!-- include file=admin/form.tpl -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/form_header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<style type="text/css">
.pdfTrSelected {
	background-color: #fbc074;
}
TABLE.pdfTableLine TD {
	border: 0px;
}
.pdfPlusMoins {
	width: 20px;
}
.pdfBtAddRemove {
	padding: 0px;
	padding-top:0px;
	padding-bottom:0px;
}
.pdfAction:hover {
	text-decoration: underline ;
}
</style>
'; ?>

<div align="center">
<p class="texte">You can create PDF reports templates that will contain only the statistics you want!
On the left you have the different statistics available. You can click on the arrows to move the statistics to the right side, which is your PDF template. 
Once you've finished, click submit. You can now generate this PDF in the Statistics interface, by clicking on the menu near the PDF image button.</p>
	<form <?php echo $this->_tpl_vars['form_data']['attributes']; ?>
>
	<input type="hidden" name='form_site_admin' value="<?php echo $this->_tpl_vars['siteAdmin']; ?>
">
	<input type="hidden" name='form_id' value="<?php echo $this->_tpl_vars['pdfId']; ?>
">
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['PMV_THEME']; ?>
include/pdf_config.js"></script>

<script type="text/javascript">


var cleDstPage = "P";

var LIB_SHOW_INTEREST = "<?php echo ((is_array($_tmp='pdf_lib_show_interest')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_HIDE_INTEREST = "<?php echo ((is_array($_tmp='pdf_lib_hide_interest')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_SHOW_ALL = "<?php echo ((is_array($_tmp='pdf_lib_show_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_HIDE_ALL = "<?php echo ((is_array($_tmp='pdf_lib_hide_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_EDIT_TEXT = "<?php echo ((is_array($_tmp='pdf_lib_edit_text')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_NEED_AT_LEAST_ONE_PAGE = "<?php echo ((is_array($_tmp='pdf_lib_need_at_least_one_page')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_CAN_NOT_ADD_CHAPTER = "<?php echo ((is_array($_tmp='pdf_lib_can_not_add_chapter')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
var LIB_PDF_NAME_MANDATORY = "<?php echo ((is_array($_tmp='pdf_lib_pdf_name_mandatory')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";

var tabSrc = new Array();
var tabDst = new Array();
var nbPageSelected = -1;
var nbPageDstKey = -1;

var tabSrcByKey = new Array();
var nbSrc = 0;
var nbDst = 0;

var langContinent = new Array;
var sepContinent = " ,";
var msgContinent = "Empty, eur, afr, asi, oce, ams, amn";

langContinent[""] = "Monde";
langContinent["eur"] = "<?php echo ((is_array($_tmp='eur')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
langContinent["afr"] = "<?php echo ((is_array($_tmp='afr')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
langContinent["asi"] = "<?php echo ((is_array($_tmp='asi')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
langContinent["oce"] = "<?php echo ((is_array($_tmp='oce')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
langContinent["ams"] = "<?php echo ((is_array($_tmp='ams')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";
langContinent["amn"] = "<?php echo ((is_array($_tmp='amn')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
";

<?php $_from = $this->_tpl_vars['choix_pdf']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['boucle'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['boucle']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['keyChapter'] => $this->_tpl_vars['raw']):
        $this->_foreach['boucle']['iteration']++;
?>
	<?php if ($this->_tpl_vars['raw']['PAG'] == 'true'):  $this->assign('pageKey', $this->_tpl_vars['keyChapter']); ?>
tabSrc[nbSrc++] = new ChoixChapter("<?php echo $this->_tpl_vars['keyChapter']; ?>
", "<?php echo $this->_tpl_vars['keyChapter']; ?>
", "<?php echo ((is_array($_tmp=$this->_tpl_vars['raw']['TIT'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
", "false", "false", true, "<?php echo $this->_tpl_vars['raw']['PAR1']; ?>
");
	<?php else: ?>
tabSrc[nbSrc++] = new ChoixChapter("<?php echo $this->_tpl_vars['pageKey']; ?>
", "<?php echo $this->_tpl_vars['keyChapter']; ?>
", "<?php echo ((is_array($_tmp=$this->_tpl_vars['raw']['TIT'])) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
", "<?php echo $this->_tpl_vars['raw']['ALL']; ?>
", "<?php echo $this->_tpl_vars['raw']['INT']; ?>
", false, "<?php echo $this->_tpl_vars['raw']['PAR1']; ?>
");
	<?php endif; ?>
tabSrcByKey["<?php echo $this->_tpl_vars['keyChapter']; ?>
"] = tabSrc[nbSrc-1];
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['pdf']->pdfParam; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyChapter'] => $this->_tpl_vars['raw']):
 if (( $this->_tpl_vars['raw']['0'] != '0' )): ?>
if (tabSrcByKey["<?php echo $this->_tpl_vars['raw']['0']; ?>
"].isPage) nbPageSelected++; 
tabDst[nbDst++] = new ChoixChapter(cleDstPage+nbPageSelected,
		 "<?php echo $this->_tpl_vars['raw']['0']; ?>
", tabSrcByKey["<?php echo $this->_tpl_vars['raw']['0']; ?>
"].lib, 
		 "<?php echo $this->_tpl_vars['raw']['1']; ?>
",
		 "<?php echo $this->_tpl_vars['raw']['2']; ?>
", tabSrcByKey["<?php echo $this->_tpl_vars['raw']['0']; ?>
"].isPage,
		 "<?php echo $this->_tpl_vars['raw']['3']; ?>
");
<?php endif;  endforeach; endif; unset($_from); ?>
nbPageDstKey = nbPageSelected;

//alert(tabDst[1].keyParent + " - " + tabDst[1].isPage);
//alert(tabDst[2].keyParent + " - " + tabDst[2].isPage);

</script>
<table class="resultats" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td class='align'><b>&nbsp;PDF Name :&nbsp;</b></td>
	<td class='align'><input type="text" name="form_name" value="<?php echo $this->_tpl_vars['pdf']->pdfName; ?>
" size="80" maxlength="80"></td>
</tr>
<tr>
	<td class='align'><b>&nbsp;Public PDF :&nbsp;</b></td>
	<td class='align'><input type="radio" name="form_public_pdf" value="yes" <?php if ($this->_tpl_vars['pdf']->isPublic): ?>checked<?php endif; ?> />Yes 
	<input type="radio" name="form_public_pdf" value="no" <?php if (! $this->_tpl_vars['pdf']->isPublic): ?>checked<?php endif; ?>/> No
	</td>
</tr>
</table>
<br>
<table border="0" width="100%" cellpaddin=0 cellspacing=5>
<TR>
	<TD align="center"><input title="Open all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_expand_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="openAll(tabSrc, cleFldSrc)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_collapse_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="closeAll(tabSrc, cleFldSrc)"></TD>
	<TD>&nbsp;</TD>
	<TD align="center"><!-- input title="Open all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_expand_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="openAll(tabDst, cleFldDst)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_collapse_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="closeAll(tabDst, cleFldDst)" --></TD>
	<TD>&nbsp;</TD>
</TR>
<TR>
	<TD valign="top" width="50%">
	<table class="resultats" width="100%" cellpadding="0" cellspacing="0">
	<tbody id="srcTabBody">
	</tbody>
	</table>
	</TD>
	
	<!-- space -->
	<TD>&nbsp;&nbsp;&nbsp;</TD>
	
	<TD valign="top" width="50%">
	<table class="resultats" width="100%">
	<tbody id="dstTabBody">
	</tbody>
	</table>
	</TD>
	
	<TD align="center">
	<input type="button" value=" Up " onClick="upLine ()"><br><br>
	<input type="button" value=" Down " onClick="downLine ()">
	</TD>
</TR>
<TR>
	<TD align="center"><input title="Open all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_expand_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="openAll(tabSrc, cleFldSrc)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_collapse_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="closeAll(tabSrc, cleFldSrc)"></TD>
	<TD>&nbsp;</TD>
	<TD align="center"><!-- input title="Open all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_expand_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="openAll(tabDst, cleFldDst)">&nbsp;&nbsp;&nbsp;<input title="Close all" type="button" value="<?php echo ((is_array($_tmp='pdf_lib_pdf_collapse_all')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" onclick="closeAll(tabDst, cleFldDst)" --></TD>
	<TD>&nbsp;</TD>
</TR>
</TABLE>

<script type="text/javascript">
writeTab ("srcTabBody", tabSrc, cleFldSrc);
writeTab ("dstTabBody", tabDst, cleFldDst);

closeAll(tabSrc, cleFldSrc);
//closeAll(tabDst, cleFldDst);
</script>
	<!-- textarea id="param_pdf_result" name="param_pdf_result" cols="120" rows="10"></textarea -->
	<input id="param_pdf_result" name="param_pdf_result" type="hidden" />
<br>
	<div class="boutonsAction">
	<input name="btsubmit" value="<?php echo ((is_array($_tmp='install_valider')) ? $this->_run_mod_handler('translate', true, $_tmp) : smarty_modifier_translate($_tmp)); ?>
" type="button" onclick="submitPdfConfig()"/>
	<input name="default" value="Default" type="button" onclick="if (confirm('Do you want to set default pdf ?')) location.href='./index.php?mod=admin_site_pdf_config&action=<?php echo $this->_tpl_vars['action']; ?>
&idPdf=<?php echo $this->_tpl_vars['pdfId']; ?>
&adminsite=<?php echo $this->_tpl_vars['siteAdmin']; ?>
&default=true';"/>
	<!-- input name="test" value="Test" type="button" onclick="writeResult()"/ -->
	<?php if ($this->_tpl_vars['mod'] == 'admin'): ?>
	<?php echo $this->_tpl_vars['form_data']['back']['html']; ?>

	<?php endif; ?>
	</div>
	</form> 
</div>