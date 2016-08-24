$(function () {

    $('#send-form').validator();

    $('#send-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "send.php";
            
            $.ajax({
                type: 'POST',
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    var messageText = data.message;

                    if (messageText) {
                        alert(messageText);
                        $('#send-form')[0].reset();
                    }
                }
            });
            
            
            return false;
        }
    })
});
