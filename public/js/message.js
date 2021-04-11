$(function() {
    const data_store = document.querySelector('#data_store');

    $('#send_message').on('click', () => {
        if ($('#name').val() == '') {
            jError('Nem adott meg nevet!');
            return;
        }

        if (test_for_special_chars($('#name').val())) {
            jError('Ne használjon a névben speciális karaktereket!');
            return;
        }

        if ($('#email').val() == '') {
            jError('Nem adott meg e-mail címet!');
            return;
        }

        if ($('#message').val() == '') {
            jError('Nem írt üzenetet!');
            return;
        }

        let post_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        }
        $.post({
            method: 'POST',
            url: data_store.dataset.post_route,
            data: post_data
        }).done((response) => {
            alert('Üzenet sikeresen elküldve!');
            $('#contact_form').trigger('reset');
        }).fail((response) => {
            jError(response.responseText);
        });
    });
});