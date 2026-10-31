<script>
    document.documentElement.classList.add('js');

    // Toggle group menu
    document.querySelectorAll('.group-head').forEach(head => {
        head.addEventListener('click', () => {
            head.closest('.group')?.classList.toggle('open');
        });
    });

    // Drawer mobile
    const aside = document.querySelector('aside');
    const toggle = document.getElementById('menuToggle');
    const backdrop = document.getElementById('navBackdrop');

    function openDrawer() {
        aside?.classList.add('open');
        backdrop?.classList.add('show');
    }

    function closeDrawer() {
        aside?.classList.remove('open');
        backdrop?.classList.remove('show');
    }

    toggle?.addEventListener('click', openDrawer);
    backdrop?.addEventListener('click', closeDrawer);
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('submenu-item') && window.innerWidth <= 860) {
            closeDrawer();
        }
    });
</script>
