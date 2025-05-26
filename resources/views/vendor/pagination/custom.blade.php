@php
$isAdmin = request()->routeIs('admin.*');
@endphp

@if ($isAdmin)
@include('vendor.pagination.bootstrap-5', ['paginator' => $paginator])
@else ($isAdmin)
@include('vendor.pagination.tailwind', ['paginator' => $paginator])
@endif