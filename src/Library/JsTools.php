<?php
namespace Ipsum\Admin\Library;

class JsTools {

public static function jwysiwyg ($selecteurs='.jwysiwyg') {
    $css = asset("packages/ipsum/admin/js/editeur/jwysiwyg/jquery.wysiwyg.css");
    $js1 = asset("packages/ipsum/admin/js/editeur/jwysiwyg/jquery.wysiwyg.js");
    $js2 = asset("packages/ipsum/admin/js/editeur/jwysiwyg/controls/wysiwyg.link.js");
    $code = '<link rel="stylesheet" href="'.$css.'" type="text/css" />
    <script type="text/javascript" src="'.$js1.'"></script>
    <script type="text/javascript" src="'.$js2.'"></script>';
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

public static function markItUp ($previewParserPath, $selecteur = '.markItUp') {
    $css1 = asset('packages/ipsum/admin/js/editeur/markitup/skins/ipsum/style.css');
    $css2 = asset('packages/ipsum/admin/js/editeur/markitup/sets/markdown/style.css');
    $js1 = asset('packages/ipsum/admin/js/editeur/markitup/jquery.markitup.js');
    $js2 = asset('packages/ipsum/admin/js/editeur/markitup/sets/markdown/set.js');
    $js3 = asset('packages/ipsum/admin/js/editeur/markitup/jquery.preview.js');
    $code = <<<fin
        <script type="text/javascript" src="$js1"></script>
        <script type="text/javascript" src="$js2"></script>
        <link rel="stylesheet" type="text/css" href="$css1" />
        <link rel="stylesheet" type="text/css" href="$css2" />
        <script type="text/javascript" >
            mySettings.previewParserPath = "$previewParserPath";
            $(function() {
                $("$selecteur").markItUp(mySettings);
            });
        </script>
        <script type="text/javascript" src="$js3"></script>
fin;
    return $code;
}

public static function datePicker ($param='') {
    $css = asset("packages/ipsum/admin/js/datePicker/date-picker.css");
    $js1 = asset("packages/ipsum/admin/js/datePicker/jquery.datePicker.js");
    $js2 = asset("packages/ipsum/admin/js/datePicker/date.js");
    $js3 = asset("packages/ipsum/admin/js/datePicker/date_fr.js");
    $code = <<<fin
        <link rel="stylesheet" type="text/css" href="$css" />
        <script type="text/javascript" src="$js1"></script>
        <script type="text/javascript" src="$js2"></script>
        <script type="text/javascript" src="$js3"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.date-pick').datePicker($param);
        });
        </script>
fin;
    return $code;
}

public static function colorPicker () {
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

public static function googleMaps ($marker = '', $center = "46.225453,2.219238", $zoom = 5) {
    $marker = !empty($marker) ? "placeMarker(new google.maps.LatLng(".$marker."));" : '';
    $code = <<<fin
        <!-- Inclusion de l'API Google MAPS -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
        function initialiser() {
            var center = new google.maps.LatLng($center);
            var options = {
                'center': center,
                'zoom': $zoom,
                'mapTypeId': google.maps.MapTypeId.ROADMAP
            };
            var carte = new google.maps.Map(document.getElementById('carte'), options);
            google.maps.event.addListener(carte, 'click', function(event) {
                placeMarker(event.latLng);
            });
            var marker;
            function placeMarker(location) {
                if(marker) { //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                } else {
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location,
                        map: carte
                    });
                }
                document.getElementById('gps').value=location.lat() + ',' + location.lng();
            }
            $marker
        }
        $(document).ready(function() {
            initialiser() ;
        });
        </script>
fin;
    return $code;
}
}
