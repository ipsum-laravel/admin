$(document).ready(function() {

    $('.markItUpContainer').before('<ul class="markItUpOnglet"><li class="markItUpOnglet-actif">Editer</li><li>Voir</li></ul>' );
    $('.markItUpContainer').append('<iframe class="markItUpSpecialPreview"></iframe>');

    $('.markItUpOnglet').on("click", "li", function() {
        $markItUp = $(this).parents('.markItUp');
        $markItUp.find('.markItUpOnglet li').removeClass('markItUpOnglet-actif');
        $(this).addClass('markItUpOnglet-actif');
        if($(this).index() == 0) {
            $markItUp.find('.markItUpSpecialPreview').hide();
            $markItUp.find('.markItUpHeader').show();
        } else {
            $markItUp.find('.markItUpSpecialPreview').contents().find("body").html('');
            $.ajax({
                type: 'POST',
                dataType: 'text',
                global: false,
                url: mySettings.previewParserPath,
                data: { data: $markItUp.find('textarea.markItUp').val()},
                success: function(data) {
                    $markItUp.find('.markItUpSpecialPreview').contents().find("body").html(data);
                }
            });
            $markItUp.find('.markItUpSpecialPreview').show();
            $markItUp.find('.markItUpHeader').hide();
        }
    });
});