@section('header_scripts')
<script src="{{ checked_asset('dashboard/assets/ckeditor/ckeditor.js') }}"></script>
@endsection
<div class="col-10 col-md-8">
    @include('admin.layouts.components.translation_input',
        [
        'type' => 'input', // input or textarea
        'inputType' => 'text',// input types
        'name' => 'name', // input name
        'id' => 'category_name',
        'class' => 'form-control',
        'placeholder' => 'Category name',
        'slugable' => 'slug' // for input which get slug text
        ])
    <small class="form-text text-muted">This is a help text</small>
</div>
@section('end_scripts')
<script !src="">
    langs = '{!! json_encode(languages()) !!}';
    JSON.parse(langs).forEach(value => {
        CKEDITOR.replace( 'value[' + value + ']' ); // value -> input name
    });
</script>
@endsection
