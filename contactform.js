jQuery(document).ready(function ($) {
    $(".form").submit(function () {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "./contact.php",
            data: str,
            success: function (msg) {
                if (msg == "OK") {
                    result = "<p>Thank you!</p>";
                    $(".fields").hide();
                } else {
                    result = msg;
                }
                $(".note").html(result);
            },
        });
        return false;
    });
});