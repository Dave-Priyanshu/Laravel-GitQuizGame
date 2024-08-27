<x-layout>
    <!-- Page-specific content -->
    <div class="container mx-auto p-4 bg-white shadow-md rounded-lg max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Help</h1>
        <div id="help-content" class="mb-4">
            <p id="help-question" class="text-lg font-semibold mb-2"></p>
            <p id="help-answer" class="text-md text-gray-700"></p>
        </div>
        <a href="/" class="text-blue-500 hover:underline">Go back to test</a>
    </div>

    
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const urlParams = new URLSearchParams(window.location.search);
                const index = parseInt(urlParams.get('index'), 10);

                fetch('/questions')
                    .then(response => response.json())
                    .then(data => {
                        if (index >= 0 && index < data.length) {
                            const question = data[index];
                            document.getElementById('help-question').textContent = `Question: ${question.question}`;
                            document.getElementById('help-answer').textContent = `Answer: ${question.answer}`;
                        } else {
                            document.getElementById('help-content').textContent = "Invalid question index.";
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching questions:', error);
                        document.getElementById('help-content').textContent = "Error loading help content.";
                    });
            });
        </script>
    
</x-layout>
