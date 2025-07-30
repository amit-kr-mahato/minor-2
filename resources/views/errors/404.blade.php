<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        :root {
            --bg-color: #f3f4f6;
            --text-color: #1f2937;
            --subtext-color: #4b5563;
            --button-bg: #2563eb;
            --button-hover: #1d4ed8;
        }

        body.dark {
            --bg-color: #111827;
            --text-color: #ffffff;
            --subtext-color: #9ca3af;
            --button-bg: #3b82f6;
            --button-hover: #2563eb;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            text-align: center;
            max-width: 600px;
            animation: fadeInUp 0.8s ease-out;
        }

        img {
            width: 250px;
            margin-bottom: 2rem;
            filter: invert(0%);
            transition: filter 0.3s;
        }

        body.dark img {
            filter: invert(100%);
        }

        h1 {
            font-size: 5rem;
            font-weight: 900;
            margin: 0;
        }

        p.main {
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        p.sub {
            margin-top: 0.5rem;
            color: var(--subtext-color);
        }

        a.button {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: var(--button-bg);
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        a.button:hover {
            background-color: var(--button-hover);
            transform: translateY(-2px);
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .toggle-theme {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--button-bg);
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .toggle-theme:hover {
            background: var(--button-hover);
        }
    </style>
</head>
<body>
    <button class="toggle-theme" onclick="toggleTheme()">🌗 Toggle Theme</button>

    <div class="container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBXbV_4oabZopGGVgwt052iSz9hsV1BHKYHw&s" alt="404 Illustration">
        <h1>404</h1>
        <p class="main">Oops! Page not found</p>
        <p class="sub">The page you’re looking for doesn’t exist or has been moved.</p>
        <a href="/" class="button">← Go Back Home</a>
    </div>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark');
        }
    </script>
</body>
</html>
