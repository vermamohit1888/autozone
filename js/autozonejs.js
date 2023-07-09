/*
 * @file classroom_common.js
 * Contains js functionality related to classroom
 */
(function (Drupal, $) {

    Drupal.behaviors.autozone = {
      attach: function (context, settings) {

        
  
        // Code to change the dropdown year make
        $("body").on("change", "form[id*='autozone-form'] select[name='year']", function () {            
          var year = $("form[id*='autozone-form'] select[name='year']").val();
          console.log(year);
          $.ajax({
            type: "POST",
            url: drupalSettings.path.baseUrl + "autozone/getmakebyyear/" + year,
            dataType: 'json',
            cache: false,
            beforeSend: function () {                
            },
            success: function (data) {              
                
              if (data) {
                $("select[name='make']").css("background-color" ,  "white");
                $("select[name='make']").css({"border-bottom-style": "solid;", "border-bottom-color": "coral"});
                // empty contents of centers dropdown
                $("select[name='make']").html("");
                $("select[name='make']").append("<option value=''>2|Make</option>");
                // put new dropdown values to city dropdown
                jQuery.each(data, function (key, val) {                   
                $('select[name="make"]').append('<option value="' + val.MakeId + '">' + val.MakeName + '</option>');
                });
                
              }
            },
            error: function (error) {
            }
          });
        });



        // Code to change the dropdown make model

        $("body").on("change", "form[id*='autozone-form'] select[name='make']", function () {
            var make = $("form[id*='autozone-form'] select[name='make']").val();
            console.log(make);
            $.ajax({
              type: "POST",
              url: drupalSettings.path.baseUrl + "autozone/getmodelbymake/" + make,
              dataType: 'json',
              cache: false,
              beforeSend: function () {
              },
              success: function (data) {
                  
                if (data) {
                  // empty contents of centers dropdown
                  $("select[name='model']").css("background-color" ,  "white");
                $("select[name='model']").css({"border-bottom-style": "solid;", "border-bottom-color": "coral"});
                  $("select[name='model']").html("");
                  $("select[name='model']").append("<option value=''>3|Model</option>");
                  // put new dropdown values to city dropdown
                  jQuery.each(data, function (key, val) {                   
                  $('select[name="model"]').append('<option value="' + val.Model_ID + '">' + val.Model_Name + '</option>');
                  });
                }
              },
              error: function (error) {
              }
            });
          });
  
      }
  };
  })(Drupal, jQuery);