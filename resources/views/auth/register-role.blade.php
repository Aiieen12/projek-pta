<x-guest-layout>
    <div class="text-center">
        <h2 class="text-2xl font-bold mb-4">Choose your role</h2>
        <div class="space-x-4">
            <a href="{{ route('register.student') }}" class="btn-custom">Student</a>
            <a href="{{ route('register.teacher') }}" class="btn-custom">Teacher</a>
        </div>
    </div>
</x-guest-layout>