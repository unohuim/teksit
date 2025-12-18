<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Fix It Now session booked.</p>
    <ul>
        <li><strong>Name:</strong> {{ $serviceRequest->name }}</li>
        <li><strong>Email:</strong> {{ $serviceRequest->email }}</li>
        @if($serviceRequest->phone)
            <li><strong>Phone:</strong> {{ $serviceRequest->phone }}</li>
        @endif
        @if($serviceRequest->scheduled_at)
            <li><strong>Scheduled:</strong> {{ $serviceRequest->scheduled_at->timezone(config('app.timezone'))->format('l, F j, Y g:i A T') }}</li>
        @endif
        @if($serviceRequest->calendly_event_uuid)
            <li><strong>Event UUID:</strong> {{ $serviceRequest->calendly_event_uuid }}</li>
        @endif
    </ul>
</body>
</html>
