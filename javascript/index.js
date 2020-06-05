

$(document).ready(function() {
    $('#update-product').hide();

    $(document).on('click', '#btn-edit', function() {
                
        $('#product_code').attr('disabled', true);
        $('#add-product').hide();
        $('#update-product').show();
        
        var product_id = $(this).siblings('#product_id')[0].value;
        console.log(product_id);
        $.ajax({
            method: "POST",
            url: "../assignment/includes/fetch.inc.php",
            data:{ product_id: product_id},
            dataType: "json",
            success: function(data) {
                console.log('success')
                console.log(data);
                // $('#product_image').val(data.product_image);
                $('#product_code').val(data.product_code);
                $('#product_name').val(data.product_name);
                $('#price').val(data.product_price);
                $('#quantity').val(data.product_quantity);
            },
            error: function(err) {
                console.log(err)
            }
        })
    });

    $(document).on('click', '#btn-delete', function() {
            
        var product_id = $(this).siblings('#product_id')[0].value;
        console.log(product_id);
        $.ajax({
            method: "POST",
            url: "../assignment/includes/delete.inc.php",
            data:{ product_id: product_id},
            dataType: "text",
            success: function() {
                console.log('success');
                location.reload();
            },
            error: function(err) {
                console.log(err)
            }
        })
    });


    $('#exampleModal').on('hidden.bs.modal', function (e) {
        
        
        $('#product_code').attr('disabled', false);
        $('#add-product').show();
        $('#update-product').hide();
        
        console.log('shown')
        $('#product_code').val('');
        $('#product_name').val('');
        $('#price').val('');
        $('#quantity').val('');
        // if (!data) {
        //   return e.preventDefault() // stops modal from being shown
        // }
    })
})