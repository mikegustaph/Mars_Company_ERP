@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>

    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>On Progress Task</h2>
        </div>

        <div class="col-md-3 col-sm-5">

            <form method="get" role="form" class="search-form-full">

                <div class="form-group">
                    <input type="text" class="form-control" name="s" id="search-input" placeholder="Search..." />
                    <i class="entypo-search"></i>
                </div>

            </form>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <!-- panel head -->
                <div class="panel-heading">
                    <div class="panel-title">Light Panel</div>

                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>

                <!-- panel body -->
                <div class="panel-body">

                    <div class="row bs-wizard" style="border-bottom:0;">

                        <div class="col-xs-3 bs-wizard-step complete">
                            <div class="text-center bs-wizard-stepnum">
                                <p class="panel-title">Task Created</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 bs-wizard-step complete">
                            <!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                <p class="panel-title">Documents Received</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 bs-wizard-step active">
                            <!-- complete -->
                            <div class="text-center bs-wizard-stepnum">
                                <p class="panel-title">Task in Progress</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>

                        <div class="col-xs-3 bs-wizard-step disabled">
                            <!-- active -->
                            <div class="text-center bs-wizard-stepnum">
                                <p class="panel-title"> Task Completed</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="bs-wizard-dot"></a>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>Client</h5>
                            <h4><small>Clix</small></h4>
                        </div>
                        <div class="col-sm-3">
                            <h5>Contact Person</h5>
                            <h4><small>Miqdaad Kassam</small></h4>
                        </div>
                        <div class="col-sm-2">
                            <h5>Service</h5>
                            <h4><small> VAT</small></h4>
                        </div>
                        <div class="col-sm-4">
                            <h5> Documents Received</h5>
                            <ul>
                                <li>EFD Summary: 1 Document - January 2023 Sales Summary (Download)</li>
                                <li>Expenses: 2 Files - January 2023 Expenses (Download)</li>
                                <li>Purchases: 1 Envelop - January 2023 Purchases (Download)</li>
                                <li>Credit Notes: n/a</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="post">
                                <div class="form-group">

                                    <textarea type="text" class="form-control" row="12" class="form-control" id="field-ta"
                                        placeholder="Post task updates here"></textarea>

                                </div>
                                <br>
                                <div class="col-md-12">
                                    <button type="submit" style="float:right;" class="btn btn-primary">
                                        Post Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
