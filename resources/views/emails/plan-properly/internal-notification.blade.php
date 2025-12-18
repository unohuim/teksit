<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Plan It Properly request received.</p>
    <ul>
        <li><strong>Name:</strong> {{ $serviceRequest->name }}</li>
        <li><strong>Email:</strong> {{ $serviceRequest->email }}</li>
        @if($serviceRequest->phone)
            <li><strong>Phone:</strong> {{ $serviceRequest->phone }}</li>
        @endif
        <li><strong>Audience:</strong> {{ $serviceRequest->audience_type }}</li>
        <li><strong>Service:</strong> {{ $serviceRequest->service_name }}</li>
    </ul>
</body>
</html>
