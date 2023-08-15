@extends('layouts.app')

@section('content')
    <ol class="breadcrumb bc-3">
        <li><a href="{{ URL::to('home') }}"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Dispatch</strong></li>
    </ol>

    <h2>Dispatch</h2>
    <br />

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Form to Create a New Dispatch
                    </div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>

                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>

                    </div>
                </div>


                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('dispatch.createDisp') }}"
                        class="form-horizontal form-groups-bordered">
                        @csrf
                        <!--First Row-->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Select Client</label>
                                    <div class="col-sm-5">
                                        <select name="selected_client" class="select2" data-allow-clear="true"
                                            data-placeholder="Select client...">
                                            <option></option>
                                            <optgroup label="Clients">
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date</label>

                                    <div class="col-sm-5">
                                        <input type="text" name="dispatch_date" class="form-control datepicker"
                                            data-start-view="1" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Second Row-->
                        <div class="row">
                            <div class="col-md-8 text-left">
                                <h3>Documents</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <h4 style="color:rgb(14, 127, 14);"><i class="entypo-plus"></i> Add line</h4>
                            </div>
                        </div>
                        <div class="panel panel-primary" data-collapsed="0"
                            style="background-color:#f0f0f0;padding-bottom:8px;">
                            <div class="row">

                                <div class="col-sm-2" style="padding-left:20px;">
                                    <label for="field-3" class="control-label">Date Received</label>
                                </div>
                                <div class="col-sm-3">
                                    <label for="field-3" class="control-label">Description</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="field-3" class="control-label">Qty</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="field-3" class="control-label">Checkout</label>
                                </div>
                                <div class="col-sm-3">
                                    <label for="field-3" class="control-label">Narration</label>
                                </div>
                                <div class="col-sm-1">
                                    <label for="field-3" class="control-label">Action</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2" style="padding-left:20px;">
                                <h5>22 Feb 2023</h5>
                            </div>
                            <div class="col-sm-3">
                                <h5>Documents for a account file</h5>
                            </div>
                            <div class="col-sm-1">
                                <h5>1 File</h5>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="checkout" class="form-control" placeholder="Checkout">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="narration" class="form-control" placeholder="Add Narration">
                            </div>
                            <div class="col-sm-1">
                                <div class="" style="text-align:left; color:red;font-weight:blold;padding-top:8px;">
                                    <i class="entypo-cancel"></i>
                                </div>
                            </div>
                        </div>
                        <br />
                        <hr />
                        <br />
                        <!--Custom Dispatch-->
                        <div class="panel panel-primary" data-collapsed="0"
                            style="background-color:#f0f0f0;padding-bottom:8px;padding-right:12px;">
                            <div class="row">
                                <div class="col-sm-5" style="padding-left:20px;">
                                    <label for="field-3" class="control-label">Custom Dispatch</label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="field-3" class="control-label">Checkout</label>
                                </div>
                                <div class="col-sm-3">
                                    <label for="field-3" class="control-label">Narration</label>
                                </div>
                                <div class="col-sm-2" style="text-align: right;">
                                    <label for="field-3" class="control-label" style="color:rgb(14, 127, 14);"><i
                                            class="entypo-plus"></i> Add line</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <input type="text" name="custom_desc" class="form-control"
                                    placeholder="Add Description">
                            </div>

                            <div class="col-sm-2">
                                <input type="text" name="custom_check" class="form-control" placeholder="Checkout">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="custom_narration" class="form-control"
                                    placeholder="Add Narration">
                            </div>
                            <div class="col-sm-1">
                                <div class="" style="ext-align:left; color:red;font-weight:blold;padding-top:8px;">
                                    <i class="entypo-cancel"></i>
                                </div>
                            </div>

                        </div>

                        <div class="row" style="padding:20px;">
                            <div class="">
                                <label for="field-3" class="control-label">Note</label>
                                <textarea rows="3" name="dispatch_note" class="form-control autogrow" placeholder="Type your note"></textarea>
                            </div>
                        </div>

                        <div class="row" style="padding:20px;">
                            <div class="">
                                <button type="submit" style="float:right;" class="btn btn-primary btn-icon icon-right">
                                    Add Dispatch <i class="entypo-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
