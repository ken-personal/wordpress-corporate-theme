// ============================================
// ScrollReveal アニメーション
// ============================================
document.addEventListener('DOMContentLoaded', function() {

    if (typeof ScrollReveal !== 'undefined') {
        const sr = ScrollReveal({
            origin: 'bottom',
            distance: '40px',
            duration: 700,
            delay: 100,
            easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
            reset: false,
        });

        sr.reveal('.service-card',  { interval: 120 });
        sr.reveal('.works-card',    { interval: 120 });
        sr.reveal('.section-title', { distance: '20px' });
        sr.reveal('.reveal',        { interval: 100 });
    }

    // ============================================
    // ヘッダー スクロールで影追加
    // ============================================
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.12)';
            } else {
                header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.08)';
            }
        });
    }

    // ============================================
    // スムーススクロール
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
