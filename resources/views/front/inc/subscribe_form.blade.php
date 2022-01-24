<div class="newsletter-widget text-center align-self-center">
    <h3>Subscribe Today!</h3>
    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
    @include('inc.messages')
    <form class="form-inline" method="post" action="{{ route('subscriber.store') }}">
        @csrf
        <input type="text" name="email" placeholder="Add your email here.." required class="form-control">
        <input type="submit" value="Subscribe" class="btn btn-default btn-block">
    </form>
</div>
@include('vendor.sweetalert.alert')
