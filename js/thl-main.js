(function ($) {

    Drupal.behaviors.thlKmapsTree = {
      attach: function (context, settings) {
          if (context == document) {
              $('#tree').on('useractivate', function () { 

                    var cntdiv = $('#block-system-main .content div');
                    if (cntdiv.attr("id") != "places-main" || cntdiv.attr("id") != "subjects-main") {
                        cntdiv.attr("id", "places-main");
                        $('body').addClass('no-sidebars page-places page-places- page-places-317 page-places-overview page-places-overview-nojs');

  
                    }
                
                });
               /*console.log("fn titles: " + $(' #tree li').length);
                window.inttime = 0;
                window.myint = setInterval(function () {
                    console.log(window.inttime + " : " + $('#tree').fancytree('getTree'));
                    window.inttime += 100;
                    if (window.inttime > 60000) {
                        clearInterval(window.myint);
                    }
                }, 100);
                $(' #tree li').click(function() {console.log("clicked");});
                */
          }
      }
    };

}) (jQuery);


