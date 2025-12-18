<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Hi {{ $firstName }},</p>
    <p>Your Fix It Now session is booked.</p>
    @if($serviceRequest->scheduled_at)
        <p><strong>When:</strong> {{ $serviceRequest->scheduled_at->timezone(config('app.timezone'))->format('l, F j, Y g:i A T') }}</p>
    @endif
    <p>We’ll meet at your scheduled time and focus on the issue you described.</p>
    <p>Pricing will be confirmed next based on urgency.</p>
    <p>— HappyTek<br>Easily Solved.</p>
</body>
</html>
