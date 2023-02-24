@if(!isset($hideBtn) or $hideBtn)
    <form action="{{route($deleteRoute, $entity)}}"
          method="POST">
        @method('delete')
        @csrf
        {{ $slot }}
        <button type="submit"
                class="btn btn-icon text-danger"
                onclick='return confirm("Are you sure?")'>
            <i class="fa fa-trash"></i>
        </button>
    </form>
@else
    {{ $slot }}
@endif

