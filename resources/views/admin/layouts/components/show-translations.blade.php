@if(count($translations) > 0)
    @foreach($translations as $key => $item)
        <span class="badge badge-info">{{ ucfirst($key) }}:</span>
        {{ $item ?? '-' }}
        <br>
    @endforeach
@endif
