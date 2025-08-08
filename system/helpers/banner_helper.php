<?php
// Promotional banner component for displaying banners
require_once '../system/helpers/voucher_helper.php';

function displayPromotionalBanners($position = 'home_top') {
    $banners = getPromotionalBanners($position);
    
    if (empty($banners)) {
        return '';
    }
    
    $html = '<div class="promotional-banners-' . $position . ' mb-4">';
    
    if (count($banners) > 1) {
        // Multiple banners - use carousel
        $html .= '<div id="promoBanners' . ucfirst($position) . '" class="carousel slide" data-ride="carousel" data-interval="5000">';
        $html .= '<div class="carousel-inner">';
        
        foreach ($banners as $index => $banner) {
            $active = $index === 0 ? 'active' : '';
            $html .= '<div class="carousel-item ' . $active . '">';
            
            if ($banner['link_url']) {
                $html .= '<a href="' . htmlspecialchars($banner['link_url']) . '" target="_blank">';
            }
            
            $html .= '<img src="' . htmlspecialchars($banner['image_url']) . '" class="d-block w-100 promo-banner" alt="' . htmlspecialchars($banner['title']) . '">';
            
            if ($banner['description']) {
                $html .= '<div class="carousel-caption d-none d-md-block">';
                $html .= '<h5>' . htmlspecialchars($banner['title']) . '</h5>';
                $html .= '<p>' . htmlspecialchars($banner['description']) . '</p>';
                $html .= '</div>';
            }
            
            if ($banner['link_url']) {
                $html .= '</a>';
            }
            
            $html .= '</div>';
        }
        
        $html .= '</div>';
        
        // Carousel controls
        if (count($banners) > 1) {
            $html .= '<a class="carousel-control-prev" href="#promoBanners' . ucfirst($position) . '" role="button" data-slide="prev">';
            $html .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            $html .= '<span class="sr-only">Previous</span>';
            $html .= '</a>';
            $html .= '<a class="carousel-control-next" href="#promoBanners' . ucfirst($position) . '" role="button" data-slide="next">';
            $html .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            $html .= '<span class="sr-only">Next</span>';
            $html .= '</a>';
        }
        
        $html .= '</div>';
    } else {
        // Single banner
        $banner = $banners[0];
        
        if ($banner['link_url']) {
            $html .= '<a href="' . htmlspecialchars($banner['link_url']) . '" target="_blank">';
        }
        
        $html .= '<div class="single-promo-banner">';
        $html .= '<img src="' . htmlspecialchars($banner['image_url']) . '" class="d-block w-100 promo-banner" alt="' . htmlspecialchars($banner['title']) . '">';
        
        if ($banner['description']) {
            $html .= '<div class="banner-overlay">';
            $html .= '<div class="banner-content">';
            $html .= '<h5>' . htmlspecialchars($banner['title']) . '</h5>';
            $html .= '<p>' . htmlspecialchars($banner['description']) . '</p>';
            $html .= '</div>';
            $html .= '</div>';
        }
        
        $html .= '</div>';
        
        if ($banner['link_url']) {
            $html .= '</a>';
        }
    }
    
    $html .= '</div>';
    
    // Add CSS for banners
    $html .= '<style>
        .promo-banner {
            border-radius: 15px;
            max-height: 200px;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .single-promo-banner {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }
        
        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .single-promo-banner:hover .banner-overlay {
            opacity: 1;
        }
        
        .banner-content {
            text-align: center;
            color: white;
            padding: 20px;
        }
        
        .banner-content h5 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .banner-content p {
            font-size: 1rem;
            margin: 0;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }
        
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            padding: 20px;
        }
        
        @media (max-width: 768px) {
            .promo-banner {
                max-height: 150px;
            }
            
            .banner-content h5 {
                font-size: 1.2rem;
            }
            
            .banner-content p {
                font-size: 0.9rem;
            }
        }
    </style>';
    
    return $html;
}

// Quick access function for different positions
function renderTopBanners() {
    return displayPromotionalBanners('home_top');
}

function renderMiddleBanners() {
    return displayPromotionalBanners('home_middle');
}

function renderGamesBanners() {
    return displayPromotionalBanners('games');
}

function renderProfileBanners() {
    return displayPromotionalBanners('profile');
}
?>