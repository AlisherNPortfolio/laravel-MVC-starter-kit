@if(isset($can) && $can)
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="create-btn-container ov-h bg-white p-3">
                <a href="/admin/{{ $link }}/create" class="btn btn-sm btn-outline-success float-right">Create</a>
            </div>
        </div>
    </div>
@endif
