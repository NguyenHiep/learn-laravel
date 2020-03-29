@empty(!$actions)
    <div class="btn-group btn-group-solid">
        @foreach ($actions as $item)
            <a @foreach ($item['attributes'] as $attr => $val) {{ $attr }} = "{{ $val }}" @endforeach
            > {!! $item['label'] !!} </a>
        @endforeach
    </div>
@endempty