<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact Moderne</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #7579e7;
            --bg-color: #f0f2f5;
            --text-color: #2c3e50;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --success-color: #2ecc71;
            --error-color: #e74c3c;
        }

        .dark-mode {
            --bg-color: #1a1a1a;
            --text-color: #ffffff;
            --shadow-color: rgba(255, 255, 255, 0.1);
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--bg-color);
            position: relative;
            overflow: hidden;
        }

        /* Animation de fond */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.5;
        }

        .background-animation span {
            position: absolute;
            pointer-events: none;
            background: var(--primary-color);
            animation: move 8s linear infinite;
            opacity: 0.1;
            border-radius: 50%;
        }

        @keyframes move {
            0% {
                transform: translateY(100vh) scale(0);
            }
            100% {
                transform: translateY(-100vh) scale(1);
            }
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            margin: 1rem;
            background: var(--bg-color);
            border-radius: 20px;
            box-shadow: 
                20px 20px 60px var(--shadow-color),
                -20px -20px 60px rgba(255, 255, 255, 0.5);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-color);
            transition: transform 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        h2 {
            color: var(--text-color);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid transparent;
            border-radius: 10px;
            background: var(--bg-color);
            box-shadow: 
                inset 5px 5px 10px var(--shadow-color),
                inset -5px -5px 10px rgba(255, 255, 255, 0.5);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 
                inset 2px 2px 5px var(--shadow-color),
                inset -2px -2px 5px rgba(255, 255, 255, 0.5);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: none;
        }

        button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background: var(--primary-color);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        button:hover::before {
            width: 300px;
            height: 300px;
        }

        button:active {
            transform: scale(0.98);
        }

        .success-message {
            display: none;
            text-align: center;
            color: var(--success-color);
            margin-top: 1rem;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .container {
                margin: 1rem;
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">🌓</button>
    
    <div class="background-animation">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="container">
        <h2>Contactez-nous</h2>
        <form id="contactForm" onsubmit="return handleSubmit(event)">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" required>
                <div class="error-message">Veuillez entrer votre nom</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" required>
                <div class="error-message">Veuillez entrer un email valide</div>
            </div>

            <div class="form-group">
                <label for="subject">Sujet</label>
                <input type="text" id="subject" required>
                <div class="error-message">Veuillez entrer un sujet</div>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" required></textarea>
                <div class="error-message">Veuillez entrer votre message</div>
            </div>

            <button type="submit">Envoyer</button>
        </form>
        <div class="success-message">Message envoyé avec succès!</div>
    </div>

    <script>
        // Création des bulles d'animation en arrière-plan
        const backgroundAnimation = document.querySelector('.background-animation');
        for (let i = 0; i < 5; i++) {
            const span = document.createElement('span');
            span.style.width = Math.random() * 100 + 50 + 'px';
            span.style.height = span.style.width;
            span.style.left = Math.random() * 100 + '%';
            span.style.animationDelay = Math.random() * 5 + 's';
            backgroundAnimation.appendChild(span);
        }

        // Gestion du thème sombre/clair
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const themeToggle = document.querySelector('.theme-toggle');
            themeToggle.textContent = document.body.classList.contains('dark-mode') ? '☀️' : '🌓';
        }

        // Validation du formulaire
        function handleSubmit(event) {
            event.preventDefault();
            
            const form = event.target;
            const formElements = form.elements;
            let isValid = true;

            // Validation de chaque champ
            for (let element of formElements) {
                if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
                    const errorMessage = element.parentElement.querySelector('.error-message');
                    
                    if (!element.value.trim()) {
                        isValid = false;
                        element.style.borderColor = 'var(--error-color)';
                        errorMessage.style.display = 'block';
                    } else {
                        element.style.borderColor = 'transparent';
                        errorMessage.style.display = 'none';
                    }

                    // Validation spécifique pour l'email
                    if (element.type === 'email') {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(element.value)) {
                            isValid = false;
                            element.style.borderColor = 'var(--error-color)';
                            errorMessage.style.display = 'block';
                        }
                    }
                }
            }

            if (isValid) {
                // Simulation d'envoi du formulaire
                const successMessage = document.querySelector('.success-message');
                const button = form.querySelector('button');
                
                button.disabled = true;
                button.textContent = 'Envoi en cours...';

                setTimeout(() => {
                    form.reset();
                    successMessage.style.display = 'block';
                    button.disabled = false;
                    button.textContent = 'Envoyer';

                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 3000);
                }, 1500);
            }

            return false;
        }

        // Animation des champs lors de la saisie
        const inputs = document.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.querySelector('label').style.color = 'var(--primary-color)';
            });

            input.addEventListener('blur', () => {
                input.parentElement.querySelector('label').style.color = 'var(--text-color)';
            });
        });
    </script>
</body>
</html>