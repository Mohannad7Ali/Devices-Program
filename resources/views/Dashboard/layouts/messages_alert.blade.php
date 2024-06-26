
@if (session()->has('add'))
    <script>
        window.onload = function() {
            notify({
                msg: "تمت الإضافة بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notify({
                msg: "تم تعديل البيانات بنجاح",
                type: "success"
            });
        }
    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "تم الحذف بنجاح",
                type: "success"
            });
        }
    </script>
@endif

{{--  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  --}}
