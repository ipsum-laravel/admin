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
	previewParserPath:	'',
	resizeHandle: false,
	onShiftEnter:		{keepDefault:false, openWith:'\n\n'},
	markupSet: [
		{name:'Titre de niveau 1', key:'1', openWith:'# ', placeHolder:'Votre titre ici...' },
		{name:'Titre de niveau 2', key:'2', openWith:'## ', placeHolder:'Votre titre ici...' },
		{name:'Titre de niveau 3', key:'3', openWith:'### ', placeHolder:'Votre titre ici...' },
		{name:'Titre de niveau 4', key:'4', openWith:'#### ', placeHolder:'Votre titre ici...' },
		{separator:'---------------' },
		{name:'Gras', key:'B', openWith:'**', closeWith:'**'},
		{name:'Italique', key:'I', openWith:'_', closeWith:'_'},
		{separator:'---------------' },
		{name:'Liste à puce', openWith:'- ' },
		{name:'Liste à chiffre', openWith:function(markItUp) {
			return markItUp.line+'. ';
		}},
		{separator:'---------------' },
		{name:'Image', key:'P', replaceWith:'![[![Texte alternatif]!]]([![Url:!:http://]!])'},
		{name:'Lien', key:'L', openWith:'[', closeWith:']([![Url:!:http://]!])', placeHolder:'Texte du lien...' },
		{separator:'---------------'},
		{
		    name:'Aide',
            call:function(markItUp) {
                $('.markItUpHelp').toggle();
            },
            className:'help'
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
