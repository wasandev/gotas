@php
    $resources = collect(Nova::availableResources(request()));
    $navigation = $resources->filter(function($resource, $key) {
        return isset($resource::$subGroup);
    })->groupBy(function ($item, $key) {
        return $item::group();
    })->sortKeys()->all();

    $gotasMenugroup = collect(Nova::availableTools(request()))->first(function($tool) {
        return $tool instanceof Wasandev\GotasMenugroup\GotasMenugroup;
    });
@endphp
@if (count($navigation))
    @foreach ($navigation as $group => $resources)
    <router-link tag="a" :to="{ name: 'gotas-menugroup', params: { 'group': '{{ $group }}' }}" class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
        
            {!! $gotasMenugroup->getGroupIcon($group) !!}
            <span class="sidebar-label">
                {{ $group }}
            </span>

    </router-link>
    @endforeach
@endif

