<!-- 1: View Level Styles HOOK -->
@stack('styles')

<!-- 2: View Errors Feedback -->
@if( isset($errors) && $errors->any() )
    <div class="errors-feedback">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- END View Errors Feedback -->

<!-- 3: View Success Feedback -->
@if( session()->has('success') )
    <div class="success-feedback">
        <ul>
            @foreach( session()->get('success') as $message )
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- END View Success Feedback -->


<!-- 4: View Level Scripts HOOK-->
@stack('scripts')
