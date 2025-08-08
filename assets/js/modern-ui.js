// Modern UI Enhancements and Features

class ModernUI {
    constructor() {
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.initializeComponents();
        this.setupNotifications();
        this.setupDarkMode();
        this.setupFormValidation();
        this.setupPasswordStrength();
        this.setupLoadingStates();
    }

    setupEventListeners() {
        document.addEventListener('DOMContentLoaded', () => {
            this.animateOnScroll();
            this.setupLazyLoading();
            this.setupTooltips();
        });

        // Form submission with loading states
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', (e) => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    this.setLoadingState(submitBtn, true);
                }
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    }

    initializeComponents() {
        // Initialize modern cards hover effects
        this.setupCardAnimations();
        
        // Initialize progress bars
        this.animateProgressBars();
        
        // Initialize counters
        this.animateCounters();
    }

    setupNotifications() {
        this.createNotificationContainer();
    }

    createNotificationContainer() {
        if (!document.getElementById('notification-container')) {
            const container = document.createElement('div');
            container.id = 'notification-container';
            container.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                max-width: 400px;
            `;
            document.body.appendChild(container);
        }
    }

    showNotification(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <span>${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" 
                        style="background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer;">×</button>
            </div>
        `;

        const container = document.getElementById('notification-container');
        container.appendChild(notification);

        // Animate in
        setTimeout(() => notification.classList.add('show'), 100);

        // Auto remove
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, duration);
    }

    setupDarkMode() {
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        if (darkModeToggle) {
            const isDark = localStorage.getItem('dark-mode') === 'true';
            if (isDark) {
                document.body.classList.add('dark-mode');
                darkModeToggle.checked = true;
            }

            darkModeToggle.addEventListener('change', () => {
                document.body.classList.toggle('dark-mode');
                localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode'));
            });
        }
    }

    setupFormValidation() {
        // Real-time form validation
        document.querySelectorAll('input[required]').forEach(input => {
            input.addEventListener('blur', () => this.validateField(input));
            input.addEventListener('input', () => this.clearFieldError(input));
        });

        // Password confirmation validation
        const passwordFields = document.querySelectorAll('input[type="password"]');
        if (passwordFields.length >= 2) {
            passwordFields[1].addEventListener('input', () => {
                this.validatePasswordConfirmation(passwordFields[0], passwordFields[1]);
            });
        }
    }

    validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let message = '';

        // Remove existing error
        this.clearFieldError(field);

        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'Field ini harus diisi';
        } else if (field.type === 'email' && value && !this.isValidEmail(value)) {
            isValid = false;
            message = 'Format email tidak valid';
        } else if (field.type === 'password' && value && value.length < 6) {
            isValid = false;
            message = 'Password minimal 6 karakter';
        } else if (field.name === 'username' && value && value.length < 4) {
            isValid = false;
            message = 'Username minimal 4 karakter';
        }

        if (!isValid) {
            this.showFieldError(field, message);
        }

        return isValid;
    }

    showFieldError(field, message) {
        field.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }

    clearFieldError(field) {
        field.classList.remove('is-invalid');
        const errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (errorDiv) {
            errorDiv.remove();
        }
    }

    validatePasswordConfirmation(password, confirmPassword) {
        if (confirmPassword.value && password.value !== confirmPassword.value) {
            this.showFieldError(confirmPassword, 'Password tidak cocok');
        } else {
            this.clearFieldError(confirmPassword);
        }
    }

    isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    setupPasswordStrength() {
        const passwordInputs = document.querySelectorAll('input[type="password"]');
        passwordInputs.forEach(input => {
            if (input.name === 'password') {
                const strengthMeter = this.createPasswordStrengthMeter();
                input.parentNode.appendChild(strengthMeter);
                
                input.addEventListener('input', () => {
                    this.updatePasswordStrength(input.value, strengthMeter);
                });
            }
        });
    }

    createPasswordStrengthMeter() {
        const meter = document.createElement('div');
        meter.className = 'password-strength-meter';
        meter.innerHTML = `
            <div class="strength-bar">
                <div class="strength-fill"></div>
            </div>
            <small class="strength-text">Kekuatan password</small>
        `;
        meter.style.cssText = `
            margin-top: 0.5rem;
        `;
        return meter;
    }

    updatePasswordStrength(password, meter) {
        const fill = meter.querySelector('.strength-fill');
        const text = meter.querySelector('.strength-text');
        
        let strength = 0;
        let strengthText = 'Sangat Lemah';
        let color = '#dc3545';

        if (password.length >= 6) strength += 25;
        if (password.match(/[a-z]/)) strength += 25;
        if (password.match(/[A-Z]/)) strength += 25;
        if (password.match(/[0-9]/)) strength += 25;

        if (strength >= 75) {
            strengthText = 'Kuat';
            color = '#28a745';
        } else if (strength >= 50) {
            strengthText = 'Sedang';
            color = '#ffc107';
        } else if (strength >= 25) {
            strengthText = 'Lemah';
            color = '#fd7e14';
        }

        fill.style.cssText = `
            width: ${strength}%;
            background: ${color};
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        `;
        text.textContent = strengthText;
        text.style.color = color;
    }

    setupLoadingStates() {
        // Setup AJAX form submissions with loading states
        document.querySelectorAll('form[data-ajax="true"]').forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.submitFormAjax(form);
            });
        });
    }

    async submitFormAjax(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const formData = new FormData(form);
        
        this.setLoadingState(submitBtn, true);

        try {
            const response = await fetch(form.action || window.location.href, {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const result = await response.text();
                this.showNotification('Berhasil!', 'success');
                
                // Handle redirect if specified
                const redirectUrl = form.dataset.redirect;
                if (redirectUrl) {
                    setTimeout(() => window.location.href = redirectUrl, 1000);
                }
            } else {
                throw new Error('Network response was not ok');
            }
        } catch (error) {
            this.showNotification('Terjadi kesalahan', 'error');
        } finally {
            this.setLoadingState(submitBtn, false);
        }
    }

    setLoadingState(button, isLoading) {
        if (isLoading) {
            button.classList.add('btn-loading');
            button.disabled = true;
            button.dataset.originalText = button.textContent;
            button.innerHTML = `${button.dataset.originalText} <span class="loading-spinner"></span>`;
        } else {
            button.classList.remove('btn-loading');
            button.disabled = false;
            button.textContent = button.dataset.originalText;
        }
    }

    setupCardAnimations() {
        document.querySelectorAll('.game-card, .modern-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-5px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    animateOnScroll() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });
    }

    setupLazyLoading() {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    setupTooltips() {
        // Simple tooltip implementation
        document.querySelectorAll('[data-tooltip]').forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                this.showTooltip(e.target, e.target.dataset.tooltip);
            });
            
            element.addEventListener('mouseleave', () => {
                this.hideTooltip();
            });
        });
    }

    showTooltip(element, text) {
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = text;
        tooltip.style.cssText = `
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem;
            border-radius: 4px;
            font-size: 0.875rem;
            z-index: 10000;
            pointer-events: none;
            white-space: nowrap;
        `;
        
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.top = (rect.top - tooltip.offsetHeight - 5) + 'px';
        tooltip.style.left = (rect.left + rect.width / 2 - tooltip.offsetWidth / 2) + 'px';
    }

    hideTooltip() {
        const tooltip = document.querySelector('.custom-tooltip');
        if (tooltip) {
            tooltip.remove();
        }
    }

    animateProgressBars() {
        document.querySelectorAll('.progress-bar-modern').forEach(bar => {
            const targetWidth = bar.dataset.width || '0%';
            setTimeout(() => {
                bar.style.width = targetWidth;
            }, 500);
        });
    }

    animateCounters() {
        document.querySelectorAll('[data-counter]').forEach(counter => {
            const target = parseInt(counter.dataset.counter);
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        });
    }

    // Security Features
    setupSecurityFeatures() {
        // Disable right-click context menu (optional)
        document.addEventListener('contextmenu', (e) => {
            if (document.body.dataset.disableRightClick === 'true') {
                e.preventDefault();
            }
        });

        // Detect developer tools (basic)
        this.detectDevTools();
    }

    detectDevTools() {
        let devtools = {open: false, orientation: null};
        
        setInterval(() => {
            if (window.outerHeight - window.innerHeight > 160) {
                if (!devtools.open) {
                    devtools.open = true;
                    console.clear();
                    console.log('%cStop!', 'color: red; font-size: 50px; font-weight: bold;');
                    console.log('%cThis is a browser feature intended for developers.', 'color: red; font-size: 16px;');
                }
            } else {
                devtools.open = false;
            }
        }, 500);
    }

    // Utility Functions
    formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(amount);
    }

    formatNumber(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    timeAgo(date) {
        const now = new Date();
        const diffInSeconds = Math.floor((now - new Date(date)) / 1000);
        
        if (diffInSeconds < 60) return 'Baru saja';
        if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} menit lalu`;
        if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} jam lalu`;
        return `${Math.floor(diffInSeconds / 86400)} hari lalu`;
    }

    copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            this.showNotification('Berhasil disalin!', 'success', 2000);
        });
    }

    generateRandomString(length = 10) {
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return result;
    }
}

// Initialize Modern UI when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.modernUI = new ModernUI();
});

// Expose utility functions globally
window.showNotification = (message, type, duration) => {
    if (window.modernUI) {
        window.modernUI.showNotification(message, type, duration);
    }
};

window.copyToClipboard = (text) => {
    if (window.modernUI) {
        window.modernUI.copyToClipboard(text);
    }
};

// Auto-refresh for certain pages (optional)
if (window.location.pathname.includes('dashboard') || window.location.pathname.includes('admin')) {
    // Refresh every 5 minutes for dashboard pages
    setTimeout(() => {
        if (confirm('Halaman akan direfresh untuk update data terbaru. Lanjutkan?')) {
            window.location.reload();
        }
    }, 300000);
}