/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.autoParagraph = false;
	config.enterMode = CKEDITOR.ENTER_BR;
	//config.filebrowserBrowseUrl ='/helpdesk/js/ckfinder/ckfinder.html';
	//config.filebrowserImageBrowseUrl ='/helpdesk/js/ckfinder/ckfinder.html?Type=Images';
    //config.filebrowserFlashBrowseUrl ='/helpdesk/js/ckfinder/ckfinder.html?Type=Flash';
    //config.filebrowserUploadUrl ='/helpdesk/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   // config.filebrowserImageUploadUrl ='/helpdesk/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
   // config.filebrowserFlashUploadUrl ='/helpdesk/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	config.ignoreEmptyParagraph = false;
	//config.contentsCss=['/helpdesk/css/reset.css','/helpdesk/css/screen.css'];
	config.pasteFromWordRemoveFontStyles = false;
	config.stylesheetParser_skipSelectors = /(^body\.|^caption\.|\.high|^\.)/i;
	config.toolbar_Full =
	[
		{ name: 'document',    items : [ 'Source'] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar'] },	{ name: 'colors',      items : [ 'TextColor','BGColor' ] },	
		'/',
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },					       	{ name: 'styles',      items : [ 'Format','Font','FontSize' ] },
		
		{ name: 'tools',       items : [ 'Maximize'] }
	];
	
	/*config.toolbar_Full =
	[
		{ name: 'document',    items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'forms',       items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] },
		{ name: 'tools',       items : [ 'Maximize', 'ShowBlocks','-','About' ] }
	];*/
};
