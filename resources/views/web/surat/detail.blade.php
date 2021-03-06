@extends('layouts.horizontal-master')

@section('title', 'Proyek Monitoring')
@section('headerStyle')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                @component('common-components.breadcrumb')
                    @slot('title')
                        Surat
                    @endslot
                    @slot('item1')
                        Home
                    @endslot
                    {{-- @slot('item2')  @endslot --}}
                @endcomponent

            </div>
            <!--end col-->
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row">
            <div class="col-lg-12">
                <div class="card" x-data="{ open: false, canUpload: false }">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">{{ request()->get('arsip') ? 'Arsip' : 'Surat' }}</h4>
                        {{-- <form action="{{route('proyek.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Judul
                                        Surat</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="text"
                                            value="{{ $data->judul }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nomor
                                        Surat</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="text"
                                            value="{{ $data->nomor }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Jenis
                                        Surat</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="text"
                                            value="{{ $data->jenis }}" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label text-right">Status</label>
                                    <div class="col-sm-10">
                                        {!! transformSuratStatus($data->status) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Tanggal
                                        Surat</label>
                                    <div class="col-sm-10">
                                        <input disabled class="form-control disabled" type="date"
                                            value="{{ $data->tanggal }}" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="timeline" class="col-sm-2 col-form-label text-right">File Surat</label>
                                    <div class="col-sm-10">
                                        <a href="{{ $data->file_url }}"
                                            class="btn btn-primary waves-effect waves-light shadow-none">Lihat File
                                            Surat</a>
                                    </div>
                                </div>
                                @if (!$data->is_archive)
                                    <form method="post" enctype="multipart/form-data"
                                        action="{{ route('surat.update-status', ['surat' => $data->id]) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="example-text-input"
                                                class="col-sm-2 col-form-label text-right">Remarks</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="remarks" type="text" id="example-text-input"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row" x-show="open" x-transition>
                                            <label for="timeline" class="col-sm-2 col-form-label text-right">Upload
                                                Surat</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file_url_keluar">

                                            </div>
                                        </div>
                                        <div class="form-group row" x-show="open" x-transition>
                                            <label for="example-text-input"
                                                class="col-sm-2 col-form-label text-right">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea x-on:change="canUpload = true" class="form-control" name="deskripsi_file_keluar" type="text"
                                                    id="example-text-input"></textarea>
                                            </div>
                                        </div>
                                        @if (auth()->user()->role >= $data->status)
                                            @if ($data->file_url_keluar)
                                                <div class="form-group row">
                                                    <label for="timeline" class="col-sm-2 col-form-label text-right">File
                                                        Surat</label>
                                                    <div class="col-sm-10">
                                                        <a href="{{ $data->file_url_keluar }}"
                                                            class="btn btn-primary waves-effect waves-light shadow-none">Lihat
                                                            File
                                                            Surat Keluar</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input"
                                                        class="col-sm-2 col-form-label text-right">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <p class="form-control" name="remarks" type="text"
                                                            id="example-text-input">{{ $data->deskripsi_file_keluar }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                            </div>
                        </div>
                        <div class="float-right">
                            @if (auth()->user()->role >= 2)
                                @if (!$data->file_url_keluar)
                                    <input :type="canUpload ? 'submit' : 'button'" name="type" x-on:click="open = true"
                                        value="Upload File"
                                        class="btn btn-primary waves-effect waves-light shadow-none"><i
                                        data-feather="arrow-right" data-size="10"
                                        class="align-self-center icon-sm  ml-1"></i>
                                @endif
                            @endif
                            <input type="submit" name="type" value="Tambah Remark"
                                class="btn btn-success waves-effect waves-light shadow-none"> <i
                                data-feather="message-square" data-size="10" class="align-self-center icon-sm  ml-1"></i>
                            @canany(['isTU'])
                                <input type="submit" name="type" value="Archive"
                                    class="btn btn-purple waves-effect waves-light shadow-none"> <i
                                    data-feather="message-square" data-size="10" class="align-self-center icon-sm  ml-1"></i>
                            @endcanany
                            @if (auth()->user()->role >= $data->status)
                                @if (auth()->user()->role != 5)
                                    <input type="submit" name="type" value="Remark & Disposisi"
                                        class="btn btn-danger waves-effect waves-light shadow-none"><i
                                        data-feather="arrow-right" data-size="10"
                                        class="align-self-center icon-sm  ml-1"></i>
                                @endif
                            @endif
                        </div>
                        </form>
                        @endif
                        <br>
                        <hr>
                        <table class="table table-bordered mb-0 table-centered">
                            <thead>
                                <tr>
                                    <th>Remarks</th>
                                    <th>Date</th>
                                    <th>By</th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->remarks as $remarks)
                                    <tr>
                                        <td>{{ $remarks->remarks }}</td>
                                        <td>{{ $remarks->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $remarks->user->name }}</td>
                                        {{-- <td>{{ $remarks->status }}<span class="badge badge-soft-success">Approved</span> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!--end card-body-->
                    {{-- </form> --}}
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div><!-- container -->
@stop
@section('footerScript')
    <!-- Required datatable js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/pages/jquery.datatable.init.js') }}"></script>
@stop
