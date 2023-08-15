@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks update</strong></li>
    </ol>

    <div class="row">
        <div class="col-md-9">
            <h2>Tasks Progress</h2>
        </div>

        <div class="col-md-3">
            <button onclick="jQuery('#modal-1').modal('show')" type="button" style="float:right;" class="btn btn-success">
                Complete Task
            </button>
        </div>
    </div>
    <!--Main Content-->
    <div class="row">

        <div class="col-md-12">
            <div class="member-entry">
                <div class="member-details">
                    <h4>
                        Task name: <a href="javascript:void(0);" style="text-transform: capitalize;">VAT</a>
                    </h4>
                    <!-- Details with Icons -->
                    <div class="row info-list">
                        <div class="col-sm-4">
                            <i class="entypo-user" style="color: #037e7a;"></i>
                            <strong> Senior:</strong> Miqdaad<a href="javascript:void(0)"></a>
                        </div>

                        <div class="col-sm-4">
                            <i class="entypo-user" style="color: #ff1d19;"></i>
                            <strong> Junior: </strong> Miqdaad<a href="javascript:void(0)"></a>
                        </div>

                        <div class="col-sm-4">
                            <i class="entypo-doc"></i>
                            <strong> Client:</strong> Clix Consultancy<a href="javascript:void(0)"></a>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Task Progress bar-->
    <div class="row">
        <div class="col-md-12">
            <form id="rootwizard" method="post" action="" class="form-horizontal form-wizard">
                <div class="steps-progress">
                    <div class="progress-indicator"></div>
                </div>
                <ul>
                    <li class="completed">
                        <a href="#tab1" data-toggle="tab"><span>1</span>Start</a>
                    </li>
                    <li class="completed">
                        <a href="#tab2" data-toggle="tab"><span>2</span>Pre Checklist</a>
                    </li>
                    <li class="completed">
                        <a href="#tab3" data-toggle="tab"><span>3</span>Post Checklist</a>
                    </li>
                    <li class="active">
                        <a href="#tab4" data-toggle="tab"><span>4</span>Complete</a>
                    </li>
                </ul>
                <br />
                <br />
            </form>

        </div>
    </div>

    <!-- Task Comments and Notifications -->
    <div class="row">
        <div class="profile-env">
            <section class="profile-feed">

                <!-- profile post form -->
                <form class="profile-post-form" method="post">

                    <textarea class="form-control autogrow" placeholder="What's on your mind?"></textarea>

                    <div class="form-options">

                        <div class="post-type">

                            <a href="#" class="tooltip-primary" data-toggle="tooltip" data-placement="bottom"
                                title="" data-original-title="Upload a Picture">
                                <i class="entypo-camera"></i>
                            </a>

                            <a href="#" class="tooltip-primary" data-toggle="tooltip" data-placement="bottom"
                                title="" data-original-title="Attach a file">
                                <i class="entypo-attach"></i>
                            </a>

                            <a href="#" class="tooltip-primary" data-toggle="tooltip" data-placement="bottom"
                                title="" data-original-title="Check-in">
                                <i class="entypo-location"></i>
                            </a>
                        </div>

                        <div class="post-submit">
                            <button type="button" class="btn btn-primary">POST</button>
                        </div>

                    </div>
                </form>

                <!-- profile stories -->
                <div class="profile-stories">

                    <article class="story">

                        <aside class="user-thumb">
                            <a href="#">
                                <img src="assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
                            </a>
                        </aside>

                        <div class="story-content">

                            <!-- story header -->
                            <header>

                                <div class="publisher">
                                    <a href="#">Art Ramadani</a> posted a status update
                                    <em>3 hours ago</em>
                                </div>

                                <div class="story-type">
                                    <i class="entypo-feather"></i>
                                </div>

                            </header>

                            <div class="story-main-content">
                                <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered
                                    prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare
                                    all put. Added forth chief trees but rooms think may. </p>
                            </div>

                            <!-- story like and comment link -->
                            <footer>
                                <a href="#" class="liked">
                                    <i class="entypo-heart"></i>
                                    Liked <span>(8)</span>
                                </a>

                                <a href="#">
                                    <i class="entypo-comment"></i>
                                    Comment <span>(12)</span>
                                </a>

                                <!-- story comments -->
                                <ul class="comments">

                                    <li>
                                        <div class="user-comment-thumb">
                                            <img src="assets/images/thumb-2@2x.png" alt="" class="img-circle"
                                                width="30" />
                                        </div>

                                        <div class="user-comment-content">

                                            <a href="#" class="user-comment-name">
                                                Arlind Nushi
                                            </a>

                                            Tolerably earnestly middleton extremely distrusts she boy now not. Add and
                                            offered prepare how cordial two promise. Add and offered prepare how cordial two
                                            promise.

                                            <div class="user-comment-meta">

                                                <a href="#" class="comment-date">January 4 at 1:11am</a>
                                                -

                                                <a href="#">
                                                    <i class="entypo-heart"></i>
                                                    Like <span>(2)</span>
                                                </a>
                                                -

                                                <a href="#">
                                                    <i class="entypo-comment"></i>
                                                    Reply
                                                </a>
                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-comment-thumb">
                                            <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle"
                                                width="30" />
                                        </div>

                                        <div class="user-comment-content">

                                            <a href="#" class="user-comment-name">
                                                Sherry William
                                            </a>

                                            Extremity direction existence as dashwoods do up. Securing marianne led welcomed
                                            offended but offering six raptures. Conveying concluded newspaper rapturous oh
                                            at.

                                            <div class="user-comment-meta">

                                                <a href="#" class="comment-date">January 3 at 6:42pm</a>
                                                -

                                                <a href="#" class="liked">
                                                    <i class="entypo-heart"></i>
                                                    Liked
                                                </a>
                                                -

                                                <a href="#">
                                                    <i class="entypo-comment"></i>
                                                    Reply
                                                </a>
                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <div class="user-comment-thumb">
                                            <img src="assets/images/thumb-3@2x.png" alt="" class="img-circle"
                                                width="30" />
                                        </div>

                                        <div class="user-comment-content">

                                            <a href="#" class="user-comment-name">
                                                Harold Bella
                                            </a>

                                            Mean if he they been no hold mr. Is at much do made took held help. Latter
                                            person am secure of estate genius at.

                                            <div class="user-comment-meta">

                                                <a href="#" class="comment-date">January 2 at 3:25pm</a>
                                                -

                                                <a href="#">
                                                    <i class="entypo-heart"></i>
                                                    Like
                                                </a>
                                                -

                                                <a href="#">
                                                    <i class="entypo-comment"></i>
                                                    Reply
                                                </a>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="comment-form">
                                        <div class="user-comment-thumb">
                                            <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle"
                                                width="30" />
                                        </div>

                                        <div class="user-comment-content">

                                            <textarea class="form-control autogrow" placeholder="Write a comment..."></textarea>
                                            <button class="btn"><i class="entypo-chat"></i></button>

                                        </div>
                                    </li>

                                </ul>

                            </footer>

                            <!-- separator -->
                            <hr />

                        </div>

                    </article>


                    <article class="story">

                        <div class="col-md-12">
                            <div class="profile-env">
                                <section class="profile-feed">
                                    <!-- profile post form -->
                                    <form class="profile-post-form" method="post">
                                        <textarea class="form-control autogrow" placeholder="Enter Task Note"></textarea>
                                        <div class="form-options">
                                            <div class="post-type">

                                            </div>
                                            <div class="post-submit">
                                                <button type="button" class="btn btn-primary">POST</button>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>

                    </article>

                </div>
            </section>
        </div>

    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <h2>Post Checklist</h2>
        </div>
        <div class="col-md-6"></div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-1">
            <p>1</p>
        </div>
        <div class="col-md-2">
            <p>Working File</p>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="memart" accept=".pdf" id="field-file"
                        placeholder="">

                </div>
            </div>
        </div>
    </div>

    <!------ Modal Here -------------->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Complete Task</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    Are you sure you want to complete this task?
                </div>
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-1">
                        <a style="cursor: pointer;" type="button" class="btn btn-success" href="#">Yes</a>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                    <div class="col-sm-5"></div>
                </div>
                <br />
                <div class="modal-footer">


                </div>
            </div>
        </div>
    </div>
    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">

    <!-- Imported scripts on this page -->
    <script src="assets/js/datatables/datatables.js"></script>
    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>
@endsection
