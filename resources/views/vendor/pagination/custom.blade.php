@php
$isAdmin = request()->routeIs('admin.*'); // hoặc request()->is('admin/*')
@endphp

@if ($isAdmin)
@include('vendor.pagination.bootstrap-5', ['paginator' => $paginator])
@else
@include('vendor.pagination.tailwind', ['paginator' => $paginator])
@endif