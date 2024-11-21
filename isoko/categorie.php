<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue de Produits</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f5f5;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .product-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2ecc71;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .pagination button {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            background: #2ecc71;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .pagination button:hover {
            background: #27ae60;
            transform: scale(1.05);
        }

        .pagination button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .page-info {
            text-align: center;
            margin-top: 1rem;
            color: #666;
            font-size: 0.9rem;
        }
       

        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
</div>
    <div class="container">
        <div class="products-grid" id="productsGrid"></div>
        <div class="pagination">
            <button id="prevBtn" onclick="previousPage()">Précédent</button>
            <button id="nextBtn" onclick="nextPage()">Suivant</button>
        </div>
        <div class="page-info" id="pageInfo"></div>
    </div>

    <script>
        const products = [
            // Génération de 96 produits
            ...Array(96).fill().map((_, index) => ({
                id: index + 1,
                name: `Produit ${index + 1}`,
                description: `Description détaillée du produit ${index + 1}. Caractéristiques et avantages principaux.`,
                price: (Math.random() * 100 + 10).toFixed(2),
                image: `https://picsum.photos/400/300?random=${index + 1}`
            }))
        ];

        const productsPerPage = 8;
        let currentPage = 1;
        const totalPages = Math.ceil(products.length / productsPerPage);

        function displayProducts(page) {
            const start = (page - 1) * productsPerPage;
            const end = start + productsPerPage;
            const productsToDisplay = products.slice(start, end);

            const grid = document.getElementById('productsGrid');
            grid.innerHTML = '';

            productsToDisplay.forEach(product => {
                const productCard = `
                    <div class="product-card">
                        <img src="${product.image}" alt="${product.name}" class="product-image">
                        <h3 class="product-name">${product.name}</h3>
                        <p class="product-description">${product.description}</p>
                        <div class="product-price">${product.price} €</div>
                    </div>
                `;
                grid.innerHTML += productCard;
            });

            updatePaginationButtons();
            updatePageInfo();
        }

        function updatePaginationButtons() {
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === totalPages;
        }

        function updatePageInfo() {
            const pageInfo = document.getElementById('pageInfo');
            pageInfo.textContent = `Page ${currentPage} sur ${totalPages}`;
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                displayProducts(currentPage);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                displayProducts(currentPage);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        // Animation au chargement des produits
        function animateProducts() {
            const products = document.querySelectorAll('.product-card');
            products.forEach((product, index) => {
                product.style.opacity = '0';
                product.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    product.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    product.style.opacity = '1';
                    product.style.transform = 'translateY(0)';
                }, index * 100);
            });
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            displayProducts(currentPage);
            animateProducts();
        });

        // Observer pour les animations lors du changement de page
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'childList') {
                    animateProducts();
                }
            });
        });

        observer.observe(document.getElementById('productsGrid'), {
            childList: true
        });
    </script>
</body>
</html>