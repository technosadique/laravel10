<form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    @csrf
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            placeholder="Email"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
    </div>

    <div class="mb-6">
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input
            id="password"
            name="password"
            type="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
    </div>

    <button
        type="submit"
        class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded hover:bg-indigo-700 transition duration-200"
    >
        Login
    </button>
</form>

