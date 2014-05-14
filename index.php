<html>
<head>

</head>
<body>
    <h1>CKEditor CKFinder Integration using PHP</h1>

<?php
				include("ckeditorphp/ckeditor.php");
				include("ckfinder/ckfinder.php");
				$CKEditor = new CKEditor();
				$CKEditor->returnOutput = true;
				$CKEditor->basePath = 'ckeditorphp/';
				$CKEditor->config['width'] = 700;
				$CKEditor->textareaAttributes = array("cols" => 100, "rows" => 25);
				$config['toolbar'] = array(
					array('Source','NewPage','DocProps','Preview','Print','-','Templates'),
					array('Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo'),
					array('Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt'),
					array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'),
					array('Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat'),
					array('NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'),
					array('Link','Unlink','Anchor'),
					array('Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'),
					array('Styles','Format','Font','FontSize'),
					array('TextColor','BGColor'),
					array('Maximize', 'ShowBlocks')
				);
				$ckeditor -> config [ 'filebrowserBrowseUrl' ]  =  'ckfinder/ckfinder.html' ; 
				$ckeditor -> config [ 'filebrowserImageBrowseUrl' ]  =  'ckfinder/ckfinder.html?type=Images' ; 
				$ckeditor -> config [ 'filebrowserFlashBrowseUrl' ]  =  'ckfinder/ckfinder.html?type=Flash' ; 
				$ckeditor -> config [ 'filebrowserUploadUrl' ]  =  'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files' ; 
				$ckeditor -> config [ 'filebrowserImageUploadUrl' ]  =  'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images' ; 
				$ckeditor -> config [ 'filebrowserFlashUploadUrl' ]  =  'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' ; 
				$config['skin'] = 'kama';
				$initialValue = '';
				$ckfinder  =  new CKFinder () ; 
				$ckfinder -> BasePath  =  'ckfinder/' ;
				$ckfinder -> SetupCKEditorObject($CKEditor); 
				// Create the second instance.
				echo $CKEditor->editor('mieditor', $initialValue, $config);
				?>
                <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
</body>
</html>