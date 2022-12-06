@php
    $items = $items instanceof \Illuminate\Support\Collection ? $items->toArray() : $items;
    $isItemsAssocArray = $items === array_values($items);
    $defaultValue = old($name) ?? $defaultValue ?? null;
    $id = $id ?? $name;
    $data = $data ?? [];
    $defaultPlaceholderValue = $defaultPlaceholderValue ?? false;
@endphp

<select name="{{ $name }}" id="{{ $id }}" class="form-control">
    @if ($defaultPlaceholderValue !== false)
        <option value="" selected>{{ $defaultPlaceholderValue }}</option>
    @endif
    @foreach($items as $key => $item)
        @php $value = $isItemsAssocArray ? $item : $key;  @endphp
        <option value="{{ $value }}"
        @if (is_array($defaultValue) || $defaultValue instanceof \Illuminate\Support\Collection)
            @foreach($defaultValue as $valueItem)
                {{ $valueItem == $value ? 'selected' : ''  }}
                @endforeach
            @else
            {{ $defaultValue == $value ? 'selected' : ''  }}
            @endif
        >
            {{ $item }}
        </option>
    @endforeach
</select>
