@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3">
        <li><a href="index.html"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>Employee</strong></li>
        <a type="button" href="{{ URL::to('createEmployees') }}" style="float:right;"
            class="btn btn-primary btn-icon icon-right">
            Add Employee <i class="entypo-user-add"></i>
        </a>
    </ol>

    <div class="row">
        <div class="col-md-9 col-sm-7">
            <h2>Employees</h2>
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
    <!-- Member Entries -->

    <!-- Single Member -->
    @if (count($employees) > 0)
        @foreach ($employees as $employee)
            <div class="member-entry">

                <a href="javascript:void(0);" class="member-img">
                    <img src="{{ Storage::url('images/' . $employee->images) }}" alt="Image">
                </a>

                <div class="member-details">
                    <h4>

                        <a href="javascript:void(0);" style="text-transform: capitalize;">{{ $employee->first_name }}</a>
                    </h4>

                    <!-- Details with Icons -->
                    <div class="row info-list">
                        <div class="col-sm-3">
                            <i class="entypo-briefcase"></i>
                            Position: <a href="javascript:void(0)">{{ $employee->position }}</a>
                        </div>

                        <div class="col-sm-3">
                            <i class="glyphicon glyphicon-phone"></i>
                            <a href="javascript:void(0)">{{ $employee->phone }}</a>
                        </div>

                        <div class="col-sm-3">
                            <i class="entypo-doc"></i>
                            <a href="javascript:void(0)">{{ $employee->nssf }}</a>
                        </div>

                        <div class="col-sm-3">
                            <a href="{{ url('/editemployee/' . $employee->id) }}" id=""
                                class="btn btn-primary btn-sm btn-icon icon-left">
                                <i class="entypo-pencil"></i>
                                Manage Employee
                            </a>
                        </div>

                        <div class="clear"></div>

                        @if ($employee->status == 'Active')
                            <div class="col-sm-3" style="color:green;">
                                <i class="entypo-record" href="javascript:void(0)"></i>
                                Status: <a href="javascript:void(0)" style="color:green;">Active</a>
                            </div>
                        @elseif ($employee->status == 'Suspended')
                            <div class="col-sm-3" style="color:red;">
                                <i class="entypo-record"></i>
                                Status: <a href="javascript:void(0)" style="color:red;">Suspended</a>
                            </div>
                        @elseif ($employee->status == 'Retired')
                            <div class="col-sm-3" style="color:rgb(123, 123, 123);">
                                <i class="entypo-record"></i>
                                Status: <a href="javascript:void(0)" style="color:rgb(123, 123, 123);">Retired</a>
                            </div>
                        @endif

                        <div class="col-sm-3">
                            <i class="entypo-mail"></i>
                            Email: <a href="javascript:void(0)">{{ $employee->email }}</a>
                        </div>

                        <div class="col-sm-3">
                            <i class="entypo-doc-text"></i>
                            TIN: <a href="javascript:void(0)">{{ $employee->tin }}</a>
                        </div>

                    </div>
                </div>

            </div>
        @endforeach
    @endif


    <!-- Pager for search results -->
    <div class="row">
        <div class="col-md-12">
            <ul class="pager">
                @if ($employees->previousPageUrl())
                    <li><a href="{{ $employees->previousPageUrl() }}"><i class="entypo-left-thin"></i> Previous</a></li>
                @endif
                @if ($employees->nextPageUrl())
                    <li><a href="{{ $employees->nextPageUrl() }}">Next <i class="entypo-right-thin"></i></a></li>
                @endif
            </ul>
        </div>
    </div>


    <script>
        document.querySelector('.entypo-record').style.setProperty('hover', 'none');
    </script>

@endsection
