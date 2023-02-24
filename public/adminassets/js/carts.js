$(document).ready(function () {
    $(document).on("click", "#update_image", function (e) {
        e.preventDefault();
        if (!$("#image").length) {
            $("#update_image").hide();
            $("#cancel_update_image").show();
            $("#oldimage").html(
                '<br><input type="file" onchange="readURL(this)"  name="image" id="image" > '
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

    $(document).on('click', '.show_more_details', function (e) {
        var token_search = $("#token_search").val();
        var url = $("#ajax_search_show").val();
        var id = $(this).data("id");
        jQuery.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            cache: false,
            data: { id: id, "_token": token_search },
            success: function (data) {

                $("#MoreDetailsModalBody").html(data);
                $("#MoreDetailsModal").modal("show");

            },
            error: function () {

            }
        });

    });
});
