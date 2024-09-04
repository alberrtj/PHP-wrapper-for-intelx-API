<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "10000",
    };
</script>


@if(isset($errors))
    @if($errors->any() || Session::has('error'))
        @if(Session::has('error'))
            <script async>
                var msg = " {!!Session::get('error')!!}";
                Command: toastr["error"](msg, "Error")
                @php Session::forget('error') @endphp
            </script>
        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error )
                <script async>
                    var msg = "{!! $error !!}";
                    Command: toastr["error"](msg, "Error")
                </script>
            @endforeach
        @endif
    @endif
@endif

@if(Session::has('success'))
    <script async>
        var msg = "{!!Session::get('success')!!}";
        Command: toastr["success"](msg, "Success")
    </script>
@endif

@if(Session::has('errorKey'))
    <script async>
        var msg = "{!!Session::get('errorKey')[0]!!}";
        Command: toastr["error"](msg, "Error")
            <?php Session::forget('errorKey'); ?>
    </script>
@endif

@if(Session::has('info'))
    <script async>
        var msg = "{!!Session::get('info')!!}";
        Command: toastr["info"](msg)
        <?php Session::forget('info'); ?>
    </script>
@endif

