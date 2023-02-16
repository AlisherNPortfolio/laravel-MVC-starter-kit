<style>
    .file-manager-input {
        display: none;
    }
</style>
@if($name)
    <span class="input-group-btn">
        <a id="{{ $name }}-button" data-input="{{ $name }}" data-preview="{{ $name }}" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
        </a>
    </span>
    <input id="{{ $name }}" class="file-manager-input form-control {{ isset($class) ? $class : ''  }}" type="text" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}>
    @push('filemanager_scripts')
        <script src="{{ checked_asset('/vendor/laravel-filemanager/js/init.js') }}"></script>
        <script !src="">
            let route_prefix = "/admin/laravel-filemanager";
            lfm('{{ $name }}-button', 'image', {prefix: route_prefix, type: 'Images', _token: '{{ csrf_token() }}'});
        </script>
    @endpush
@else
    <span class="alert alert-danger">'name' attribute is mandatory</span>
@endif
