<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Teacher</title>

    <!-- Link ke CSS custom -->
    <link rel="stylesheet" href="{{ asset('asset/css/register-teacher.css') }}">
</head>
<body style="margin:0; padding:0;">

    <div class="register-wrapper">
        <div class="login-card-glass animate-pop">
            <h2 class="text-center text-3xl font-bold mb-6 rainbow-text">
                🦕 Sign Up for Teacher
            </h2>

            <form method="POST" action="{{ url('register/teacher') }}" class="form-horizontal">
                @csrf

                <!-- row 1 -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname" class="form-label">First Name</label>
                        <input id="firstname" type="text" name="firstname" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input id="lastname" type="text" name="lastname" class="form-input" required>
                    </div>
                </div>

                <!-- row 2 -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input id="dob" type="date" name="dob" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="class" class="form-label">Class</label>
                        <input id="class" type="text" name="class" class="form-input" required>
                    </div>
                </div>

                <!-- row 3 -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="year" class="form-label">Year</label>
                        <input id="year" type="text" name="year" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea id="bio" name="bio" class="form-input"></textarea>
                    </div>
                </div>

                <hr class="divider">

                <!-- row 4 -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" type="text" name="username" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" class="form-input" required>
                    </div>
                </div>

                <!-- row 5 -->
                <div class="form-row">
                    <div class="form-group w-full">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" required>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="btn-custom w-full">🎉 Register</button>
                </div>
            </form>

            <!-- Link to login -->
            <p class="text-center mt-4 text-gray-800">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold hover:underline text-blue-600">
                    Log In
                </a>
            </p>

        </div>
    </div>

</body>
</html>
