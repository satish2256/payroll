@if(session()->has('success_message'))
    <section class="content-heder fmessage">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h4><i class="icon fa fa-check"></i>Alert</h4>
            {!! session()->get('success_message') !!}
        </div>
    </section>
@endif
@if(session()->has('error_message'))
    <section class="content-heder fmessage">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h4><i class="icon fa fa-check"></i>Alert</h4>
            {!! session()->get('error_message') !!}
        </div>
    </section>
@endif