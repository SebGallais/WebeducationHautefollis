/*** jQuery.ScrollTo ***/
(function(h){var m=h.scrollTo=function(b,c,g){h(window).scrollTo(b,c,g)};m.defaults={axis:'y',duration:1};m.window=function(b){return h(window).scrollable()};h.fn.scrollable=function(){return this.map(function(){var b=this.parentWindow||this.defaultView,c=this.nodeName=='#document'?b.frameElement||b:this,g=c.contentDocument||(c.contentWindow||c).document,i=c.setInterval;return c.nodeName=='IFRAME'||i&&h.browser.safari?g.body:i?g.documentElement:this})};h.fn.scrollTo=function(r,j,a){if(typeof j=='object'){a=j;j=0}if(typeof a=='function')a={onAfter:a};a=h.extend({},m.defaults,a);j=j||a.speed||a.duration;a.queue=a.queue&&a.axis.length>1;if(a.queue)j/=2;a.offset=n(a.offset);a.over=n(a.over);return this.scrollable().each(function(){var k=this,o=h(k),d=r,l,e={},p=o.is('html,body');switch(typeof d){case'number':case'string':if(/^([+-]=)?\d+(px)?$/.test(d)){d=n(d);break}d=h(d,this);case'object':if(d.is||d.style)l=(d=h(d)).offset()}h.each(a.axis.split(''),function(b,c){var g=c=='x'?'Left':'Top',i=g.toLowerCase(),f='scroll'+g,s=k[f],t=c=='x'?'Width':'Height',v=t.toLowerCase();if(l){e[f]=l[i]+(p?0:s-o.offset()[i]);if(a.margin){e[f]-=parseInt(d.css('margin'+g))||0;e[f]-=parseInt(d.css('border'+g+'Width'))||0}e[f]+=a.offset[i]||0;if(a.over[i])e[f]+=d[v]()*a.over[i]}else e[f]=d[i];if(/^\d+$/.test(e[f]))e[f]=e[f]<=0?0:Math.min(e[f],u(t));if(!b&&a.queue){if(s!=e[f])q(a.onAfterFirst);delete e[f]}});q(a.onAfter);function q(b){o.animate(e,j,a.easing,b&&function(){b.call(this,r,a)})};function u(b){var c='scroll'+b,g=k.ownerDocument;return p?Math.max(g.documentElement[c],g.body[c]):k[c]}}).end()};function n(b){return typeof b=='object'?b:{top:b,left:b}}})(jQuery);


/*** DOCUMENT READY ***/
$(document).ready(function() {
	if ($.browser.msie && $.browser.version.substr(0,1)<7) {
		var html = '<div id="arfie6"><h2>Vous utilisez un navigateur dépassé depuis près de 10 ans!</h2><h4>Pour une meilleure expérience web, prenez le temps de mettre votre navigateur à jour.</h4><table><tr><td><a href="http://www.google.com/chrome" title="Télécharger Chrome"><img src="fileadmin/templates/images/ie6/browser_chrome.gif" alt="Chrome" height="100" width="100" /></a></td><td><a href="http://www.mozilla.com/firefox/" title="Télécharger Firefox"><img src="fileadmin/templates/images/ie6/browser_firefox.gif" alt="Firefox" height="100" width="100" /></a></td><td><a href="http://www.microsoft.com/windows/Internet-explorer/default.aspx" title="Télécharger Internet Explorer"><img src="fileadmin/templates/images/ie6/browser_ie.gif" alt="IE" height="100" width="100" /></td></a><td><a href="http://www.opera.com/download/" title="Télécharger Opera"><img src="fileadmin/templates/images/ie6/browser_opera.gif" alt="Opera" height="100" width="100" /></a></td><td><a href="http://www.apple.com/safari/download/" title="Télécharger Safari"><img src="fileadmin/templates/images/ie6/browser_safari.gif" alt="Safari" height="100" width="100" /></a></td></tr><tr><td>Chrome 12</td><td>Firefox 5</td><td>Internet explorer 9</td><td>Opera 11</td><td>Safari 5+</td></tr></table><br /><div id="croix"><img src="fileadmin/templates/images/ie6/btn_fermer.gif" alt="FERMER" /></div></div>';
		$('body').append(html);
		$('#arfie6 #croix').click(function(e) {
				$('#arfie6').remove();
		});
	}
    $('#top-link').topLink({
        min: 400,
        fadeSpeed: 500
    });
    //smoothscroll
    $('#top-link').click(function(e) {
        e.preventDefault();
        $.scrollTo(0,300);
    });
	//Plan du site
	var sitemap = 0
	$('.csc-sitemap > ul > li').each(function() {
		sitemap++;
		if (sitemap == 3) {
			elem = $(this);
			elem.after('<div class="clear"></div>');
			sitemap = 0;
		}
	});
	$('.tx-indexedsearch-browsebox:first').hide();
	//Bloc video
	$('.element_left .videoimg a').attr('href',$('.element_left .videotexte a').attr('href'));
	$('.lightbox').lightbox();
});

/*** LES ACTIONS ***/
$(function() {
	// Vidéo ROLLOVER 
	$('#home_bloc #video_content .videoimg').mouseover(function() {
		$(this).find('span').show();
	});
	$('#home_bloc #video_content .videoimg').mouseleave(function() {
		$(this).find('span').hide();
	});
	//Menu ROLLOVER
	$('#menu .menu_lvl1 li').mouseover(function() {
		elem = $(this);
		if (elem.parent().hasClass('menu_lvl1')) {
			elem.find('a:first').addClass('hover');
			elem.find('.menu_lvl2').show();
		}
	});
	$('#menu .menu_lvl1 li').mouseleave(function() {
		elem = $(this);
		if (elem.parent().hasClass('menu_lvl1')) {
			elem.find('.menu_lvl2').hide();
			elem.find('a:first').removeClass('hover');
		}
	});
	//Modification de la taille de la police
	$('.fontsize').click(function() {
		e = $(this);
		$('.fontsize').show();
		var size = $('.texteRTE').css('font-size');
		size = upOrdownTypo(e,size);
		$('.texteRTE').css('font-size', size + 'px');
	});
});

function upOrdownTypo(e,size) {
	size.replace("px", "");
	if (e.hasClass('plus')) {
		size = Math.floor(parseInt(size) + 2);
		if (size >= 20) { e.hide(); }
	}
	else if (e.hasClass('moins')) {
		size = Math.floor(parseInt(size) - 2);
		if (size <= 10) { e.hide(); }
	}
	return size;
}


/*** FUNCTION --  TOPLINK ***/
jQuery.fn.topLink = function(settings) {
    settings = jQuery.extend({
        min: 1,
        fadeSpeed: 200,
        ieOffset: 50
    }, settings);
    return this.each(function() {
        //listen for scroll
        var el = $(this);
        el.css('display','none'); //in case the user forgot
        $(window).scroll(function() {
            if(!jQuery.support.hrefNormalized) {
                el.css({
                    'position': 'absolute',
                    'top': $(window).scrollTop() + $(window).height() - settings.ieOffset
                });
            }
            if($(window).scrollTop() >= settings.min)
            {
                el.fadeIn(settings.fadeSpeed);
            }
            else
            {
                el.fadeOut(settings.fadeSpeed);
            }
        });
    });
};