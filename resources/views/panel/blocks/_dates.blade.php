<div class="d-inline-block ml-3">
    <form action="{{ route('admin.log.index') }}" method="get">
        <div class="input-group">
            @include('admin::components.input_group', [
                 'type' => 'select',
                 'name' => 'date',
                 'required' => true,
                 'label' => false,
                 'items' => $dates,
                 'defaultValue' => request()->get('date'),
                 'defaultPlaceholderValue' => 'All Dates'
             ])

            <div class="input-group-append">
                <button class="btn btn-primary">Go!</button>
            </div>
        </div>
    </form>

</div>

