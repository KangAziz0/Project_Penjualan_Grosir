// JQUERY
$(document).ready(function () {

    $(".sidebar-toggle").click(function (e) {
        $(".sidebar").toggleClass("collapsed");
        $(".main").toggleClass("collapsed");
        e.preventDefault();
    });

    $(".sidebar-menu-item.has-dropdown > a").click(function (e) {
        e.preventDefault();

        if (!$(this).parent().hasClass("focused")) {
            $(this)
                .parent()
                .parent()
                .find(".sidebar-dropdown-menu")
                .slideUp("fast");
            $(this)
                .parent()
                .parent()
                .find(".has-dropdown")
                .removeClass("focused");
        }

        $(this).next().slideToggle("fast");
        $(this).parent().toggleClass("focused");
    });
    $(".sidebar-dropdown-menu").slideUp("fast");

    $(".sidebar.collapsed").mouseleave(function () {
        $(".sidebar-dropdown-menu").slideUp("fast");
    });

   
});
