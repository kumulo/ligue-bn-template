jQuery(function() {
    $('.sticky')
      .sticky({
        context: '#content'
      })
    ;
    $('#navigation')
        .sidebar({
            //context: "#page",
            scrollLock: true,
            debug: true,
            onVisible: function() {
                $('#masthead .secondary-toggle > i').addClass('close').removeClass('sidebar');
            },
            onHide: function() {
                $('#masthead .secondary-toggle > i').addClass('sidebar').removeClass('close');
            }
        })
        .sidebar('setting', 'transition', 'overlay')
        .sidebar('setting', 'transition', 'push')
        .sidebar('setting', 'transition', 'uncover')
        .sidebar('attach events', '#masthead .secondary-toggle');
    $('article.post .facebox_me').swipebox( {
        useCSS : true, // false will force the use of jQuery for animations
        useSVG : true, // false to force the use of png for buttons
        initialIndexOnArray : 0, // which image index to init when a array is passed
        hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
        hideBarsDelay : 3000, // delay before hiding bars on desktop
        videoMaxWidth : 1140, // videos max width
        beforeOpen: function() {}, // called before opening
        afterOpen: null, // called after opening
        afterClose: function() {}, // called after closing
        loopAtEnd: false // true will return to the first image after the last image is reached
    } );
    $('#gallery-container').each(function(i, c) {
        console.log(c);
        $( '.gallery-item', c ).each(function() {
            var item = this;
            $('a', item).attr('title', $('.wp-caption-text', item).text());
        });
        $( '.gallery a', c ).swipebox( {
            useCSS : true, // false will force the use of jQuery for animations
            useSVG : true, // false to force the use of png for buttons
            initialIndexOnArray : 0, // which image index to init when a array is passed
            hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
            hideBarsDelay : 3000, // delay before hiding bars on desktop
            videoMaxWidth : 1140, // videos max width
            beforeOpen: function() {}, // called before opening
            afterOpen: null, // called after opening
            afterClose: function() {}, // called after closing
            loopAtEnd: false // true will return to the first image after the last image is reached
        } );
    });
});
