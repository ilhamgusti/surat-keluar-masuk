@extends('layouts.horizontal-master')

@section('title', 'Proyek Monitoring')
@section('headerStyle')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('sidebarPortion')
    <li class="leftbar-menu-item">
        <a href="javascript: void(0);">
            <i data-feather="monitor" class="align-self-center vertical-menu-icon icon-dual-vertical"></i>
            <span>Dashboard</span>
        </a>
    </li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                @component('common-components.breadcrumb')
                    @slot('title') Create Proyek @endslot
                    @slot('item1') Home @endslot
                    {{-- @slot('item2')  @endslot --}}
                @endcomponent

            </div>
            <!--end col-->
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Proyek</h4>

                        <form action="{{ route('proyek.update', ['proyek' => $data->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama
                                            Proyek</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="nama_proyek" type="text"
                                                value="{{-- $data->nama_proyek --}}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-2 col-form-label text-right">Tanggal
                                            Pengerjaan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tanggal_pengerjaan" type="date"
                                                value="{{-- $data->tanggal_pengerjaan --}}" id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="estimasi" class="col-sm-2 col-form-label text-right">Estimasi</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <input id="estimasi" type="number" name="estimasi"
                                                    value="{{-- $data->estimasi --}}" class="form-control"
                                                    placeholder="Estimasi hari" aria-label="Estimasi...">
                                                <span class="input-group-append">
                                                    <button disabled
                                                        class=" disabled btn btn-sm btn-secondary pointer-event-none shadow-none"
                                                        type="button">Hari</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row d-none">
                                        <label for="example-password-input"
                                            class="col-sm-2 col-form-label text-right">Status</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="hunter2"
                                                id="example-password-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="timeline" class="col-sm-2 col-form-label text-right">File
                                            Timesheet</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file"><input class="custom-file-input" type="file"
                                                    value="{{-- $data->file_url --}}" name="file_url" id="timeline"><label
                                                    class="custom-file-label shadow-none border-none">{{-- $data->file_url --}}
                                                    Choose File</label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light shadow-none">Save</button>
                                <button class="btn btn-error waves-effect waves-light shadow-none">Cancel</button>
                            </div>
                    </div>
                    <!--end card-body-->
                    </form>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Vendor</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Text</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="Artisanal kale"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="bootstrap@example.com"
                                            id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input"
                                        class="col-sm-2 col-form-label text-right">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="1-(555)-555-5555"
                                            id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input"
                                        class="col-sm-2 col-form-label text-right">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" value="hunter2"
                                            id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input"
                                        class="col-sm-2 col-form-label text-right">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input"
                                        class="col-sm-2 col-form-label text-right">Date and time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                            id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input"
                                        class="col-sm-2 col-form-label text-right">Color</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="color" value="#125eff" id="example-color-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Select</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>Large select</option>
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Custom Select</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-lg"
                                        class="col-sm-2 col-form-label text-right">Large</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder=".form-control-lg" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-sm"
                                        class="col-sm-2 col-form-label text-right">Small</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder=".form-control-sm" id="example-text-input-sm">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input"
                                        class="col-sm-2 col-form-label text-right">Search</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="search" value="How do I shoot web"
                                            id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" value="https://getbootstrap.com"
                                            id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-right">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="2011-08-19"
                                            id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input"
                                        class="col-sm-2 col-form-label text-right">Month</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="month" value="2011-08"
                                            id="example-month-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-right">Week</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-2 col-form-label text-right">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="inputHorizontalSuccess"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-success"
                                            id="inputHorizontalSuccess" placeholder="name@example.com">
                                        <div class="form-control-feedback">Success! You've done it.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-warning">
                                    <label for="inputHorizontalWarning"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-warning"
                                            id="inputHorizontalWarning" placeholder="name@example.com">
                                        <div class="form-control-feedback">Shucks, check the formatting of that and try
                                            again.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-error">
                                    <label for="inputHorizontalDnger"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-danger"
                                            id="inputHorizontalDnger" placeholder="name@example.com">
                                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tahapan</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Text</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="Artisanal kale"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="bootstrap@example.com"
                                            id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input"
                                        class="col-sm-2 col-form-label text-right">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="1-(555)-555-5555"
                                            id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input"
                                        class="col-sm-2 col-form-label text-right">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" value="hunter2"
                                            id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input"
                                        class="col-sm-2 col-form-label text-right">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input"
                                        class="col-sm-2 col-form-label text-right">Date and time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                            id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input"
                                        class="col-sm-2 col-form-label text-right">Color</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="color" value="#125eff"
                                            id="example-color-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Select</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>Large select</option>
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Custom Select</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-lg"
                                        class="col-sm-2 col-form-label text-right">Large</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder=".form-control-lg" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-sm"
                                        class="col-sm-2 col-form-label text-right">Small</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder=".form-control-sm" id="example-text-input-sm">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input"
                                        class="col-sm-2 col-form-label text-right">Search</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="search" value="How do I shoot web"
                                            id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" value="https://getbootstrap.com"
                                            id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-right">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="2011-08-19"
                                            id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input"
                                        class="col-sm-2 col-form-label text-right">Month</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="month" value="2011-08"
                                            id="example-month-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-right">Week</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-2 col-form-label text-right">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="inputHorizontalSuccess"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-success"
                                            id="inputHorizontalSuccess" placeholder="name@example.com">
                                        <div class="form-control-feedback">Success! You've done it.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-warning">
                                    <label for="inputHorizontalWarning"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-warning"
                                            id="inputHorizontalWarning" placeholder="name@example.com">
                                        <div class="form-control-feedback">Shucks, check the formatting of that and try
                                            again.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-error">
                                    <label for="inputHorizontalDnger"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-danger"
                                            id="inputHorizontalDnger" placeholder="name@example.com">
                                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Vendor</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Text</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="Artisanal kale"
                                            id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="bootstrap@example.com"
                                            id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input"
                                        class="col-sm-2 col-form-label text-right">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="1-(555)-555-5555"
                                            id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input"
                                        class="col-sm-2 col-form-label text-right">Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" value="hunter2"
                                            id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input"
                                        class="col-sm-2 col-form-label text-right">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="42" id="example-number-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-datetime-local-input"
                                        class="col-sm-2 col-form-label text-right">Date and time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                            id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-color-input"
                                        class="col-sm-2 col-form-label text-right">Color</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="color" value="#125eff"
                                            id="example-color-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Select</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>Large select</option>
                                            <option>Small select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Custom Select</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select">
                                            <option selected="">Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-lg"
                                        class="col-sm-2 col-form-label text-right">Large</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder=".form-control-lg" id="example-text-input-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-sm"
                                        class="col-sm-2 col-form-label text-right">Small</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder=".form-control-sm" id="example-text-input-sm">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input"
                                        class="col-sm-2 col-form-label text-right">Search</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="search" value="How do I shoot web"
                                            id="example-search-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label text-right">URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" value="https://getbootstrap.com"
                                            id="example-url-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-2 col-form-label text-right">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="2011-08-19"
                                            id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input"
                                        class="col-sm-2 col-form-label text-right">Month</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="month" value="2011-08"
                                            id="example-month-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-week-input" class="col-sm-2 col-form-label text-right">Week</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-time-input" class="col-sm-2 col-form-label text-right">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="inputHorizontalSuccess"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-success"
                                            id="inputHorizontalSuccess" placeholder="name@example.com">
                                        <div class="form-control-feedback">Success! You've done it.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-warning">
                                    <label for="inputHorizontalWarning"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-warning"
                                            id="inputHorizontalWarning" placeholder="name@example.com">
                                        <div class="form-control-feedback">Shucks, check the formatting of that and try
                                            again.</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                                <div class="form-group row has-error">
                                    <label for="inputHorizontalDnger"
                                        class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control form-control-danger"
                                            id="inputHorizontalDnger" placeholder="name@example.com">
                                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                                        <small class="form-text text-muted">Example help text that remains
                                            unchanged.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
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
