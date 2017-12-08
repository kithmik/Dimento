$(document).ready(function () {

    $('.commenting-form').submit(function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        data.push({
            'name':'comment',
            // 'value':$('#comment').summernote('code')
        });

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: data,
            success:function (returnedData) {
                toastr["success"]('Success: '+returnedData);
            },
            error: function (xhr, status, error) {
                toastr["error"]('Error: '+error);
            }
        });
    });

    $(document).on('mouseenter', '.star-rating', function () {
        var rating = $(this).attr('data-id');
        var object_id = $(this).attr('data-object');
        $('.star-rating[data-object="'+object_id+'"]').html('<i class="fa fa-star-o"> </i>');
        for(var i = 1; i <= rating; i++){
            $('.star-rating[data-object="'+object_id+'"][data-id="'+i+'"]').html('<i class="fa fa-star"> </i>');

        }
    });

    $(document).on('mouseleave', '.star-rating', function () {
        var rating = $(this).attr('data-rating');
        console.log(rating);
        var object_id = $(this).attr('data-object');
        /*for (var i = 1; i <= 5; i++){
         if(i <= rating){
         $('.star-rating[data-object="'+object_id+'"][data-id="'+i+'"]').html('<i class="fa fa-star-o"> </i>');
         }
         }*/
        $('.star-rating[data-object="'+object_id+'"]').html('<i class="fa fa-star-o"> </i>');
        if(rating > 0){
            for(var i = 1; i <= rating; i++){
                if(i > 0){
                    $('.star-rating[data-object="'+object_id+'"][data-id="'+i+'"]').html('<i class="fa fa-star"> </i>');
                }

            }
        }
    });

    $(document).on('click', '.star-rating', function () {
        var rating = $(this).attr('data-id');
        var object_id = $(this).attr('data-object');
        var star_ele = $(this);
        $.ajax({
            url:'/reaction/'+object_id+'/rate/'+rating,
            method: 'get',
            success: function (returnedData) {
                toastr["success"]('Success: '+returnedData.message);
                if(returnedData.avg_rating !== null){
                    $('.avg_rating[data-id="'+object_id+'"]').html(' | '+returnedData.avg_rating);
                }
                else {
                    $('.avg_rating[data-id="'+object_id+'"]').html(' | ');
                }

                $('.star-rating[data-object="'+object_id+'"][data-object="'+object_id+'"]').html('<i class="fa fa-star-o"> </i>').attr('data-rating', rating);

                if (returnedData.status < 0){
                    rating = 0;
                }

                $('.star-rating[data-object="'+object_id+'"]').attr('data-rating', rating);

                for(var i = 1; i <= rating; i++){
                    if(i > 0){
                        $('.star-rating[data-id="'+i+'"][data-object="'+object_id+'"]').html('<i class="fa fa-star"> </i>');
                    }

                }


            },
            error:function (error) {
                toastr["danger"]('Success: '+error);
            }
        });
    });

    $(document).on('click', '.like-thumb', function (e) {
        e.preventDefault();

        var status = $(this).attr('data-status');
        var current = $(this).attr('data-current');
        var object_id = $(this).attr('data-id');
        url = '/reaction/'+object_id+'/like/';

        if(status !== current){
            url += status;
        }
        console.log(url);

        $.ajax({
            url: url,
            method: 'get',
            success: function (returnedData) {
                toastr["success"]('Success: '+returnedData.message);
                // console.log(status);
                $('.like-count[data-id="'+object_id+'"]').html(returnedData.like_count);
                $('.dislike-count[data-id="'+object_id+'"]').html(returnedData.dislike_count);
                if(status === current){
                    $('.like-thumb[data-id="'+object_id+'"]').attr('data-current', '');
                    $('.like-thumb-up[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-o-up"></i>');
                    $('.like-thumb-down[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-o-down"></i>');
                }
                else{
                    $('.like-thumb[data-id="'+object_id+'"]').attr('data-current', status);
                    if (status === '1'){
                        $('.like-thumb-down[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-o-down"></i>');
                        $('.like-thumb-up[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-up"></i>');
                    }
                    else if(status === '0'){
                        $('.like-thumb-up[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-o-up"></i>');
                        $('.like-thumb-down[data-id="'+object_id+'"]').html('<i class="fa fa-thumbs-down"></i>');
                    }
                }
            },
            error:function (error) {
                toastr["danger"]('Success: '+error);
            }

        });
    });

});