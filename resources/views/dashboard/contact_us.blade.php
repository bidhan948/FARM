@extends('layouts.main')
@section('title', 'सम्पर्क')
@section('menu_ope', 'menu-open')
@section('s_child_dashboard', 'block')
@section('dashboard_contact_us', 'active')
@section('main_content')

<div class="card text-sm ">
    <div class="card-header my-2">
        <div class="row my-1">
            <div class="col-md-6" style="margin-bottom:-5px;">
                <p class="">{{ __('सम्पर्कको सुचिहरु') }}</p>
            </div>
            <div class="
                    col-md-6 text-right">
                <a class="btn text-white btn-sm btn-primary" data-toggle="modal" data-target="#modal-lg">
                    {{ __('सम्पर्क थप्नुहोस') }}</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">{{ __('क्र.स.') }}</th>
                    <th class="text-center">{{ __('सम्पर्क') }}</th>
                    <th class="text-center">{{ __('लागु ?') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact_uses as $key => $contact_us)
                    <tr>
                        <td class="text-center">{{ Nepali($key + 1) }}</td>
                        <td class="text-center text-sm">{!! $contact_us->contact_us !!}
                        </td>
                        <td class="text-center">
                            @if ($contact_us->is_active)
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            @else
                                <i class="fas fa-times fa-2x text-danger"></i>
                            @endif
                        </td>
                        <td class="text-center"><a class="btn-sm btn-success text-white" data-toggle="modal"
                                data-target="#modal-lg{{ $key + 1 }}" style="cursor: pointer;"><i
                                    class="fas fa-edit px-1"></i> {{ __('सच्याउने') }}</a>

                            {{-- modal for adding contact_us status --}}
                            <div class="modal fade text-sm" id="modal-lg{{ $key + 1 }}">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="">{{ __('सम्पर्क सच्याउनुहोस् ') }}</h5>
                                            <button type=" button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('contact-us.update',$contact_us) }}">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 my-2">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    {{ __('सम्पर्क') }} <span
                                                                        class="text-danger px-1 font-weight-bold">*</span>
                                                                </span>
                                                            </div>
                                                            <textarea name="contact_us" id="editor{{$key+1}}"
                                                                class="form-control">{!! $contact_us->contact_us !!}</textarea>
                                                            @error('contact_us')
                                                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                    {{ __('सम्पर्कको फिल्ड खाली छ ') }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6 my-2">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    {{ __('Is active') }} <span
                                                                        class="text-danger px-1 font-weight-bold">*</span>
                                                                </span>
                                                            </div>
                                                            <select name="is_active"
                                                                class="form-control form-control-sm">
                                                                <option value="0" {{$contact_us->is_active ? "" : "selected"}}>{{ 'होइन' }}</option>
                                                                <option value="1" {{$contact_us->is_active ? "selected" : ""}}>{{ 'हो' }}</option>
                                                            </select>
                                                            @error('is_active')
                                                                <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                                                    {{ __('Is active फिल्ड खाली छ ') }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">पेश
                                                            गर्नुहोस्</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- end of modal for adding contact_us status --}}
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>

{{-- modal for adding contact_us status --}}
<div class="modal fade text-sm" id="modal-lg">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">{{ __('सम्पर्क थप्नुहोस') }}</h5>
                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('contact-us.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('सम्पर्क') }} <span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <textarea name="contact_us" id="editor" class="form-control"></textarea>
                                @error('contact_us')
                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                        {{ __('सम्पर्कको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 my-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        {{ __('Is active') }} <span
                                            class="text-danger px-1 font-weight-bold">*</span>
                                    </span>
                                </div>
                                <select name="is_active" class="form-control form-control-sm">
                                    <option value="0">{{ 'होइन' }}</option>
                                    <option value="1">{{ 'हो' }}</option>
                                </select>
                                @error('contact_us')
                                    <p class="invalid-feedback mb-0" style="font-size: 0.9rem">
                                        {{ __('सम्पर्कको फिल्ड खाली छ ') }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">पेश
                                गर्नुहोस्</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- end of modal for adding contact_us status --}}
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        CKEDITOR.replace('editor5');
        CKEDITOR.replace('editor');
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        window.onload = function() {
            if ({{ $errors->any() }}) {
                $('#modal-lg').modal('show');
            }
        }
    </script>
@endsection
