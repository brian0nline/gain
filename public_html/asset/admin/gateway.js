(function($) {
    "use strict";

    $('.newCurrencyBtn').on('click', function() {
        var form = $('.newMethodCurrency');
        var getCurrencySelected = $('.newCurrencyVal').find(':selected').val();
        var currency = $(this).data('crypto') == 1 ? 'USD' : `${getCurrencySelected}`;
        if (!getCurrencySelected) return;
        form.find('input').removeAttr('disabled');
        var symbol = $('.newCurrencyVal').find(':selected').data('symbol');
        form.find('.currencyText').val(getCurrencySelected);
        form.find('.currency_symbol').text(currency);
        $('#payment_currency_name').text(`${$(this).data('name')} - ${getCurrencySelected}`);
        form.removeClass('d-none');
        $('html, body').animate({
            scrollTop: $('html, body').height()
        }, 'slow');

        $('.newCurrencyRemove').on('click', function() {
            form.find('input').val('');
            form.remove();
        });
    });

    $('.deleteBtn').on('click', function() {
        var modal = $('#deleteModal');
        modal.find('input[name=id]').val($(this).data('id'));
        modal.find('.name').text($(this).data('name'));
        modal.modal('show');
    });

    $('.symbl').on('input', function() {
        var curText = $(this).data('crypto') == 1 ? 'USD' : $(this).val();
        $(this).parents('.payment-method-body').find('.currency_symbol').text(curText);
    });

    $('.copyInput').on('click', function(e) {
        var copybtn = $(this);
        var input = copybtn.parent().parent().siblings('input');
        if (input && input.select) {
            input.select();
            try {
                document.execCommand('SelectAll')
                document.execCommand('Copy', false, null);
                input.blur();
                notify('success', `Copied: ${copybtn.closest('.input-group').find('input').val()}`);
            } catch (err) {
                alert('Please press Ctrl/Cmd + C to copy');
            }
        }
    });

})(jQuery);

(function($) {
    "use strict";
    $('input[name=currency]').on('input', function() {
        $('.currency_symbol').text($(this).val());
    });
    $('.addUserData').on('click', function() {
        var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <input name="field_name[]" class="form-control" type="text" required placeholder="Field Name">
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="type[]" class="form-control">
                                    <option value="text" > Text </option>
                                    <option value="textarea" > Textarea</option>
                                    <option value="file"> File </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <select name="validation[]"
                                        class="form-control">
                                    <option value="required"> Required </option>
                                    <option value="nullable">  Optional </option>
                                </select>
                            </div>
                            <div class="col-md-2 mt-md-0 mt-2 text-right">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger btn-lg removeBtn w-100" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>`;
        $('.addedField').append(html)
    });

    $(document).on('click', '.removeBtn', function() {
        $(this).closest('.user-data').remove();
    });

})(jQuery);