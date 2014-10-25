$(document).ready(function() {

    $('.markItUpContainer').before('<ul class="markItUpOnglet"><li class="markItUpOnglet-actif">Editer</li><li>Voir</li></ul>' );
    $('.markItUpContainer').append('<iframe class="markItUpSpecialPreview"></iframe>');

    $('.markItUpOnglet').on("click", "li", function() {
        $('.markItUpOnglet li').removeClass('markItUpOnglet-actif');
        $(this).addClass('markItUpOnglet-actif');
        if($(this).index() == 0) {
            $('.markItUpSpecialPreview').hide();
            $('.markItUpHeader').show();
        } else {
            $.ajax({
                type: 'POST',
                dataType: 'text',
                global: false,
                url: mySettings.previewParserPath,
                data: { data: $('textarea.markItUp').val()},
                success: function(data) {
                    $('.markItUpSpecialPreview').contents().find("body").html(data);
                }
            });
            $('.markItUpSpecialPreview').show();
            $('.markItUpHeader').hide();
        }
    });



});