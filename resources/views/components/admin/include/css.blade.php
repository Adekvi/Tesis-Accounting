<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,500;0,600;1,500&family=Figtree:wght@400;500;600;700&family=Space+Mono:wght@400;700&display=swap"
    rel="stylesheet">
<style>
    :root {
        --paper: #F6F1E7;
        --ink: #1C2B22;
        --ink-soft: #3E4C43;
        --teal: #123832;
        --teal-2: #1D5148;
        --amber: #B8863B;
        --amber-soft: #E7D2A6;
        --red-flag: #8C4A3B;
        --line: #D2C6A6;
        --card-bg: #FFFCF5;
        --side-bg: #FFFCF5;
    }

    @media (prefers-color-scheme: dark) {
        :root:not([data-theme="light"]) {
            --paper: #141B16;
            --ink: #EDE7D8;
            --ink-soft: #BFC9BE;
            --teal: #8FC4B4;
            --teal-2: #6FA694;
            --amber: #E3B872;
            --amber-soft: #3A3020;
            --red-flag: #D89684;
            --line: #3A3E33;
            --card-bg: #1B241D;
            --side-bg: #181F1A;
        }
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background: var(--paper);
        color: var(--ink);
        font-family: 'Figtree', sans-serif;
    }

    h1,
    h2,
    h3 {
        font-family: 'Newsreader', serif;
        font-weight: 500;
        margin: 0;
    }

    .num {
        font-family: 'Space Mono', monospace;
    }

    .layout {
        min-height: 100vh;
    }

    @media (min-width: 901px) {
        .layout {
            display: grid;
            grid-template-columns: 280px 1fr;
        }
    }

    aside {
        background: var(--side-bg);
        border-right: 1px solid var(--line);
        padding: 22px 14px;
        overflow-y: auto;
    }

    @media (max-width: 900px) {
        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 82vw;
            max-width: 300px;
            z-index: 70;
            transform: translateX(-100%);
            transition: transform .22s ease;
            box-shadow: 2px 0 18px rgba(0, 0, 0, .15);
        }

        aside.open {
            transform: translateX(0);
        }
    }

    .nav-backdrop {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(10, 14, 11, .45);
        z-index: 65;
    }

    .nav-backdrop.show {
        display: block;
    }

    .menu-toggle {
        display: none;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border: 1px solid var(--line);
        border-radius: 3px;
        background: var(--card-bg);
        cursor: pointer;
        font-size: 1.1rem;
        color: var(--ink);
        flex-shrink: 0;
    }

    @media (max-width: 900px) {
        .menu-toggle {
            display: inline-flex;
        }
    }

    .brand {
        font-family: 'Newsreader', serif;
        font-size: 1.15rem;
        font-weight: 600;
        padding: 0 8px 6px;
    }

    .brand .tag {
        display: block;
        font-family: 'Space Mono', monospace;
        font-size: 0.7rem;
        color: var(--amber);
        font-weight: 400;
        margin-top: 2px;
    }

    .side-label {
        font-family: 'Space Mono', monospace;
        font-size: 0.68rem;
        color: var(--ink-soft);
        text-transform: uppercase;
        letter-spacing: .04em;
        padding: 16px 10px 6px;
    }

    .side-label.store {
        color: var(--teal-2);
        border-top: 1px solid var(--line);
        margin-top: 10px;
    }

    .group {
        margin-bottom: 2px;
    }

    .group-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 9px 10px;
        border-radius: 3px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .group-head:hover {
        background: var(--amber-soft);
    }

    .group-head .chev {
        font-size: 0.68rem;
        color: var(--ink-soft);
        transition: transform .15s;
    }

    .group.open .chev {
        transform: rotate(90deg);
    }

    .group-body {
        display: none;
        padding-left: 10px;
        border-left: 1px solid var(--line);
        margin-left: 14px;
    }

    .group.open .group-body {
        display: block;
    }

    .submenu-item {
        display: block;
        padding: 7px 10px;
        font-size: 0.84rem;
        color: var(--ink-soft);
        text-decoration: none;
        border-radius: 3px;
    }

    .submenu-item:hover {
        color: var(--ink);
    }

    .submenu-item.active {
        background: var(--teal);
        color: var(--paper);
    }

    main {
        padding: 30px 40px;
        overflow-y: auto;
    }

    @media (max-width: 900px) {
        main {
            padding: 20px 18px;
        }
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        flex-wrap: wrap;
        gap: 14px;
        padding-bottom: 18px;
        border-bottom: 1px solid var(--line);
    }

    .topbar-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .whoami {
        font-family: 'Space Mono', monospace;
        font-size: 0.78rem;
        color: var(--amber);
    }

    .store-switch {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin: 0;
    }

    .store-switch label {
        font-size: 0.82rem;
        color: var(--ink-soft);
    }

    .store-switch select {
        padding: 8px 10px;
        border: 1px solid var(--line);
        border-radius: 3px;
        background: var(--card-bg);
        color: var(--ink);
        font-family: 'Figtree', sans-serif;
        font-size: 0.88rem;
    }

    @media (max-width: 600px) {
        .topbar {
            flex-direction: column;
            align-items: stretch;
        }

        .store-switch {
            flex-direction: column;
            align-items: stretch;
        }

        .store-switch select {
            width: 100%;
        }
    }

    .breadcrumb {
        font-family: 'Space Mono', monospace;
        font-size: 0.78rem;
        color: var(--ink-soft);
        margin-bottom: 10px;
    }

    .card {
        background: var(--card-bg);
        border: 1px solid var(--line);
        border-radius: 4px;
        padding: 24px;
        margin-bottom: 20px;
    }

    .card h3 {
        font-size: 1.05rem;
        margin-bottom: 10px;
    }

    .card p {
        color: var(--ink-soft);
        font-size: 0.92rem;
        margin: 0;
    }

    .empty-note {
        font-family: 'Space Mono', monospace;
        font-size: 0.82rem;
        color: var(--ink-soft);
    }

    .table-scroll {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        min-width: 480px;
    }

    th,
    td {
        text-align: left;
        padding: 10px 12px;
        border-bottom: 1px solid var(--line);
    }

    th {
        font-family: 'Space Mono', monospace;
        font-size: 0.72rem;
        color: var(--ink-soft);
        font-weight: 400;
    }

    .badge {
        font-family: 'Space Mono', monospace;
        font-size: 0.7rem;
        padding: 3px 9px;
        border-radius: 10px;
    }

    .badge-pending {
        background: var(--amber-soft);
        color: var(--ink);
    }

    .badge-active {
        background: color-mix(in srgb, var(--teal-2) 22%, transparent);
        color: var(--teal-2);
    }

    .btn-mini {
        font-size: 0.78rem;
        padding: 5px 10px;
        border: 1px solid var(--line);
        border-radius: 3px;
        background: transparent;
        cursor: pointer;
        color: var(--ink);
    }

    .btn-mini:hover {
        border-color: var(--teal-2);
    }

    .coa {
        border: 1px solid var(--line);
        border-radius: 4px;
        background: var(--card-bg);
    }

    .coa-node {
        border-bottom: 1px solid var(--line);
    }

    .coa-node:last-child {
        border-bottom: none;
    }

    .coa-row {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .coa-row:hover {
        background: var(--amber-soft);
    }

    .coa-row .chev {
        font-size: 0.68rem;
        color: var(--ink-soft);
        width: 12px;
        transition: transform .15s;
    }

    .coa-node.open>.coa-row .chev {
        transform: rotate(90deg);
    }

    .coa-children {
        display: none;
        padding-left: 22px;
    }

    .coa-node.open>.coa-children {
        display: block;
    }

    .coa-leaf {
        padding: 8px 14px 8px 22px;
        font-size: 0.87rem;
        color: var(--ink-soft);
        border-bottom: 1px solid var(--line);
    }

    .coa-leaf:last-child {
        border-bottom: none;
    }

    .coa-leaf .num {
        float: right;
        color: var(--teal-2);
    }
</style>
