$(function() {
    const data_store = document.querySelector('#data_store');

    $('#submit_user').on('click', (e) => {
        if (test_for_special_chars($('#name').val())) {
            alert('Ne használjon speciális karaktereket!');

            return;
        }

        if ($('#password').val() == '' || $('#repassword').val() == '') {
            alert('Nem adott meg jelszót!');

            return;
        }

        if ($('#password').val() != $('#repassword').val()) {
            alert('Nem egyeznek meg a jelszavak!');

            return;
        }

        let post_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            role: $('#role').val()
        }

        let post_url = data_store.dataset.post_route;
        let post_type = $('#id').val() == 0 ? 'POST' : 'PUT';

        $.post({
            type: post_type,
            url: post_url,
            data: post_data
        }).done(() => {
            window.location.replace('/users');
        }).fail((response) => {
            alert(response.responseText);
        });
    });
});