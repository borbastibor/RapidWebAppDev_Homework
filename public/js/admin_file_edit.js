$(function() {
    const data_store = document.querySelector('#data_store');
    $('#submit_file').on('click', (e) => {
        if ($('#description').val() == '') {
            jError('Nem adott meg leírást!');
            return;
        }

        let form_data = new FormData();
        if ($('#id').val() != 0) {
            form_data.append('_method', 'PUT');
        }
        form_data.append('description', $('#description').val());
        form_data.append('type', $('#type').val());
        form_data.append('fileinput', $('#fileinput').prop('files')[0]);

        $.ajax({
            method: 'POST',
            url: data_store.dataset.post_route,
            contentType: false,
            processData: false,
            data: form_data
        }).done(() => {
            alert('Sikeres művelet!');
            window.location.replace('/files');
        }).fail((response) => {
            jError(response.responseText);
        });
    });
});