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

    @media(min-width:861px) {
        .layout {
            display: grid;
            grid-template-columns: 270px 1fr;
        }
    }

    aside {
        background: var(--side-bg);
        border-right: 1px solid var(--line);
        padding: 24px 16px;
        overflow-y: auto;
    }

    @media(max-width:860px) {
        aside {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 82vw;
            max-width: 290px;
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

    @media(max-width:860px) {
        .menu-toggle {
            display: inline-flex;
        }
    }

    .brand {
        font-family: 'Newsreader', serif;
        font-size: 1.15rem;
        font-weight: 600;
        padding: 0 8px 22px;
        border-bottom: 1px solid var(--line);
        margin-bottom: 14px;
    }

    .group {
        margin-bottom: 4px;
    }

    .group-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 10px;
        border-radius: 3px;
        cursor: pointer;
        font-weight: 600;
        font-size: 0.92rem;
        color: var(--ink);
    }

    .group-head:hover {
        background: var(--amber-soft);
    }

    .group-head .chev {
        font-size: 0.7rem;
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
        padding: 8px 10px;
        font-size: 0.86rem;
        color: var(--ink-soft);
        text-decoration: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .submenu-item:hover {
        color: var(--ink);
    }

    .submenu-item.active {
        background: var(--teal);
        color: var(--paper);
    }

    main {
        padding: 32px 40px;
        overflow-y: auto;
    }

    @media(max-width:860px) {
        main {
            padding: 20px 18px;
        }
    }

    .topbar {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .topbar-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .status-pill {
        font-family: 'Space Mono', monospace;
        font-size: 0.78rem;
        background: var(--amber-soft);
        color: var(--ink);
        padding: 6px 12px;
        border-radius: 12px;
        white-space: nowrap;
    }

    @media(max-width:500px) {
        .topbar {
            flex-direction: column;
            align-items: stretch;
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
        font-size: 0.85rem;
        color: var(--ink-soft);
        font-family: 'Space Mono', monospace;
    }

    /* chart of accounts tree */
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
