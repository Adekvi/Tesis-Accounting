<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Expand / collapse tiap grup menu di sidebar (link di dalamnya sudah link Blade asli)
        document.querySelectorAll('.group-head').forEach(head => {
            head.addEventListener('click', () => head.parentElement.classList.toggle('open'));
        });

        // Drawer sidebar untuk tablet & ponsel
        const asideEl = document.querySelector('aside');
        const menuToggle = document.getElementById('menuToggle');
        const navBackdrop = document.getElementById('navBackdrop');

        const openDrawer = () => {
            asideEl.classList.add('open');
            navBackdrop.classList.add('show');
        };
        const closeDrawer = () => {
            asideEl.classList.remove('open');
            navBackdrop.classList.remove('show');
        };

        menuToggle?.addEventListener('click', openDrawer);
        navBackdrop?.addEventListener('click', closeDrawer);

        // Menutup drawer begitu salah satu link navigasi diklik (halaman akan pindah)
        document.querySelectorAll('.submenu-item').forEach(a => {
            a.addEventListener('click', () => {
                if (window.innerWidth <= 900) closeDrawer();
            });
        });

        // Buka accordion "coa" (chart of accounts tree) bila ada di halaman ini
        document.querySelectorAll('.coa-row').forEach(row => {
            row.addEventListener('click', () => {
                const node = row.parentElement;
                if (node.querySelector('.coa-children')?.children.length) node.classList.toggle(
                    'open');
            });
        });
    });
</script>
