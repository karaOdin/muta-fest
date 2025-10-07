<style>
    /* Header */
    .header {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 100;
        background: rgba(171, 78, 158, 0.95);
        backdrop-filter: blur(20px);
        border-top: 3px dashed rgba(255, 255, 255, 0.3);
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
        height: 80px;
    }

    .logo {
        height: 50px;
        width: auto;
        filter: brightness(1.1);
    }

    .nav-menu {
        display: flex;
        gap: 32px;
        list-style: none;
    }

    .nav-link {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-weight: 500;
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: white;
    }

    /* Hamburger Menu */
    .hamburger {
        display: none;
        flex-direction: column;
        cursor: pointer;
        padding: 8px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .hamburger span {
        width: 25px;
        height: 3px;
        background: white;
        margin: 3px 0;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile Drawer */
    .mobile-drawer {
        position: fixed;
        top: 0;
        right: -300px;
        width: 300px;
        height: 100vh;
        background: #f0925e;
        backdrop-filter: blur(20px);
        z-index: 1000;
        transition: right 0.3s ease;
        padding: 80px 30px 30px;
        border-left: 3px solid rgba(255, 255, 255, 0.3);
    }

    .mobile-drawer.open {
        right: 0;
    }

    .mobile-drawer .nav-menu {
        display: flex !important;
        flex-direction: column;
        gap: 30px;
        margin-top: 50px;
        list-style: none;
    }

    .mobile-drawer .nav-menu li {
        width: 100%;
    }

    .mobile-drawer .nav-link {
        display: block;
        font-size: 1.2rem;
        padding: 15px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-weight: 500;
    }

    .mobile-drawer .nav-link:hover {
        color: #ff8c42;
        transform: translateX(10px);
    }

    .drawer-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .drawer-overlay.open {
        opacity: 1;
        visibility: visible;
    }

    /* Footer */
    .footer {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.3) 0%, rgba(171, 78, 158, 0.4) 100%);
        padding: 60px 0 120px;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }

    .footer::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        font-size: 30px;
        white-space: nowrap;
        animation: footerScroll 20s linear infinite;
        opacity: 0.3;
    }

    @keyframes footerScroll {
        from { transform: translateX(100%); }
        to { transform: translateX(-100%); }
    }

    .footer-content {
        text-align: center;
    }

    .footer-logo {
        height: 60px;
        width: auto;
        margin-bottom: 24px;
        opacity: 0.8;
    }

    .footer-text {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 32px;
        font-size: 1.2rem;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 32px;
    }

    .social-link {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .hamburger {
            display: flex;
        }

        /* Footer mobile */
        .footer {
            padding: 40px 0 100px;
            margin-top: 60px;
        }

        .footer-logo {
            height: 50px;
            margin-bottom: 20px;
        }

        .footer-text {
            font-size: 1.1rem;
            margin-bottom: 24px;
        }

        .social-links {
            gap: 16px;
            margin-bottom: 24px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            font-size: 18px;
        }
    }
</style>
