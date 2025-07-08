// Example JavaScript for consuming the Portfolio API with proper image handling

class PortfolioAPI {
    constructor(baseURL = '/api') {
        this.baseURL = baseURL;
    }

    // Get all portfolios
    async getPortfolios() {
        try {
            const response = await fetch(`${this.baseURL}/portfolios`);
            const data = await response.json();
            return data.data || data;
        } catch (error) {
            console.error('Error fetching portfolios:', error);
            return [];
        }
    }

    // Get single portfolio
    async getPortfolio(id) {
        try {
            const response = await fetch(`${this.baseURL}/portfolios/${id}`);
            const data = await response.json();
            return data.data || data;
        } catch (error) {
            console.error('Error fetching portfolio:', error);
            return null;
        }
    }

    // Display portfolios in HTML
    displayPortfolios(portfolios, containerId = 'portfolios-container') {
        const container = document.getElementById(containerId);
        if (!container) return;

        container.innerHTML = portfolios.map(portfolio => `
            <div class="portfolio-card">
                <div class="portfolio-image">
                    ${this.getImageHTML(portfolio)}
                </div>
                <div class="portfolio-content">
                    <h3>${portfolio.title}</h3>
                    <p>${portfolio.description || ''}</p>
                    ${portfolio.link ? `<a href="${portfolio.link}" target="_blank">View Project</a>` : ''}
                </div>
            </div>
        `).join('');
    }

    // Generate proper image HTML
    getImageHTML(portfolio) {
        if (portfolio.image) {
            return `<img src="${portfolio.image}" alt="${portfolio.title}" class="portfolio-img">`;
        } else {
            return `<div class="no-image">No Image Available</div>`;
        }
    }

    // Check if image exists and is valid
    isValidImage(imageUrl) {
        return imageUrl && imageUrl !== 'null' && imageUrl !== 'undefined';
    }

    // Preload images for better performance
    preloadImages(portfolios) {
        portfolios.forEach(portfolio => {
            if (this.isValidImage(portfolio.image)) {
                const img = new Image();
                img.src = portfolio.image;
            }
        });
    }
}

// Usage example
document.addEventListener('DOMContentLoaded', async () => {
    const portfolioAPI = new PortfolioAPI();
    
    // Get and display portfolios
    const portfolios = await portfolioAPI.getPortfolios();
    
    if (portfolios.length > 0) {
        // Preload images for better performance
        portfolioAPI.preloadImages(portfolios);
        
        // Display portfolios
        portfolioAPI.displayPortfolios(portfolios);
        
        // Log image URLs for debugging
        portfolios.forEach(portfolio => {
            console.log(`Portfolio: ${portfolio.title}`);
            console.log(`Image URL: ${portfolio.image}`);
            console.log(`Image Path: ${portfolio.image_path}`);
            console.log('---');
        });
    } else {
        console.log('No portfolios found');
    }
});

// Example CSS for portfolio cards
const portfolioStyles = `
<style>
.portfolio-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    background: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.portfolio-image {
    height: 200px;
    overflow: hidden;
}

.portfolio-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
    color: #666;
}

.portfolio-content {
    padding: 15px;
}

.portfolio-content h3 {
    margin: 0 0 10px 0;
    font-size: 18px;
    font-weight: bold;
}

.portfolio-content p {
    margin: 0 0 15px 0;
    color: #666;
    line-height: 1.5;
}

.portfolio-content a {
    display: inline-block;
    padding: 8px 16px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: background 0.3s;
}

.portfolio-content a:hover {
    background: #0056b3;
}
</style>
`;

// Inject styles
document.head.insertAdjacentHTML('beforeend', portfolioStyles); 