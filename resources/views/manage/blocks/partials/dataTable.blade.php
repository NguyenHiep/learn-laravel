<table class="table table-striped table-bordered table-hover custom-table js-action-list-rowlink"
       id="DataTable_{{ $id }}"
       role="grid"
       data-provide="datatables"
       @if(isset($routeAjax)) data-ajax="{{ $routeAjax }}" @endif
       @if(isset($columns)) data-columns='{!! json_encode($columns) !!}' @endif
       data-pagelength="10"
       cellspacing="0">
    <thead>
    <tr role="row">
        @foreach($fields as $key => $field)
            <th>{!! $field['label'] !!}</th>
        @endforeach
    </tr>
    </thead>
    <tfoot>
    @foreach($fields as $key => $field)
        <th>{!! $field['label'] !!}</th>
    @endforeach
    </tfoot>
    <tbody></tbody>
</table>
@section('styles')
    @parent
    <link href="{{asset('/manages/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('scripts')
    @parent
    <script src="{{asset('/manages/assets/global/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('/manages/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}"></script>
    <script src="{{asset('/manages/assets/js/datatable.js')}}"></script>
@endsection