@extends('layouts.app')

@section('content')

    <ol class="breadcrumb bc-3" >
        <li><a href="index.html"><i class="fa-home"></i>Home</a></li>
        <li class="active"><strong>View Dispatch</strong></li>
        <a href="{{ URL::to('createDisp') }}" type="button" style="float:right;" class="btn btn-primary btn-icon icon-right">
               View Dispatch <i class="entypo-user-add"></i>
        </a>
    </ol>

        <div class="row">
			<div class="col-md-9 col-sm-7">
				<h2>View Dispatch</h2>
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



            </div>
      </div>

@endsection
