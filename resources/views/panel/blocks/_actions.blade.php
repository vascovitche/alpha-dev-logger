<div class="card">
    <div class="card-header">
        <div class="inline-block">
            <h3>Actions:</h3>
        </div>
    </div>
    <div class="card-body">
        <div>
            <form action="{{ route('admin.log.status', $log->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="input-group">
                    @include('admin::components.input_group', [
                         'type' => 'select',
                         'name' => 'status',
                         'required' => true,
                         'label' => false,
                         'items' => $statuses,
                         'defaultValue' => $log->status->name,
                     ])

                    <div class="input-group-append">
                        <button class="btn btn-primary">Change Status</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.log.destroy', $log->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-block btn-danger"
                        data-ask="1" data-title="Delete log"
                        data-message="Are you sure you want to delete the log - '{{ $log->message }}'?"
                        data-type="danger">
                    <i class="fas fa-trash"></i>Delete
                </button>
            </form>
        </div>
    </div>
</div>
