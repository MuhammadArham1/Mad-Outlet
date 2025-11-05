jQuery(document).ready(function($) {
    $(document).on('click', '.wishlist-btn', function() {
        var button = $(this);
        var product_id = button.data('product-id');

        $.post(wishlist_ajax.url, {
            action: 'toggle_wishlist',
            product_id: product_id
        }, function(response) {
            if (response.status === 'success') {
                if (response.message === 'added') {
                    button.text('Remove from Wishlist');
                } else {
                    button.text('Add to Wishlist');
                }
            }
        });
    });
});
