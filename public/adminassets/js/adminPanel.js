$(document).ready(function () {
    $(document).on("click", "#update_image4", function (e) {
        e.preventDefault();
        if (!$("#image").length) {
            $("#update_image4").hide();
            $("#cancel_update_image4").show();
            $("#oldimage4").html(
                '<br><input type="file" onchange="readURL(this)"  name="photo" id="photo" > '
            );
        }
        return false;
    });

    $(document).on("click", "#cancel_update_image4", function (e) {
        e.preventDefault();

        $("#update_image4").show();
        $("#cancel_update_image4").hide();
        $("#oldimage4").html("");

        return false;
    });
    $(document).on("click", "#update_image", function (e) {
        e.preventDefault();
        if (!$("#image").length) {
            $("#update_image").hide();
            $("#cancel_update_image").show();
            $("#oldimage").html(
                '<br><input type="file" onchange="readURL(this)"  name="photo" id="photo" > '
            );
        }
        return false;
    });

    $(document).on("click", "#cancel_update_image", function (e) {
        e.preventDefault();

        $("#update_image").show();
        $("#cancel_update_image").hide();
        $("#oldimage").html("");

        return false;
    });
    $(document).on("click", "#update_image", function (e) {
        e.preventDefault();
        if (!$("#image1").length) {
            $("#update_image").hide();
            $("#cancel_update_image").show();
            $("#oldimage").html(
                '<br><input type="file" onchange="readURL(this)"  name="image1" id="image1" > '
            );
        }
        return false;
    });

    $(document).on("click", "#cancel_update_image", function (e) {
        e.preventDefault();

        $("#update_image").show();
        $("#cancel_update_image").hide();
        $("#oldimage").html("");

        return false;
    });

    $(document).on("click", "#update_image1", function (e) {
        e.preventDefault();
        if (!$("#image2").length) {
            $("#update_image1").hide();
            $("#cancel_update_image1").show();
            $("#oldimage1").html(
                '<br><input type="file" onchange="readURL(this)"  name="image2" id="image2" > '
            );
        }
        return false;
    });

    $(document).on("click", "#cancel_update_image1", function (e) {
        e.preventDefault();

        $("#update_image1").show();
        $("#cancel_update_image1").hide();
        $("#oldimage1").html("");

        return false;
    });

    $(document).on("click", "#update_image2", function (e) {
        e.preventDefault();
        if (!$("#image3").length) {
            $("#update_image2").hide();
            $("#cancel_update_image2").show();
            $("#oldimage2").html(
                '<br><input type="file" onchange="readURL(this)"  name="image3" id="image3" > '
            );
        }
        return false;
    });

    $(document).on("click", "#cancel_update_image2", function (e) {
        e.preventDefault();

        $("#update_image2").show();
        $("#cancel_update_image2").hide();
        $("#oldimage2").html("");

        return false;
    });

    $(document).on("click", ".are_you_shue", function (e) {
        var res = confirm("هل انت متأكد ؟");
        if (!res) {
            return false;
        }
    });
});

var url = window.location;
// for sidebar menu but not for treeview submenu
$("ul.sidebar-menu a")
    .filter(function () {
        return this.href == url;
    })
    .parent()
    .siblings()
    .removeClass("active")
    .end()
    .addClass("active");
// for treeview which is like a submenu
$("ul.treeview-menu a")
    .filter(function () {
        return this.href == url;
    })
    .parentsUntil(".sidebar-menu > .treeview-menu")
    .siblings()
    .removeClass("active menu-open")
    .end()
    .addClass("active menu-open");

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#uploadedimg").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on("click", "#update_images3", function (e) {
    e.preventDefault();
    if (!$("#image").length) {
        $("#update_images3").hide();
        $("#cancel_update_images3").show();
        $("#oldimages3").html(
            '<br><input type="file" onchange="readURL(this)"  name="image" id="image" > '
        );
    }
    return false;
});

$(document).on("click", "#cancel_update_images3", function (e) {
    e.preventDefault();

    $("#update_images3").show();
    $("#cancel_update_images3").hide();
    $("#oldimages3").html("");

    return false;
});
