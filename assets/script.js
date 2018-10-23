$(document).ready(() => {
    var timeOut = null;
    var buttonFollow = $('#follow');

    buttonFollow.on('click', () => {
        var statusFollow = $('#status-follow');
        var countFollow = $('#count-follow');

        buttonFollow.removeClass();
        buttonFollow.addClass('loading');

        if (typeof(timeOut) !== 'undefined')
            clearTimeout(timeOut);

        timeOut = setTimeout(
            () => {
                $.ajax({
                    dataType: 'JSON',
                    data: "action=ChangeFollow",
                    success: (data, textStatus) => {
                        buttonFollow.removeClass();
                        countFollow.html(data.count);
                        buttonFollow.addClass(data.status == 0 ? 'follow' : 'following')
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        alert(errorThrown);
                    }
                });
            }
            , 3000);
    });

});

