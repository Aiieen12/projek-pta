<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Role</title>
    <link rel="stylesheet" href="{{ asset('asset/css/register-role.css') }}">
</head>
<body>
    <div class="role-container">
        <h2 class="title">Choose Your Role</h2>
        <p class="subtitle">Please select your role to continue registration</p>

        <div class="role-buttons">
            <a href="{{ route('register.student') }}" class="role-card student">
                <i class="fas fa-user-graduate"></i>
                <span>Student</span>
            </a>

            <a href="{{ route('register.teacher') }}" class="role-card teacher">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Teacher</span>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
