$(function() {
    const data_store = document.querySelector('#data_store');

    $('#submit_file').on('click', (e) => {
        if ($('#name').val() == '') {
            alert('Nem adott meg nevet!');

            return;
        }

        if ($('#email').val() == '') {
            alert('Nem adott meg e-mail címet!');

            return;
        }

        if ($('#message').val() == '') {
            alert('Az üzenet nem lehet üres!');

            return;
        }

        let post_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        }

        let post_url = data_store.dataset.post_route;
        let post_type = $('#id').val() == 0 ? 'POST' : 'PUT';

        $.post({
            type: post_type,
            url: post_url,
            data: post_data
        }).done(() => {
            window.location.replace('/messages');
        }).fail((response) => {
            alert(response.responseText);
        });
    });
});