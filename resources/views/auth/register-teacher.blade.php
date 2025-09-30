<x-guest-layout>
    {{-- 
    ================================================================
    BAHAGIAN VISUAL MATHVENTURE
    ================================================================
    Letakkan semua aset visual anda (CSS, banner, maskot, muzik) 
    dalam fail layout utama (`resources/views/layouts/guest.blade.php`) 
    supaya ia muncul di sini. 
    
    Pastikan kelas CSS seperti `login-card-glass` dan `btn-custom` 
    juga dimuatkan dalam fail CSS utama anda.
    ================================================================
    --}}

    <div class="login-card-glass"> <h2 class="text-center text-2xl font-bold text-white mb-4">Sign Up for Teacher</h2>

        <form method="POST" action="{{ url('register/teacher') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="firstname" class="block font-medium text-sm text-white">First Name</label>
                    <input id="firstname" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="firstname" :value="old('firstname')" required autofocus />
                    @error('firstname')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lastname" class="block font-medium text-sm text-white">Last Name</label>
                    <input id="lastname" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="lastname" :value="old('lastname')" required />
                    @error('lastname')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dob" class="block font-medium text-sm text-white">Birth of Date</label>
                    <input id="dob" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="date" name="dob" :value="old('dob')" required />
                    @error('dob')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="class" class="block font-medium text-sm text-white">Class</label>
                    <input id="class" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="class" :value="old('class')" required />
                    @error('class')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="year" class="block font-medium text-sm text-white">Year</label>
                    <input id="year" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="year" :value="old('year')" required placeholder="e.g., 2025" />
                    @error('year')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="bio" class="block font-medium text-sm text-white">Bio</label>
                    <textarea id="bio" name="bio" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr class="my-6 border-white/30">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="username" class="block font-medium text-sm text-white">Username</label>
                    <input id="username" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="text" name="username" :value="old('username')" required autocomplete="username" />
                    @error('username')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block font-medium text-sm text-white">Password</label>
                    <input id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="password_confirmation" class="block font-medium text-sm text-white">Confirm Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="w-full btn-custom">
                    Register
                </button>
            </div>

             <p class="text-center mt-4 text-white">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold hover:underline">
                    Log In
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>