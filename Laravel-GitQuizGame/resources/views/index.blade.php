<x-layout>
    <!-- Page-specific content -->
    <div class="container mx-auto p-6">
        <div class="loading mb-4" style="display: none;">
            <!-- Add Tailwind CSS classes for loading animation if needed -->
        </div>
        <div class="content bg-white p-6 rounded-lg shadow-lg" style="display: none;">
            <h1 class="text-3xl font-bold mb-4">Git Command Test</h1>
            <p id="question" class="mb-4"></p>
            <input
                type="text"
                id="user-answer"
                placeholder="Enter your answer"
                class="border border-gray-300 rounded-lg p-3 w-full mb-4 focus:outline-none focus:ring-2 focus:ring-laravel transition duration-300"
            />
            <div class="flex gap-4 mb-4">
                <button
                    id="help-btn"
                    class="bg-gray-500 text-white rounded-lg py-2 px-4 hover:bg-gray-700 transition duration-300"
                >
                    Help
                </button>
                <button
                    id="hint-btn"
                    class="bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-700 transition duration-300"
                >
                    Hint
                </button>
                <button
                    id="submit-btn"
                    class="bg-laravel text-white rounded-lg py-2 px-4 hover:bg-red-700 transition duration-300"
                >
                    Submit
                </button>
                <button
                    id="prev-btn"
                    class="bg-green-500 text-white rounded-lg py-2 px-4 hover:bg-green-700 transition duration-300"
                >
                    Previous
                </button>
                <button
                    id="next-btn"
                    class="bg-yellow-500 text-white rounded-lg py-2 px-4 hover:bg-yellow-700 transition duration-300"
                >
                    Next
                </button>
            </div>
            <p id="message" class="text-red-500"></p>
        </div>
    </div>

    @push('styles')
        <!-- No additional styles needed if using Tailwind CSS -->
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/quizScript.js') }}"></script>
    @endpush
</x-layout>
