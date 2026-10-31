/*
 * Navigasi ala SPA untuk Laravel Blade, tanpa framework.
 * - Klik menu -> ambil hanya isi halaman (header X-Partial), tukar #view, perbarui URL.
 * - Prefetch saat kursor/sentuhan, cache 30 detik, batalkan request lama.
 * - Transisi lewat View Transitions API (fallback: animasi CSS biasa).
 * - Gagal apa pun -> pindah halaman biasa, sehingga tidak ada yang rusak.
 */
;(() => {
    'use strict'

    const view = document.getElementById('view')
    const bar = document.getElementById('bar')
    const TTL = 30000
    const cache = new Map() // url -> {html, at}
    const inflight = new Map() // url -> Promise
    let controller = null
    let barTimer = 0

    const sameOrigin = (a) => a.origin === location.origin
    const clean = (u) => u.origin + u.pathname + u.search

    function fetchPage(url, signal) {
        const hit = cache.get(url)
        if (hit && Date.now() - hit.at < TTL) return Promise.resolve(hit.html)
        if (inflight.has(url)) return inflight.get(url)

        const p = fetch(url, {
            headers: { 'X-Partial': '1', Accept: 'text/html' },
            credentials: 'same-origin',
            signal
        })
            .then((r) => {
                if (!r.ok || r.redirected) throw new Error('fallback')
                return r.text()
            })
            .then((html) => {
                cache.set(url, { html, at: Date.now() })
                return html
            })
            .finally(() => inflight.delete(url))

        inflight.set(url, p)
        return p
    }

    function progress(on) {
        clearTimeout(barTimer)
        if (on) {
            // Bilah hanya muncul bila memuat > 120 ms, supaya navigasi cepat tidak berkedip.
            barTimer = setTimeout(() => {
                bar.className = 'bar run'
            }, 120)
        } else {
            bar.className = bar.classList.contains('run') ? 'bar done' : 'bar'
        }
    }

    function setActive(path) {
        document.querySelectorAll('.rail nav a').forEach((a) => {
            a.classList.toggle('on', new URL(a.href).pathname === path)
        })
    }

    function mount(html, path) {
        view.innerHTML = html
        const t = view.querySelector('[data-title]')
        if (t) document.title = t.dataset.title + ' · Admin Buku Apotek'
        setActive(path)
        window.scrollTo(0, 0)
        view.focus({ preventScroll: true })
        init(view)
    }

    async function go(href, push = true) {
        const url = new URL(href, location.href)
        if (controller) controller.abort()
        controller = new AbortController()
        progress(true)
        try {
            const html = await fetchPage(clean(url), controller.signal)
            const swap = () => {
                if (push) history.pushState({}, '', url.pathname + url.search)
                mount(html, url.pathname)
            }
            if (
                document.startViewTransition &&
                !matchMedia('(prefers-reduced-motion: reduce)').matches
            ) {
                await document.startViewTransition(swap).updateCallbackDone
            } else {
                swap()
                view.classList.remove('swap')
                void view.offsetWidth
                view.classList.add('swap')
            }
            progress(false)
        } catch (e) {
            if (e.name === 'AbortError') return
            progress(false)
            location.href = url.href // fallback ke navigasi biasa
        }
    }

    function linkOf(e) {
        const a = e.target.closest && e.target.closest('a[data-nav]')
        if (!a) return null
        const u = new URL(a.href)
        return sameOrigin(u) ? a : null
    }

    document.addEventListener('click', (e) => {
        const a = linkOf(e)
        if (
            !a ||
            e.defaultPrevented ||
            e.button !== 0 ||
            e.metaKey ||
            e.ctrlKey ||
            e.shiftKey ||
            e.altKey
        )
            return
        e.preventDefault()
        if (new URL(a.href).pathname === location.pathname) return
        go(a.href)
    })

    const prefetch = (e) => {
        const a = linkOf(e)
        if (a) fetchPage(clean(new URL(a.href))).catch(() => {})
    }
    document.addEventListener('pointerenter', prefetch, true)
    document.addEventListener('touchstart', prefetch, { passive: true })
    document.addEventListener('focusin', prefetch)

    window.addEventListener('popstate', () => go(location.href, false))

    /* ---- Komponen kecil: dipasang ulang setiap halaman berganti ---- */
    function init(root) {
        // Angka naik halus
        root.querySelectorAll('[data-count]').forEach((el) => {
            const to = Number(el.dataset.count) || 0
            if (!to || matchMedia('(prefers-reduced-motion: reduce)').matches)
                return
            const t0 = performance.now(),
                dur = 600
            const fmt = new Intl.NumberFormat('id-ID')
            const tick = (t) => {
                const k = Math.min(1, (t - t0) / dur)
                el.textContent = fmt.format(
                    Math.round(to * (1 - Math.pow(1 - k, 3)))
                )
                if (k < 1) requestAnimationFrame(tick)
            }
            requestAnimationFrame(tick)
        })

        // Filter tabel di sisi klien
        root.querySelectorAll('[data-filter]').forEach((input) => {
            const rows = root.querySelectorAll(
                input.dataset.filter + ' tbody tr'
            )
            let raf = 0
            input.addEventListener('input', () => {
                cancelAnimationFrame(raf)
                raf = requestAnimationFrame(() => {
                    const q = input.value.trim().toLowerCase()
                    rows.forEach((r) => {
                        r.hidden = q && !r.textContent.toLowerCase().includes(q)
                    })
                })
            })
        })
    }

    init(document)
})()

document.addEventListener('submit', () => cache.clear())
