import "./bootstrap";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".product-price-increment, .product-price-discrement").on(
    "click",
    function () {
        var id = $(this).attr("data-id");
        var price = $(this).attr("data-id");
        $.ajax({
            type: "PATCH",
            url: "/sepet/guncelle/" + id,
            data: { price: price },
            success: function (result) {
                window.location.href = "/sepet";
            },
        });
    }
);
