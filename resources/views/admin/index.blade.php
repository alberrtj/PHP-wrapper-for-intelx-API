@php use Illuminate\Support\Str; @endphp
@extends ("layouts.admin.master")
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Search</h4>
    </div>
@stop
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card-box">
                <form method="get" action="{{URL::current()}}" id="elso_form">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Search</label>
                            <input name="search" id="search" class="form-control"
                                   placeholder="Enter a domain, URL, Email, IP, CIDR, Bitcoin address, and more..."
                                   value="{{Request::get('search')}}">
                        </div>
                        <div class="col-md-2">
                            <label>From</label>
                            <input name="start" id="start" class="form-control date"
                                   value="{{Request::get('start')}}">
                        </div>
                        <div class="col-md-2">
                            <label>To</label>
                            <input name="end" id="end" class="form-control date"
                                   value="{{Request::get('end')}}">
                        </div>
                        <div class="col-md-2">
                            <label>Media Filter</label>
                            <select class="form-control " id="mediaFilter" name="mediaFilter">
                                <option value="0">None</option>
                                <option value="19">Picture</option>
                                <!--<option value="14">URL</option>-->
                                <option value="15">PDF File</option>
                                <option value="16">Word File</option>
                                <option value="1">Paste Document</option>
                                <!--<option value="6">Forum Post</option>-->
                                <option value="8">Website Screenshot</option>
                                <option value="9">Website</option>
                                <option value="17">Excel File</option>
                                <option value="18">Powerpoint File</option>
                                <option value="20">Audio</option>
                                <option value="21">Video</option>
                                <option value="22">ZIP File</option>
                                <option value="23">HTML File</option>
                                <option value="24">Text File</option>
                                <option value="25">Ebook</option>
                                <option value="27">Database</option>
                                <option value="28">Email</option>
                                <!--<option value="29">Index File</option>-->
                                <option value="30">Domain</option>
                                <option value="32">CSV File</option>
                            </select>
                        </div>
                        <div class="col-md-2 marg-30">
                            <button type="submit" class="button-next btn btn-info" name="type" value="intel"><i
                                        class="icon icon-file-stats"></i>
                                Search
                            </button>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Buckets</label>
                            <select name="targetservice[]" class="form-control square select" multiple>
                                <option value="">Select . . .</option>
                                @foreach($buckets as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Public Web</label>
                            <select name="targetservice[]" class="form-control square select" multiple>
                                <option value="">Select . . .</option>
                                @foreach($PublicWeb as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
                <div class="responsive-table-plugin">
                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>index</th>
                                    <th>title</th>
                                    <th>download</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    if(Request::get('page')) $page = Request::get('page');
                                    else $page = 1;
                                    $index = (($page - 1) * 20) + 1;
                                @endphp
                                @foreach($data as $key=>$item)
                                    <tr>
                                        <td class="align-middle">
                                            {{$index}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item['name']}}
                                            <br>
                                            {{$item['added']}}
                                        </td>
                                        <td class="align-middle">
                                            @php
                                                $expl = explode(' [',$item['name']);
                                                $name = Str::replace('/','-',@$expl[0]);
                                                $name = Str::replace(' ','-',$name);
                                                $name = Str::replace('%','-',$name);
                                                $name = Str::replace('}','-',$name);
                                                $name = Str::replace('{','-',$name);
                                                $name = Str::replace('&','-',$name);
                                                $name = Str::replace('?','-',$name);
                                            @endphp
                                            <a target="_blank"
                                               href="{{route('admin.read',[@$item['storageid'],@$item['systemid'],@$name,@$item['bucket']])}}">
                                                Download File
                                            </a>
                                        </td>

                                    </tr>
                                    @php $index++ @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->
                    </div> <!-- table-rep-plugin-->
                </div>
                @if(!Request::get('page') and count($data) < 20 )

                @else
                    @if(Request::get('search'))
                        <center>
                            <nav>
                                <ul class="pagination">

                                    @php
                                        if(Request::get('page') > 10)
                                            $start = Request::get('page') - 1;
                                        else
                                            $start = 1;

                                        if(Request::get('page') > 10)
                                            $limit = (Request::get('page') - 1) + 10;
                                        else
                                            $limit = 10;
                                    @endphp

                                    <li class="page-item">
                                        <a class="page-link"
                                           href="{{route('admin.dashboard')}}?search={{Request::get('search')}}&page={{$start - 1}}"
                                           rel="prev" aria-label="« Previous">‹</a>
                                    </li>

                                    @for($i = $start; $i <= $limit; $i++)
                                        @if($page == $i)
                                            <li class="page-item active" aria-current="page"><span
                                                        class="page-link">{{$i}}</span></li>

                                            @if($i == $limit and count($data) == 20)
                                                @php
                                                    $start = $start + 10;
                                                    $limit = $limit + 10;
                                                @endphp
                                            @endif

                                        @else
                                            <li class="page-item">
                                                <a class="page-link"
                                                   href="{{route('admin.dashboard')}}?search={{Request::get('search')}}&page={{$i}}">{{$i}}</a>
                                            </li>
                                        @endif
                                    @endfor

                                </ul>
                            </nav>

                        </center>
                    @endif
                @endif
            </div><!-- end card-box-->
        </div> <!-- end col -->


    </div>
    <!-- end row -->

@stop
@section('css')
    <link rel="stylesheet" href="{{asset('assets/admin/libs/select2/select2.min.css')}}"/>
    <link href="{{ asset('assets/admin/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- Responsive Table css -->
    <link href="{{asset('assets/admin/libs/rwd-table/rwd-table.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <style>
        .marg-30 {
            margin-top: 30px;
        }

        .focus-btn-group {
            display: none;
        }

        .dropdown-btn-group {
            display: none;
        }

        .amn-text {
            color: #65184c;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .icon-dash {
            font-size: 55px;
            color: white;
        }
    </style>
@stop


@section('js')

    <script type="text/javascript" src="{{ url('assets/admin/js/select2.min.js') }}"></script>
    <!-- Responsive Table js -->
    <script src="{{asset('assets/admin/libs/rwd-table/rwd-table.min.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('assets/admin/js/pages/responsive-table.init.js')}}"></script>

    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select').select2();

            $(".date").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                isRTL: true
            });
        });
    </script>
@stop
