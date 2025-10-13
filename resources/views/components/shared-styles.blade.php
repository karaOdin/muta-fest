<style>
    /* Header */
    .header {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 100;
        background: #f0925e;
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
        transition: all 0.3s ease;
        padding: 8px 16px;
        border-radius: 20px;
    }

    .nav-link:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-link.active {
        color: black;
        background: white;
        font-weight: 700;
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
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-weight: 500;
    }

    .mobile-drawer .nav-link:hover {
        color: white;
        transform: translateX(10px);
    }

    .mobile-drawer .nav-link.active {
        color: black;
        font-weight: 700;
        border-bottom: 2px solid black;
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

    /* Location Modal */
    .location-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(15px);
        z-index: 10000;
        display: none;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .location-modal-overlay.active {
        display: flex;
        opacity: 1;
    }

    .location-modal-content {
        background: linear-gradient(135deg, #316995 0%, #3a7ba8 50%, #316995 100%);
        border-radius: 25px;
        max-width: 600px;
        width: 90%;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        transform: scale(0.85) translateY(50px);
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 40px 80px -20px rgba(0, 0, 0, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .location-modal-overlay.active .location-modal-content {
        transform: scale(1) translateY(0);
    }

    .location-modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .location-modal-close:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: rotate(90deg);
    }

    .location-modal-header {
        text-align: center;
        padding: 50px 40px 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.08) 0%, transparent 100%);
    }

    .location-modal-header i {
        font-size: 3rem;
        color: #f0925e;
        margin-bottom: 15px;
    }

    .location-modal-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin: 0;
    }

    .location-modal-body {
        padding: 40px;
    }

    .location-name {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        text-align: center;
    }

    .location-description {
        font-size: 1.4rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 35px;
        text-align: center;
    }

    .location-details {
        display: flex;
        flex-direction: column;
        gap: 25px;
        margin-bottom: 35px;
    }

    .location-detail-item {
        display: flex;
        gap: 20px;
        align-items: flex-start;
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .location-detail-item i {
        font-size: 1.8rem;
        color: #f0925e;
        min-width: 30px;
        text-align: center;
    }

    .location-detail-item strong {
        color: white;
        font-size: 1.3rem;
    }

    .location-detail-item a {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .location-detail-item a:hover {
        color: white;
        text-decoration: underline;
    }

    .location-map-btn {
        display: block;
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #f0925e, #ff8c42);
        color: white;
        text-align: center;
        border-radius: 50px;
        text-decoration: none;
        font-size: 1.4rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(240, 146, 94, 0.3);
    }

    .location-map-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(240, 146, 94, 0.5);
    }

    .location-map-btn i {
        margin-right: 10px;
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

        /* Location Modal Mobile */
        .location-modal-content {
            width: 95%;
            max-height: 90vh;
            border-radius: 20px;
        }

        .location-modal-header {
            padding: 40px 30px 25px;
        }

        .location-modal-header i {
            font-size: 2.5rem;
        }

        .location-modal-title {
            font-size: 2rem;
        }

        .location-modal-body {
            padding: 30px;
        }

        .location-name {
            font-size: 1.7rem;
        }

        .location-description {
            font-size: 1.3rem;
        }

        .location-detail-item {
            padding: 15px;
        }

        .location-map-btn {
            font-size: 1.3rem;
            padding: 16px;
        }
    }
</style>
