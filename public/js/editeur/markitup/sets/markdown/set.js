// -------------------------------------------------------------------
// markItUp!
// -------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// -------------------------------------------------------------------
// MarkDown tags example
// http://en.wikipedia.org/wiki/Markdown
// http://daringfireball.net/projects/markdown/
// -------------------------------------------------------------------
// Feel free to add more tags
// -------------------------------------------------------------------
mySettings = {
    previewParserPath:  '',
    resizeHandle: false,
    onShiftEnter:       {keepDefault:false, openWith:'\n\n'},
    markupSet: [
        {name:'Titre de niveau 2', key:'2', openWith:'## ', placeHolder:'Votre titre ici...', className:'markItUpButton-h2' },
        {name:'Titre de niveau 3', key:'3', openWith:'### ', placeHolder:'Votre titre ici...', className:'markItUpButton-h3' },
        {name:'Titre de niveau 4', key:'4', openWith:'#### ', placeHolder:'Votre titre ici...', className:'markItUpButton-h4' },
        {separator:'---------------' },
        {name:'Gras', key:'B', openWith:'**', closeWith:'**', className:'markItUpButton-b'},
        {name:'Italique', key:'I', openWith:'_', closeWith:'_', className:'markItUpButton-em'},
        {separator:'---------------' },
        {name:'Liste à puce', openWith:'- ', className:'markItUpButton-li' },
        {name:'Liste à chiffre', openWith:function(markItUp) {
            return markItUp.line+'. ';
        }, className:'markItUpButton-ol'},
        {separator:'---------------' },
        {name:'Image', key:'P', replaceWith:'![[![Texte alternatif]!]]([![Url:!:http://]!])', className:'markItUpButton-img'},
        {name:'Lien', key:'L', openWith:'[', closeWith:']([![Url:!:http://]!])', placeHolder:'Texte du lien...', className:'markItUpButton-a' },
        {separator:'---------------'},
        {
            name:'Aide',
            call:function(e) {
                // markitub a été modifié ligne 223 pour avoir le contexte
                $(e).parents('.markItUp').parent().parent().find('.markItUpHelp').toggle();
            },
            className:'markItUpButton-help'
        }
    ]
}

// mIu nameSpace to avoid conflict.
miu = {
    markdownTitle: function(markItUp, char) {
        heading = '';
        n = $.trim(markItUp.selection||markItUp.placeHolder).length;
        for(i = 0; i < n; i++) {
            heading += char;
        }
        return '\n'+heading;
    }
}
