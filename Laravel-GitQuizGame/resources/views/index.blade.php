<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Command Test</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index-style.css') }}">
</head>
<body>
    <div class="score-container">
        <span id="score">Score: 0</span>
    </div>
    <div class="container">
        <div class="loading"></div>
        <div class="content">
            <h1>Git Command Test</h1>
            <p id="question"></p>
            <input type="text" id="user-answer" placeholder="Enter your answer">
            <div class="buttons">
                <button id="submit-btn">Submit</button>
                <button id="help-btn">Help</button>
                <button id="hint-btn">Hint</button>
                <button id="prev-btn">Previous</button>
                <button id="next-btn">Next</button>
            </div>
            <p id="message"></p>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
