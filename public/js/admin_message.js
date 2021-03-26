$(function() {
    let order_state = 1;

    $('a[name="delitem"]').on('click', (e) => {
        e.preventDefault();
        let dlg_result = confirm("Biztos törli?");

        if (dlg_result) {
            $.post({
                type: 'DELETE',
                url: e.target.href
            }).done((response) => {
                window.location.reload();
            }).fail((response) => {
                jError(response.responseText);
            });
        }
    });

    $('#order').on('click', (e) => {
        //TODO ordering
        if (order_state == 1) {
            $('#order').html(' &#128316;').text();
            order_state = 0;
        } else {
            $('#order').html(' &#128317;').text();
            order_state = 1;
        }
    });
});