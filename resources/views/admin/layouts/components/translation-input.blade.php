@push('header_scripts')
    <script src="{{ checked_asset('dashboard/assets/ckeditor/ckeditor.js') }}"></script>
@endpush
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach($languages as $key => $language)
            <a class="nav-item nav-link {{ $key === 0 ? 'active show' : '' }}" id="custom-nav-{{ $name . '-' . $language }}-tab" data-toggle="tab" href="#custom-nav-{{ $name . '-' . $language }}" role="tab" aria-controls="custom-nav-{{ $name . '-' . $language }}" aria-selected="true">{{ ucfirst($language) }}</a>
        @endforeach
    </div>
</nav>
<div class="tab-content pt-2" id="nav-tabContent">
    @foreach($languages as $key => $language)
        <div class="tab-pane fade {{ $key === 0 ? 'active show' : '' }}" id="custom-nav-{{ $name . '-' . $language }}" role="tabpanel" aria-labelledby="custom-nav-{{ $name . '-' . $language }}-tab">
            @if($type === 'input')
                <input type="text"
                       name="{{ $name . '['. $language . ']' }}"
                       id="{{ isset($id) ? $id . '-' . $language : $name . '-' . $language }}"
                       class="translation-input {{ isset($class) ? $class : '' }}"
                       placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
                       @if(isset($slugable) && $language === fallback_lang()) data-slugable="{{ $slugable }}" @endif
                       value="{{ isset($value[$language]) ? $value[$language] : '' }}" {{ $attributes }}>
            @else

                <textarea name="{{ $name . '['. $language . ']' }}"
                          id="{{ isset($id) ? $id . '-' . $language : $name . '-' . $language }}"
                          rows="{{ isset($rows) ? $rows : "3" }}"
                          class="translation-textarea {{ isset($class) ? $class : '' }}"
                          placeholder="{{ isset($placeholder) ? $placeholder : '' }}" {{ $attributes }}>{{ isset($value[$language]) ? $value[$language] : '' }}</textarea>
            @endif
        </div>
    @endforeach
</div>
@push('end_scripts')
    @if($richTextBox)
        <script !src="">

            function initEditor(langs) {
                JSON.parse(langs).forEach(value => {
                    initCKEditor('{{$name}}[' + value + ']');
                });
            }

            function initCKEditor(inputName)
            {
                if (inputName in CKEDITOR.instances) {
                    CKEDITOR.instances[inputName].destroy();
                }
                CKEDITOR.replace( inputName , {
                    filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                    filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
                });

            }

            initEditor('{!! json_encode($languages, true) !!}')
        </script>
    @endif
@endpush
