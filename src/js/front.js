jQuery(function() {
    $('.sticky')
      .sticky({
        context: '#content'
      })
    ;

    $('#masthead').each(function(i, header) {
        $('#navigation', header)
            .sidebar('setting', 'transition', 'overlay')
            .sidebar('attach events', '#masthead .secondary-toggle');
    });
});
