@if(isset($actions))
    <div class="setting__buttons">
        @if((in_array('update', $actions, true)) || in_array('all', $actions, true))
            <a href="/admin/{{ $link }}/edit" class="badge badge-warning">Update</a>
        @endif
        @if((in_array('show', $actions, true)) || in_array('all', $actions, true))
            <a href="/admin/{{ $link }}" class="badge badge-info">Show</a>
        @endif
        @if((in_array('delete', $actions, true)) || in_array('all', $actions, true))
            <form action="/admin/{{ $link }}" method="post" style="display:inline-block">
                @csrf
                @method('delete')
                <button class="badge badge-danger border-0 cursor-pointer btn-hover"  onclick="return confirm('Are you sure you want to delete it?')"  type="submit">Delete</button>
            </form>
        @endif
    </div>
@endif
