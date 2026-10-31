<script>
    (function() {
        var t = null;
        try {
            t = localStorage.getItem('resepta_theme');
        } catch (e) {}
        if (!t) {
            t = matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }
        document.documentElement.setAttribute('data-theme', t);
    })();
</script>
