$(function() {
    $('#submit_user').on('click', (e) => {
        console.log('esemény');
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

        // $.post({
        //     type: 'DELETE',
        //     url: e.target.href
        // }).done((response) => {
        //     window.location.reload();
        // }).fail((response) => {
        //     alert(response);
        // });
    });
});