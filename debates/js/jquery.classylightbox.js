/*!
 * jQuery ClassyLightbox
 * http://www.class.pm/projects/jquery/classylightbox
 *
 * Copyright 2011 - 2012, Class.PM www.class.pm
 * Written by Marius Stanciu - Sergiu <marius@picozu.net>
 * Licensed under the GPL Version 3 license.
 * Version 1.1.0
 *
 */
var m=$.noConflict();
var ClassyLightbox = {
    skeleton: '<div id="ClassyLightboxOverlay" style="display:none" class="opaque"><div id="ClassyLightbox" class="shadow top bottom" style="display:none"><div id="lbHeader" class="top"></div><div id="lbContent"></div><div id="lbFooter" class="bottom"></div></div></div>',
    settings: {},
    init: function(opts) {
        ClassyLightbox.settings = opts;
        m('body').append(ClassyLightbox.skeleton);
        if (ClassyLightbox.settings.override) {
            m('<script />').attr({
                type:'text/javascript'
            }).html("function alert(val){ ClassyLightbox.alert({ title: 'Alert', text: val, rightButtons: ['OK'] }); }").appendTo('head');
            if (ClassyLightbox.settings.background != "none" && (ClassyLightbox.settings.background == 'white' || ClassyLightbox.settings.background == 'black')) {
                m('#ClassyLightboxOverlay').addClass(ClassyLightbox.settings.background);
            }
            else {
                m('#ClassyLightboxOverlay').addClass('none');
            }
        }
        if (ClassyLightbox.settings.centerOnResize) {
            m(window).bind('resize', function() {
                ClassyLightbox.resize();
            });
        }
    },
    alert: function(options) {
        if (ClassyLightbox.isOpen()) {
            return false;
        }
        m('#ClassyLightbox').css({
            width: options.width
        });
        ClassyLightbox.resize();
        m('#ClassyLightbox #lbHeader').html('<header>'+options.title+'</header>');
        buttons = '';
        lb = options.leftButtons;
        rb = options.rightButtons;
        if (lb) {
            for (var i=(options.leftButtons).length-1; i>=0; i--) {
                buttons += '<input type="button" class="flat" value="'+options.leftButtons[i]+'">';
            }
        }
        if (rb) {
            for (var i=(options.rightButtons).length-1; i>=0; i--) {
                buttons += '<input type="button" class="flat floatRight" value="'+options.rightButtons[i]+'">';
            }
        }
        if (!lb && !rb) {
            buttons += '<input type="button" class="flat floatRight" value="OK">';
        }
        m('#ClassyLightbox #lbFooter').html(buttons);
        m('#ClassyLightbox #lbContent').html(options.text);
        ClassyLightbox.listen();
        if (ClassyLightbox.settings.fade) {
            m('#ClassyLightboxOverlay').fadeIn();
        }
        else {
            m('#ClassyLightboxOverlay').show();
        }
        if (!!window.jQuery.ui) {
            m('#ClassyLightbox').draggable({
                handle: '#lbHeader', 
                containment: 'parent'
            }).show();
        }
        else {
            m('#ClassyLightbox').show();
        }
        if (typeof options.opened == 'function') {
            options.opened.call(this);
        }
        if (typeof options.onClick == 'function') {
            ClassyLightbox.onClick = options.onClick;
        }
    },
    isOpen: function() {
        var open = m('#ClassyLightbox').css('display') == "block";
        return open;
    },
    clear: function() {
        m('#ClassyLightboxOverlay').remove();
        if (ClassyLightbox.settings.fade) {
            m('#ClassyLightboxOverlay').fadeOut();
        }
        else {
            m('#ClassyLightboxOverlay').hide();
        }	
        m('body').append(ClassyLightbox.skeleton);
        ClassyLightbox.resize();
    },
    listen: function() {
        m('#lbFooter input').each(function() {
            m(this).attr({
                'id': this.value
            });
        });
        m('#lbFooter input').click(function() {
            ClassyLightbox.action(m(this).val());
        });
    },
    action: function(key) {
        if (key == "Cancel" || key == "Close" || key == "Quit" || key == "Back" || key == "OK") {
            ClassyLightbox.clear();
        }
        ClassyLightbox.onClick(key);
    },
    resize: function() {
        var lbox = m('#ClassyLightbox');
        var height = parseInt((lbox.css('height')).replace('px', ''));
        var width = parseInt((lbox.css('width')).replace('px', ''));
        lbox.css({
            top: (m(window).height()/2 ) - 100 + 'px',
            left: (m(window).width() - width)/2 + 'px'
        });
    },
    onClick: function() {
        
    },
    destroy: function() {
        m('#ClassyLightboxOverlay').remove();
        m(window).unbind('resize');
    }
}