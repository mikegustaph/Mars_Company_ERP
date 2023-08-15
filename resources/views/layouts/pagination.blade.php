@if($paginator->hasPages())

        <div class="col-md-12">
            <ul class="pager">
                @if ($paginator->onFirstPage())
                      <li><a href="#"><i class="entypo-left-thin"></i> Previous</a></li>
                    @else
                      <li><a href="{{ $paginator->previousPageUrl() }}"><i class="entypo-left-thin"></i> Previous</a></li>
                @endif

                @if ($paginator->hasMorePages())
                      <li><a href="{{ $paginator->nextPageUrl() }}">Next <i class="entypo-right-thin"></i></a></li>
                    @else
                      <li><a href="#">Next <i class="entypo-right-thin"></i></a></li>
                @endif

            </ul>
        </div>
    </div>
    
@endif
