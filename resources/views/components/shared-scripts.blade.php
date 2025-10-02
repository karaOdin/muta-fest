<script>
    // Mobile drawer functions
    function toggleDrawer() {
        const drawer = document.querySelector('.mobile-drawer');
        const overlay = document.querySelector('.drawer-overlay');
        const hamburger = document.querySelector('.hamburger');
        
        drawer.classList.toggle('open');
        overlay.classList.toggle('open');
        hamburger.classList.toggle('active');
        
        // Prevent body scroll when drawer is open
        if (drawer.classList.contains('open')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }

    function closeDrawer() {
        const drawer = document.querySelector('.mobile-drawer');
        const overlay = document.querySelector('.drawer-overlay');
        const hamburger = document.querySelector('.hamburger');
        
        drawer.classList.remove('open');
        overlay.classList.remove('open');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
    }
</script>