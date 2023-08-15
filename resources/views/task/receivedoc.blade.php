@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Tasks</strong></li>

    </ol>

    <div class="row">
        <div class="col-md-6">
            <h2>Tasks</h2>
        </div>
        <div class="col-md-6">
            @if ($errors->any())
                <div id="error-message" class="alert alert-danger">
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
    </div>
    <!--Main Content Start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Receive document
                    </div>
                    <div class="panel-options">
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('task.storeDoc') }}" role="form"
                        class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-3" class="col-sm-3 text-right control-label">Task No:</label>
                                    <div class="col-sm-5">
                                        <select name="taskNo" class="selectboxit" readyonly>
                                            <option value="{{ $t->id }}">{{ $t->id }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-3" class="col-sm-3 text-right control-label">Client</label>
                                    <div class="col-sm-8">
                                        <select name="client" class="selectboxit" readyonly>
                                            <option value="{{ $t->client->id }}">{{ $t->client->name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-3" class="col-sm-2 text-right control-label">Service</label>
                                    <div class="col-sm-5">
                                        <select name="service" class="selectboxit" readyonly>
                                            <option value="{{ $t->client->clientserv->serv->id }}">
                                                {{ $t->client->clientserv->serv->service_name }}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <hr />
                        <div class="row" style="padding-bottom:12px">
                            <div class="col-sm-2">
                                <label for="field-3" class="control-label">Date Received</label>
                            </div>
                            <div class="col-sm-4">
                                <label for="field-3" class="control-label">Notes</label>
                            </div>
                            <div class="col-sm-1 text-center">
                                <label for="field-3" class="control-label">Qty</label>
                            </div>
                            <div class="col-sm-2 text-center">
                                <label for="field-3" class="control-label">Type</label>
                            </div>
                            <div class="col-sm-3">
                                <label for="field-3" class="control-label">Narration</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <input type="date" name="dateReceived" class="form-control col-sm-2" id="field-2"
                                    placeholder="dd/mm/yyyy" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="note" class="form-control col-sm-2" id="field-2"
                                    placeholder="Note">
                            </div>
                            <div class="col-sm-1">

                                <input type="number" name="quantity" class="form-control" id="field-2" placeholder="Qty"
                                    required>

                            </div>
                            <div class="col-sm-2">
                                <select name="fileType" class="selectboxit">
                                    <optgroup label="File Type">

                                        <option value="file">File</option>
                                        <option value="folder">Folder</option>
                                        <option value="box">Box</option>

                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="narration" class="form-control" id="field-2"
                                    placeholder="Narration">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" style="float:right;" class="btn btn-primary btn-icon icon-right">
                                    Receive Documents <i class="entypo-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!--Main Content Start-->
@endsection
