document.addEventListener('DOMContentLoaded', function() {

    document.addEventListener('click', function(e) {
        // console.log(e.target);
        if (e.target.classList.contains('btn_delete')) {
            let data_id = e.target.getAttribute('data-id');
            let element_form_group = e.target.parentElement.parentElement.parentElement;
            // console.log(data_id);

            $.ajax({
                url: 'php_ajax/Ajax.php'
                , type: 'POST'
                , data: {
                    data_id: data_id }
                , success: function(d) {
                    console.log(d);
                    element_form_group.remove();
                }
            });
        }
        
        if (e.target.classList.contains('fa-trash')) {
            let data_id = e.target.parentElement.getAttribute('data-id');
            let element_form_group = e.target.parentElement.parentElement.parentElement.parentElement;
            // console.log(data_id);

            $.ajax({
                url: 'php_ajax/Ajax.php'
                , type: 'POST'
                , data: {
                    data_id: data_id }
                , success: function(d) {
                    console.log(d);
                    element_form_group.remove();
                }
            });
        }
    });

});