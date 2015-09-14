<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{$title}} @if(isset($text_small)) <small>{{$text_small}}</small>@endif
            @if(isset($print))
                <button class="btn btn-primary pull-right no-print" onclick="window.print()">Print</button>
            @endif
        </h1>
    </div>
</div>
<!-- /.row -->