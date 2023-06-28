$(document).ready(function() {
    $('#customer-form').submit(function(e) {
        e.preventDefault();

        var orderDate = $('#order-date').val();
        var company = $('#company').val();
        var owner = $('#owner').val();
        var item = $('#item').val();
        var quantity = $('#quantity').val();
        var weight = $('#weight').val();
        var boxCount = $('#box-count').val();
        var checklistQuantity = $('#checklist-quantity').val();

        // Perform any necessary client-side validations
        var isValid = true;
        if (quantity <= 0) {
            $('#quantity').addClass('error');
            isValid = false;
        } else {
            $('#quantity').removeClass('error');
        }

        if (weight <= 0) {
            $('#weight').addClass('error');
            isValid = false;
        } else {
            $('#weight').removeClass('error');
        }

        if (boxCount <= 0) {
            $('#box-count').addClass('error');
            isValid = false;
        } else {
            $('#box-count').removeClass('error');
        }

        if (checklistQuantity <= 0) {
            $('#checklist-quantity').addClass('error');
            isValid = false;
        } else {
            $('#checklist-quantity').removeClass('error');
        }

        if (!isValid) {
            return;
        }

        // Submit the form data via AJAX
        $.ajax({
            url: 'submit.php',
            method: 'POST',
            data: {
                order_date: orderDate,
                company: company,
                owner: owner,
                item: item,
                quantity: quantity,
                weight: weight,
                box_count: boxCount,
                checklist_quantity: checklistQuantity
            },
            success: function(response) {
                $('#form-response').html(response);
                $('#customer-form')[0].reset();
            },
            error: function() {
                $('#form-response').html('An error occurred.');
            }
        });
    });
});
