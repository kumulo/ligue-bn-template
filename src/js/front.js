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
    $('#gallery-container').each(function(i, c) {
        var wrapper = $('#gallery-wrapper', c);
        var items = [];
        var objects = [];
        $('.entry-content .gallery .gallery-item', c).each(function(j, g) {
            items.push(g);
        });
        $('.entry-content .gallery', c).hide();
        wrapper.addClass('pswp').append(items);
        wrapper.carouFredSel({
            responsive: true,
            auto: {
                play: false
            },
            swipe: {
                onTouch: true
            }
        });
    });
});
