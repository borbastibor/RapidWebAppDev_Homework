$(function() {
    
    $('#upload_file').on('click', () => {
        $('#fileinput').trigger('click');
    });

    $('#fileinput').on('change', (e) => {
        let file = e.target.files[0];
        //TODO
    });
});