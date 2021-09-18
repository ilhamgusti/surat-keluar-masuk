@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        {{-- <div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert">
            <i class="mdi mdi-alert-outline alert-icon"></i>
            <div class="alert-text">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>

            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
                </button>
            </div>
        </div> --}}

        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span><i
                        class="mdi mdi-close"></i></span>
            </button>
            <div class="media">
                <div class="alert-left-icon-big">
                    <span><i class="mdi mdi-alert"></i></span>
                </div>
                <div class="media-body">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
