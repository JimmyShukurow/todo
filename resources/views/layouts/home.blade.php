<!DOCTYPE html>
<html lang="en">
    @include('components.head')
<body>
    @include('components.header')
    @include('components.main')
    @include('components.list')
    <div class="pagination">
        @if (Auth::check())
        {!! $details->links() !!}
        @endif
    </div>
</body>
</html>