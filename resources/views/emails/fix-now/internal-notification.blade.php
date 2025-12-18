<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>New Fix It Now request submitted.</p>
    <ul>
        <li><strong>Name:</strong> {{ $serviceRequest->name }}</li>
        <li><strong>Email:</strong> {{ $serviceRequest->email }}</li>
        <li><strong>Phone:</strong> {{ $serviceRequest->phone ?? 'N/A' }}</li>
        <li><strong>Service:</strong> {{ $serviceRequest->service_category }} — {{ $serviceRequest->service_name }}</li>
        <li><strong>Description:</strong> {{ $serviceRequest->description }}</li>
        <li><strong>Path:</strong> {{ $serviceRequest->path }}</li>
    </ul>
</body>
</html>
