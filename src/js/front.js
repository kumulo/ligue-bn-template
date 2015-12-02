jQuery(function() {
    $('.sticky')
      .sticky({
        context: '#content'
      })
    ;
    $('#navigation')
        .sidebar({
            //context: "#nav-context",
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
});
