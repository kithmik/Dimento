<!DOCTYPE html>
<html>
<head>
    <title>a</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>




<script>

    var token;

    /*$.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });*/


    $(function () {
        // body...

        $.ajax({
            url: 'https://dimento.cf/get_csrf',
//            url: '/get_csrf',
            method: 'GET',
//            dataType: 'json',
            success: function(rdata){
                token = rdata;
                console.log('csrf = '+rdata);
                postData();
            },
            error: function (rdata) {
                console.log('error');
                console.log(rdata);
            }
        });

        function postData() {
            var data = [
                {
                    name:'_token',
                    value: token
                },

                {
                    name: 'email',
                    value: 'anjetnet@gmail.com'
                },

                {
                    name: 'password',
                    value: 'abc123'
                }

            ];
            $.ajax({
                url: 'https://dimento.cf/MobileAPI/login',
                method: 'post',
                headers: { 'X-CSRF-TOKEN': token },
                data: data,
                beforeSend: function() {
                    // body...
                    console.log('beforeSend : '+data[0].value);
                },
                success: function(rdata){
                    console.log('success = '+rdata);
                },
                error: function (argument) {
                    // body...
                    console.log('error');
                    console.log(argument);
                }
            });
        }


    });



</script>



</body>
</html>



