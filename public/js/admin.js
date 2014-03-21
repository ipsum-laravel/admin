$(document).ready(function() {

   // Confirmation avant suppression
   $('.supprimer').click( function() { return confirm('Voulez-vous supprimer ' + $(this).data('message') + ' ?');} );

   // Ouvre un popup <a href="" rel="popup[width-height]" ></a>
   $("a[rel^=popup]").each(function(i) {
   	var popupName = 'popup_' + i + '_' + new Date().getTime();
		$(this).click(function (e) {
			e.preventDefault();
			var dims = this.getAttribute('rel').match(/.*\[([0-9]+)-([0-9]+)\].*/);
			window.open(this.getAttribute('href'), popupName, 'width=' + dims[1] + ',height=' + dims[2] + ',resizable,scrollbars');
		});
	});

   // Coche tous les input checkbox d'un tableau
   $('#select_cocher').click( function() {
        $('.liste input[type=checkbox]').attr("checked","checked");
        return false;
   } );
   // D�coche tous les inputs
   $('#select_decocher').click( function() {
        $('.liste input[type=checkbox]').attr("checked","");
        return false;
   } );

	// *******************************************************
	// Supprime ou ajoute une ligne dans un tableau
	// *******************************************************
	checkTableau();

	function checkTableau() {
		$('.ligne_del').click( function() {
			if (confirm('Voulez-vous ' + $(this).attr('title') + ' ?')) {
				$(this).parent("td").parent("tr").remove();
				//checkTableau();
				return false;
			}
			else {
			      return true;
			}
		});

		$('.ligne_add').click( function() {
			$(this).parent("td").parent("tr").clone().insertAfter($(this).parent("td").parent("tr"));
			$(this).addClass("ligne_del").toggleClass("ligne_add");

			$(this).attr("title","Supprimer la ligne");
			$(this).html('<img src="images/supprimer.png" alt="supp">');
			$(this).unbind( "click" );
			checkTableau();
			return false;
		});
	}
});