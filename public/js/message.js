$(function() {
    const data_store = document.querySelector('#data_store');

    $('#send_message').on('click', () => {
        let post_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val()
        }
        $.post(data_store.dataset.post_route, post_data, (response) => {
            $('#contact_form').trigger('reset');
        }, 'json').fail(() => {
            jError('Hiba az üzenet küldésekor!');
        });
    });
});