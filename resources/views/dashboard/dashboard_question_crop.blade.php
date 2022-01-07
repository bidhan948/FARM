@extends('layouts.main')
@section('title', $crop->name . 'को प्रश्नहरु')
@section('main_content')
    <style>
        .card-body {
            overflow-x: scroll !important;
        }

        :root {
            --main-color: #fff;
            --main-bg-color: #d34b93;
        }

        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
        }

        #accordion .panel {
            border: none;
            border-radius: 0;
            box-shadow: none;
            margin: 0 30px -5px 30px;
            position: relative;
        }

        #accordion .panel-heading {
            padding: 0;
            border: none;
            border-radius: 0;
        }

        #accordion .panel-title a {
            display: block;
            padding: 15px 20px 15px 60px;
            margin: 0;
            background: #676666;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--main-color);
            border: 1px solid #000;
            border-radius: 0;
            position: relative;
        }

        #accordion .panel-title a:before,
        #accordion .panel-title a.collapsed:before {
            content: "\f0de";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            width: 30px;
            height: 30px;
            line-height: 40px;
            background: var(--main-bg-color);
            border-radius: 5px;
            border: 1px solid #000;
            text-align: center;
            font-size: 20px;
            color: var(--main-color);
            position: absolute;
            top: 10px;
            left: -20px;
            transition: all 0.3s ease 0s;
        }

        #accordion .panel-title a.collapsed:before {
            content: "\f0dd";
            line-height: 25px;
        }

        #accordion .panel-body {
            padding: 20px;
            margin: 0 30px;
            background: var(--main-bg-color);
            border-top: none;
            border-left: 2px dashed #000;
            border-right: 2px dashed #000;
            font-size: 15px;
            color: var(--main-color);
            line-height: 28px;
            letter-spacing: 1px;
        }

        #accordion .panel:last-child .panel-body {
            border-bottom: 2px dashed #000;
        }

        @media only screen and (max-width:479px) {
            #accordion .panel-body {
                font-size: 14px;
                line-height: 22px;
                margin: 0 10px;
            }
        }

    </style>
    <div class="card mt-4 text-sm p-3 text-left">
        <div class="row mt-4">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 my-2">
                            @foreach ($questions as $key => $question)
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseOne{{$key+1}}" aria-expanded="true" aria-controls="collapseOne">
                                                    {{$question->question}}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne{{$key+1}}" class="panel-collapse collapse in" role="tabpanel"
                                            aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                {!! $question->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
