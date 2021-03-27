$(function() {
    const data_store = document.querySelector('#data_store');
    const order_desc = ' &#128317;';
    const order_asc = ' &#128316;';
    let order_state = 'asc';

    $('#order').html(order_asc).text();

    set_delete_event_handler();

    $('#order').on('click', (e) => {
        if (order_state == 'desc') {
            $('#order').html(order_asc).text();
            order_state = 'asc';
        } else {
            $('#order').html(order_desc).text();
            order_state = 'desc';
        }

        $.post({
            method: 'POST',
            url: data_store.dataset.post_route,
            data: { dir: order_state, column: 'created_at' }
        }).done((response) => {
            $('#data_table > tbody').empty();
            response.forEach(function (item, index) {
                $('#data_table > tbody').append(
                    '<tr><td class="align-middle">' + item.name +
                    '</td><td class="align-middle">' + item.email +
                    '</td><td class="align-middle">' + convert_mysql_timestamp(item.created_at) +
                    '</td><td class="align-middle">' + (item.role == 0 ? 'admin' : 'regisztrált felhasználó') +
                    '</td><td class="align-middle">' +
                    '<a class="btn bg-primary text-white font-weight-bold" href="' + 
                    data_store.dataset.edit_route.replace('xxxx', item.id) + '">Szerkeszt</a> ' +
                    '<a class="btn bg-danger text-white font-weight-bold" name="delitem" href="' +
                    data_store.dataset.delete_route.replace('xxxx', item.id) + '">Töröl</a>' +
                    '</td></tr>'
                );
                
            });

            set_delete_event_handler();
        }).fail((response) => {
            jError(response.responseText);
        });
    });

    function set_delete_event_handler() {
        $('a[name="delitem"]').on('click', (e) => {
            e.preventDefault();
            let dlg_result = confirm("Biztos törli?");
    
            if (dlg_result) {
                $.post({
                    type: 'DELETE',
                    url: e.target.href
                }).done(() => {
                    alert('Felhasználó sikeresen törölve!');
                    window.location.reload();
                }).fail((response) => {
                    jError(response.responseText);
                });
            }
        });
    }
});