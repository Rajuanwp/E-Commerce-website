$(document).ready(function () {
    var num = $('.social-name').length;
    if (num - 1 == 0)
        $('#btnDel').attr('disabled', 'disabled');

    $('#btnAdd').click(function () {

        var num = $('.social-name').length;
        var newNum = num + 1;
        var newElem = $('#social-name-1').clone().attr('id', 'social-name-' + newNum);


        newElem.find('.line-item-social__social label').attr('for', 'social_' + newNum).val('');
        newElem.find('.line-item-social__social input').attr('id', 'social_' + newNum).attr('name', '[social ' + newNum + ']').val('');

        $('#social-name-' + num).after(newElem);

        $('#btnDel').attr('disabled', false);

        if (newNum == 19)

            $('#btnAdd').attr('disabled', 'disabled');

    });

    $('#btnDel').click(function () {
        var num = $('.social-name').length;

        $('#social-name-' + num).remove();

        $('#btnAdd').attr('disabled', false);

        if (num - 1 == 1)

            $('#btnDel').attr('disabled', 'disabled');

    });
});