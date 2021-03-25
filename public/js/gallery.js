$(function() {
    const data_store = document.querySelector('#data_store');
    
    $('#upload_file').on('click', () => {
        if ($('#imagetext').val()) {
            $('#fileinput').trigger('click');
        } else {
            alert('Adjon meg képfeliratot!');
        }
    });

    $('#fileinput').on('change', (e) => {
        if (!$('#fileinput').prop('files')[0].name.toLowerCase().match(/.(jpg|jpeg|png)$/i)) {
            alert('Nem képet képet választott ki!');
            return;
        }
    
        let form_data = new FormData()
        form_data.append('image', $('#fileinput').prop('files')[0]);
        form_data.append('imagetext', $('#imagetext').val());
        
        $.ajax({
            method: 'POST',
            url: data_store.dataset.post_route,
            processData: false,
            contentType: false,
            data: form_data,
            success: () => window.location.reload()
        });
    });
});