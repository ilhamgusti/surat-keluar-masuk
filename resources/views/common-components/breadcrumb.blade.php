<div class="page-title-box">
    <div class="float-right">
        <ol class="breadcrumb">
            @if (!empty($item1))
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ $item1 }}</a>
                </li>
            @endif
            @if (!empty($item2))
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ $item2 }}</a>
                </li>
            @endif
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ request()->get('arsip') ? 'Arsip' : $title }}</h4>

</div>
<!--end page-title-box-->
