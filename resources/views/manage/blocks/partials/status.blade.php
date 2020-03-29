@isset($status)
    @php
        $statusClass = $status === config('define.STATUS_ENABLE') ? 'label-success' : 'label-danger';
        $showText = __('selector.post_status.' . $status);
    @endphp
    <span class="label label-sm {{ $statusClass }} margin-right-10"> {{ $showText }}</span>
@endisset