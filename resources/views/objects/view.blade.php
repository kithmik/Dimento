@extends('layouts.objects')

@section('title', ' - Object ')

@section('content')

    @auth
        <!--Modal: Post Report form-->
        <div class="modal fade" id="objectReportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog {{--cascading-modal--}} modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header light-blue darken-3 white-text">
                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="title"><i class="fa fa-pencil"></i> Report Post</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body mb-0">

                        <h5 id="reporting-post-title"></h5>
                        <div id="reporting-post-user"></div>
                        <br>

                        <form method="POST" action="/report/object" id="post-reporting-form">
                            {{ csrf_field() }}

                            <input type="hidden" name="reporting_post_id" id="reporting_post_id" value="-1">
                            <div class="md-form form-sm">
                                <i class="fa fa-building-o prefix"></i>
                                <select class="mdb-select pl-5" id="report_category" name="report_category" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="Irrelevant">Irrelevant Content</option>
                                    <option value="Abusive">Abusive Content</option>
                                    <option value="Hate Speech">Hate Speech</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label>Reporting Category</label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-exclamation-triangle prefix"></i>
                                <input type="text" id="report_reason" name="report_reason" class="md-form" required>
                                <label for="report_reason">Please specify a brief reason for this report </label>
                            </div>

                            <div class="md-form form-sm">
                                <i class="fa fa-list prefix"></i>
                                <textarea name="report_description" id="report_description" cols="30" rows="10"
                                          class="md-textarea"></textarea>
                                <label for="report_description">Please provide us with more details about this
                                    report</label>
                            </div>

                            <div class="text-center mt-1-half">
                                <button type="submit" class="btn btn-danger mb-2">Submit Report <i
                                            class="fa fa-send ml-1"></i></button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: Post Report form-->
    @endauth


    @if(pathinfo($object->object_location, PATHINFO_EXTENSION) == '3DS')
        @include('includes.viewers.3ds')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == '3MF')
        @include('includes.viewers.3mf')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'AMF')
        @include('includes.viewers.amf')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'ASSIMP')
        @include('includes.viewers.assimp')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'JSON'  && pathinfo(substr($object->object_location, 0, -5), PATHINFO_EXTENSION) == 'ASSIMP')
        @include('includes.viewers.assimpJSON')

    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'AWD')
        @include('includes.viewers.awd')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'BABYLON')
        @include('includes.viewers.babylon')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'BVH')
        @include('includes.viewers.bvh')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'DAE')
        @include('includes.viewers.collada')
    @elseif(pathinfo($object->object_location, PATHINFO_EXTENSION) == 'OBJ')
        @include('includes.viewers.obj')
    @endif

    <script src="/js/object-view.js"></script>

    <script>
        $(function () {

            $('.mdb-select').material_select();

            $(document).on('click', '.object-report-a', function (e) {
                e.preventDefault();
                $('#reporting_post_id').val($(this).attr('data-id'));
                $('#reporting-post-title').html($(this).attr('data-object'));
                $('#reporting-post-user').html($(this).attr('data-user'));

//                console.log($(this).attr('data-object'));

            });

            $('#post-reporting-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serializeArray(),
                    success: function (returnedData) {
                        if (returnedData['status'] == 1) {
                            toastr["success"]('Success: ' + returnedData['msg']);
                        }
                        else if (returnedData['status'] == 0) {
                            toastr["info"](returnedData['msg']);
                        }

                    }
                });

            });


            $(document).on('click', '.like-thumb', function (e) {
                e.preventDefault();

                var status = $(this).attr('data-status');
                var current = $(this).attr('data-current');
                var post_id = $(this).attr('data-id');
                url = '/reaction/' + post_id + '/like/';

                if (status !== current) {
                    url += status;
                }
                console.log(url);

                $.ajax({
                    url: url,
                    method: 'get',
                    success: function (returnedData) {
                        toastr["success"]('Success: ' + returnedData.message);
                        // console.log(status);
                        $('.like-count[data-id="' + post_id + '"]').html(returnedData.like_count);
                        $('.dislike-count[data-id="' + post_id + '"]').html(returnedData.dislike_count);
                        if (status === current) {
                            $('.like-thumb[data-id="' + post_id + '"]').attr('data-current', '');
                            $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-up"></i>');
                            $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-down"></i>');
                        }
                        else {
                            $('.like-thumb[data-id="' + post_id + '"]').attr('data-current', status);
                            if (status === '1') {
                                $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-down"></i>');
                                $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-up"></i>');
                            }
                            else if (status === '0') {
                                $('.like-thumb-up[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-o-up"></i>');
                                $('.like-thumb-down[data-id="' + post_id + '"]').html('<i class="fa fa-thumbs-down"></i>');
                            }
                        }
                    },
                    error: function (error) {
                        toastr["danger"]('Success: ' + error);
                    }

                });
            });

            $(document).on('click', '.star-rating', function () {
                var rating = $(this).attr('data-id');
                var post_id = $(this).attr('data-post');
                var star_ele = $(this);
                $.ajax({
                    url: '/reaction/' + post_id + '/rate/' + rating,
                    method: 'get',
                    success: function (returnedData) {
                        toastr["success"]('Success: ' + returnedData.message);
                        if (returnedData.avg_rating !== null) {
                            $('.avg_rating[data-id="' + post_id + '"]').html(' | ' + returnedData.avg_rating);
                        }
                        else {
                            $('.avg_rating[data-id="' + post_id + '"]').html(' | ');
                        }

                        $('.star-rating[data-post="' + post_id + '"][data-post="' + post_id + '"]').html('<i class="fa fa-star-o"> </i>').attr('data-rating', rating);

                        if (returnedData.status < 0) {
                            rating = 0;
                        }

                        $('.star-rating[data-post="' + post_id + '"]').attr('data-rating', rating);

                        for (var i = 1; i <= rating; i++) {
                            if (i > 0) {
                                $('.star-rating[data-id="' + i + '"][data-post="' + post_id + '"]').html('<i class="fa fa-star"> </i>');
                            }

                        }
                    },
                    error: function (error) {
                        toastr["danger"]('Success: ' + error);
                    }
                });
            });


        });
    </script>

@endsection