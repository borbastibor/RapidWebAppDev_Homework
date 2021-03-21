$(function() {
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
                alert(response);
            });
        }
    });
});