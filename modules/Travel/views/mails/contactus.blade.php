<div>
    <strong>Message received from <a href="{{ url('/') }}">{{ $application->site->title }}</a></strong>
    <br>
    <div>
        <p><strong>Name: </strong> {{ $details['fullname'] }}</p>
        <p><strong>Email: </strong> {{ $details['email'] }}</p>
        <p><strong>Mobile number: </strong> {{ $details['mobile_number'] }}</p>
        <p><strong>Message: </strong> <br>
            {!! nl2br($details['message']) !!}</p>
    </div>
</div>
