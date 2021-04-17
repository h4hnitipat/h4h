$(document).ready(function() {

    //<--------------------------------------------------------------------------------------------->///

    //<--- Main Sidebar Collapse Function --->///
    $('.sidebar_main_collapsion_btn').click(function() {

        // Set Sidebar_wrapper Class //
        // *** Main sidebar was collapsed    ---> Use sidebar_collapsed *** //
        // *** Main sidebar wasn't collapsed ---> Use sidebar_width_content     *** //
        if ($('#sidebar_wrapper').hasClass("sidebar_width_content")) {
            $("#sidebar_wrapper").removeClass("sidebar_width_content")
            $("#sidebar_wrapper").addClass("sidebar_collapsed")
        } else {
            $("#sidebar_wrapper").addClass("sidebar_width_content")
            $("#sidebar_wrapper").removeClass("sidebar_collapsed")
        }

        // Main Sidebar Collapse //
        $('.sidebar_main_collapsion').toggle(500)

        // Hide sidebar_sub //
        $('.sidebar_sub_collapsion').hide(100)
        
        // Clear class arrow_rotate //
        $("i").removeClass("arrow_rotate")
        
    })
    //<--- End Main Sidebar Collapse Function --->///

    //<--------------------------------------------------------------------------------------------->///

    //<--- Sub Sidebar Collapse Function --->///
    $('.sidebar_main li>a').click(function() {

        // Check Sidebar_wrapper Class //
        // Main sidebar wasn't collapsed ---> Has sidebar_width_content //
        // then collapsed Sub sidebar //
        if ($('#sidebar_wrapper').hasClass("sidebar_width_content")) {

            // Toggle collapse sub sidebar //
            $(this).siblings(".sidebar_sub_collapsion").toggle(500)

            // Toggle arrow_rotate //
            $("span i", this).toggleClass("arrow_rotate")

        }

        // Check Sidebar_wrapper Class //
        // Main sidebar collapsed ---> Has sidebar_collapsed //
        // then collapsed Sub sidebar //
        if ($('#sidebar_wrapper').hasClass("sidebar_collapsed")) {
        
            // Hide all collapse sub sidebar //
            $(".sidebar_sub_collapsion").hide()

            // Toggle collapse sub sidebar //
            $(this).siblings(".sidebar_sub_collapsion").toggle(500)

        }
    
    })
    //<--- End Sub Sidebar Collapse Function --->///

    //<--------------------------------------------------------------------------------------------->///

})