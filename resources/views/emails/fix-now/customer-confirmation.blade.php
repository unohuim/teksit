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
    @if($serviceRequest->duration)
        <p><strong>Duration:</strong> {{ $serviceRequest->duration }} minutes</p>
    @endif
    <p>We’ll meet at your scheduled time and focus on the issue you described.</p>
    <p>If the issue turns out to be larger than expected, we’ll pause and recommend a scoped approach before continuing.</p>
    <p>— HappyTek<br>Easily Solved.</p>
</body>
</html>
