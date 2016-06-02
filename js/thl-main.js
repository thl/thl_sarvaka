(function ($) {

    Drupal.behaviors.thlKmapsTree = {
      attach: function (context, settings) {
          if (context == document) {
              $('#tree').on('useractivate', function () { 
                    // When Fancy tree is activated, add "places-main" id to content div and adjust body classes
                    var cntdiv = $('#block-system-main .content div');
                    if (cntdiv.attr("id") != "places-main" || cntdiv.attr("id") != "subjects-main") {
                        cntdiv.attr("id", "places-main");
                        $('body').addClass('no-sidebars page-places page-places- page-places-317 page-places-overview page-places-overview-nojs');
                    }
                });
          }
      }
    };

}) (jQuery);


