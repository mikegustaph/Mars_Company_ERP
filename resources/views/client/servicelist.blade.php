@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ url('/home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Assign Service</strong></li>

    </ol>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><strong>Oohps! </strong>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('message'))
                <div id="flash-message" class="alert alert-success alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Well done! </strong>{{ session('message') }}
                </div>
                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            $('#flash-message').fadeOut('slow');
                            $('#error-message').fadeOut('slow');
                        }, 5000); // Adjust the timeout value (in milliseconds) as needed
                    });
                </script>
            @endif
        </div>
        <div class="col-md-3"></div>
    </div>
    <!--Form Start-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Select Service for Client
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-md-5">
                            <form action="" method="POST" class="" enctype="multipart/form-data">
                                @csrf

                                <ul class="icheck-list">
                                    @foreach ($service as $row)
                                        <li>
                                            <input tabindex="5" type="checkbox" name="selectedService"
                                                value="{{ $row->id }}" class="icheck-2" id="minimal-checkbox-1-2">
                                            <label for="minimal-checkbox-1-2">{{ $row->service_name }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" id="submit-btn" style="float:right;" class="btn btn-success">
                            Add Service <i class="entypo-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('input.icheck').iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });

            $('input.icheck-2').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
        });


        jQuery(document).ready(function($) {
            var icheck_skins = $(".icheck-skins a");

            icheck_skins.click(function(ev) {
                ev.preventDefault();

                icheck_skins.removeClass('current');
                $(this).addClass('current');

                updateiCheckSkinandStyle();
            });

            $("#icheck-style").change(updateiCheckSkinandStyle);
        });

        function updateiCheckSkinandStyle() {
            var skin = $(".icheck-skins a.current").data('color-class'),
                style = $("#icheck-style").val();

            var cb_class = 'icheckbox_' + style + (skin.length ? ("-" + skin) : ''),
                rd_class = 'iradio_' + style + (skin.length ? ("-" + skin) : '');

            if (style == 'futurico' || style == 'polaris') {
                cb_class = cb_class.replace('-' + skin, '');
                rd_class = rd_class.replace('-' + skin, '');
            }

            $('input.icheck-2').iCheck('destroy');
            $('input.icheck-2').iCheck({
                checkboxClass: cb_class,
                radioClass: rd_class
            });
        }
    </script>


    <!------ Modal Here -------------->

    <script src="{{ url('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.js') }}"></script>
    <script src="{{ url('assets/js/joinable.js') }}"></script>
    <script src="{{ url('assets/js/resizeable.js') }}"></script>
    <script src="{{ url('assets/js/neon-api.js') }}"></script>


    <!-- Imported scripts on this page -->
    <script src="{{ url('assets/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ url('assets/js/neon-chat.js') }}"></script>
@endsection
