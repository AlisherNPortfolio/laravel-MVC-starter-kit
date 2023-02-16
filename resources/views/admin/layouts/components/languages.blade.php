@php
$currentLang = current_lang();
@endphp
<div class="dropdown language-selector">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{ checked_asset('dashboard/images/langs/' . $currentLang . '.png') }}" alt="{{ $currentLang }}" width="22">
    </button>
    <div class="dropdown-menu" aria-labelledby="languages">
        @foreach(config('app.languages') as $lang)
            @if($currentLang !== $lang)
                <a class="dropdown-item media lang__picker" data-picker="{{ $lang }}" href="#">
                    <img src="{{ checked_asset('dashboard/images/langs/' . $lang . '.png') }}" alt="{{ $currentLang }}" width="22">
                </a>
            @endif
        @endforeach
    </div>
</div>
