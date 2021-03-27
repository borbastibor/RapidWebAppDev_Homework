$(function() {
    const data_store = document.querySelector('#data_store');

    $('#send_message').on('click', () => {
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