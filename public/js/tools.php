<?php

function punyMce ($ids=array('texte2')) {
	$code = '<script type="text/javascript" src="'.ROOT.'administration/js/editeur/punymce/puny_mce.js"></script>
			<script type="text/javascript" src="'.ROOT.'administration/js/editeur/punymce/plugins/link/link.js"></script>
			<script type="text/javascript" src="'.ROOT.'administration/js/editeur/punymce/plugins/editsource/editsource.js"></script>
			<script type="text/javascript" src="'.ROOT.'administration/js/editeur/punymce/plugins/protect.js"></script>';
	foreach ($ids as $key => $id) {
		$code .= <<<fin
			<script type="text/javascript">
				var editor$key = new punymce.Editor({
					id : '$id',
					toolbar : 'bold,italic,strike,ul,ol,link,unlink,editsource',
					plugins : 'Link,EditSource,Protect',
					protect : {
				        list : [
				            /<(script|noscript|style)[\u0000-\uFFFF]*?<\/(script|noscript|style)>/g
				        ]
				    }
				});
			</script>
fin;
	}
	return $code;
}

function jwysiwyg ($selecteurs='.jwysiwyg') {
	$code = '<link rel="stylesheet" href="'.ROOT.'administration/js/editeur/jwysiwyg/jquery.wysiwyg.css" type="text/css" />
 <script type="text/javascript" src="'.ROOT.'administration/js/editeur/jwysiwyg/jquery.wysiwyg.js"></script>
 <script type="text/javascript" src="'.ROOT.'administration/js/editeur/jwysiwyg/controls/wysiwyg.link.js"></script>';
    $code .= <<<fin
    <script type="text/javascript">
        $(document).ready(function() { 
            $('$selecteurs').wysiwyg({
			"autoGrow": true,
			"initialContent": "<p>Votre texte</p>",
            controls: {
                strikeThrough : { visible : true },
                underline     : { visible : false },
                
                justifyLeft   : { visible : false },
                justifyCenter : { visible : false },
                justifyRight  : { visible : false },
                justifyFull   : { visible : false },
                
                indent  : { visible : false },
                outdent : { visible : false },
                
                subscript   : { visible : false },
                superscript : { visible : false },
                
                undo : { visible : false },
                redo : { visible : false },
                
                insertTable : { visible : false },
                insertImage : { visible : false },
                
                insertOrderedList    : { visible : true },
                insertUnorderedList  : { visible : true },
                insertHorizontalRule : { visible : true },
                
				code : { visible : false },
                
                h1 : { visible : false },
                h2 : { visible : false },
                h3 : { visible : false },
                
                html  : { visible: true }
            }
            });
        });
    </script>
fin;
	return $code;
}

function datePicker ($param='') {
   $root = ROOT.'javascripts';
	$code = <<<fin
		<link rel="stylesheet" type="text/css" href="$root/datePicker/date-picker.css" />
		<script type="text/javascript" src="$root/datePicker/jquery.datePicker.js"></script>
		<script type="text/javascript" src="$root/datePicker/date.js"></script>
		<script type="text/javascript" src="$root/datePicker/date_fr.js"></script>
		<script type="text/javascript">
		$(document).ready(function() { 
		 	$('.date-pick').datePicker($param);
		});
		</script>
fin;
	return $code;
}

function colorPicker () {
   $root = ROOT.'javascripts';
	$code = <<<fin
		<link rel="stylesheet" type="text/css" href="$root/ColorPicker/ColorPicker.css" />
		<script type="text/javascript" src="$root/ColorPicker/ColorPicker.js"></script>
        <script type="text/javascript" charset="utf-8">
            <!--
	        jQuery(function($)
	        {
	            $(".color-picker").attachColorPicker();
	        });
	        //-->
        </script>
fin;
	return $code;
}
?>