 <style>
     :root {
         --paper: #F6F1E7;
         --paper-2: #EFE7D6;
         --ink: #1C2B22;
         --ink-soft: #46544A;
         --teal: #123832;
         --teal-2: #1D5148;
         --on-teal: #F6F1E7;
         --sage: #6B8F71;
         --amber: #A5762C;
         --amber-soft: #EBDAB4;
         --red-flag: #8C4A3B;
         --line: #D8CCAE;
         --card: #FFFCF5;
         --shadow: 0 10px 30px rgba(28, 43, 34, .08);
         --ease: cubic-bezier(.22, .61, .36, 1);
     }

     :root[data-theme="dark"] {
         --paper: #111813;
         --paper-2: #18211A;
         --ink: #EDE7D8;
         --ink-soft: #B6C2B6;
         --teal: #8FC4B4;
         --teal-2: #7DB5A3;
         --on-teal: #0E1A15;
         --sage: #9AB89E;
         --amber: #E3B872;
         --amber-soft: #2E2819;
         --red-flag: #E0A090;
         --line: #2E372F;
         --card: #19231C;
         --shadow: 0 10px 30px rgba(0, 0, 0, .35);
     }

     * {
         box-sizing: border-box;
     }

     html {
         scroll-behavior: smooth;
         scroll-padding-top: 84px;
     }

     body {
         margin: 0;
         background: var(--paper);
         color: var(--ink);
         font-family: 'Figtree', system-ui, sans-serif;
         line-height: 1.65;
         -webkit-font-smoothing: antialiased;
     }

     /* Transisi tema halus */
     body,
     header,
     .card,
     .btn,
     input,
     select,
     .stat,
     .aud,
     .db-node,
     .api-box,
     .modal-box,
     .role-opt,
     .db-opt,
     .icon-btn {
         transition: background-color .35s var(--ease), color .35s var(--ease), border-color .35s var(--ease), box-shadow .35s var(--ease), transform .25s var(--ease);
     }

     .wrap {
         max-width: 1120px;
         margin: 0 auto;
         padding: 0 28px;
     }

     a {
         color: inherit;
     }

     h1,
     h2,
     h3 {
         font-family: 'Newsreader', serif;
         font-weight: 500;
         margin: 0;
         letter-spacing: -.01em;
     }

     .num {
         font-family: 'Space Mono', monospace;
     }

     :focus-visible {
         outline: 2px solid var(--teal-2);
         outline-offset: 3px;
         border-radius: 3px;
     }

     .sr {
         position: absolute;
         width: 1px;
         height: 1px;
         overflow: hidden;
         clip: rect(0 0 0 0);
     }

     /* Header */
     header {
         position: sticky;
         top: 0;
         z-index: 50;
         background: color-mix(in srgb, var(--paper) 86%, transparent);
         backdrop-filter: blur(10px);
         border-bottom: 1px solid var(--line);
     }

     header.scrolled {
         box-shadow: var(--shadow);
     }

     nav {
         display: flex;
         align-items: center;
         justify-content: space-between;
         gap: 20px;
         padding: 14px 0;
     }

     .brand {
         display: flex;
         align-items: center;
         gap: 10px;
         font-family: 'Newsreader', serif;
         font-size: 1.3rem;
         font-weight: 600;
         text-decoration: none;
     }

     .navlinks {
         display: flex;
         gap: 28px;
         font-size: .92rem;
     }

     .navlinks a {
         text-decoration: none;
         color: var(--ink-soft);
         padding: 4px 0;
         border-bottom: 1px solid transparent;
     }

     .navlinks a:hover,
     .navlinks a.active {
         color: var(--ink);
         border-color: var(--amber);
     }

     .nav-right {
         display: flex;
         align-items: center;
         gap: 10px;
     }

     .icon-btn {
         width: 40px;
         height: 40px;
         display: inline-flex;
         align-items: center;
         justify-content: center;
         border: 1px solid var(--line);
         border-radius: 6px;
         background: transparent;
         color: var(--ink);
         cursor: pointer;
     }

     .icon-btn:hover {
         border-color: var(--teal-2);
         transform: translateY(-1px);
     }

     .icon-btn svg {
         width: 18px;
         height: 18px;
     }

     .ico-sun {
         display: none;
     }

     [data-theme="dark"] .ico-sun {
         display: block;
     }

     [data-theme="dark"] .ico-moon {
         display: none;
     }

     .menu-toggle {
         display: none;
     }

     .mobile-panel {
         display: grid;
         grid-template-rows: 0fr;
         transition: grid-template-rows .35s var(--ease);
     }

     .mobile-panel>div {
         overflow: hidden;
         display: flex;
         flex-direction: column;
     }

     .mobile-panel.open {
         grid-template-rows: 1fr;
     }

     .mobile-panel a {
         padding: 11px 4px;
         text-decoration: none;
         color: var(--ink-soft);
         border-top: 1px solid var(--line);
     }

     @media (max-width: 860px) {

         .navlinks,
         .nav-right .hide-sm {
             display: none;
         }

         .menu-toggle {
             display: inline-flex;
         }
     }

     @media (min-width: 861px) {
         .mobile-panel {
             display: none;
         }
     }

     /* Tombol */
     .btn {
         display: inline-flex;
         align-items: center;
         justify-content: center;
         gap: 8px;
         padding: 11px 22px;
         border-radius: 6px;
         font: 600 .92rem 'Figtree', sans-serif;
         text-decoration: none;
         border: 1px solid var(--teal);
         cursor: pointer;
     }

     .btn-primary {
         background: var(--teal);
         color: var(--on-teal);
     }

     .btn-primary:hover {
         transform: translateY(-2px);
         box-shadow: var(--shadow);
     }

     .btn-ghost {
         border-color: var(--line);
         background: transparent;
         color: var(--ink);
     }

     .btn-ghost:hover {
         border-color: var(--teal-2);
         transform: translateY(-1px);
     }

     .btn-sm {
         padding: 8px 16px;
     }

     .btn[disabled] {
         opacity: .6;
         cursor: progress;
     }

     /* Hero */
     .hero {
         padding: 84px 0 72px;
     }

     .hero-grid {
         display: grid;
         grid-template-columns: 1.05fr .95fr;
         gap: 56px;
         align-items: center;
     }

     @media (max-width: 900px) {
         .hero-grid {
             grid-template-columns: 1fr;
             gap: 40px;
         }

         .hero {
             padding-top: 56px;
         }
     }

     .eyebrow {
         display: inline-block;
         font-size: .88rem;
         color: var(--amber);
         border-bottom: 1px solid var(--amber);
         padding-bottom: 3px;
         margin-bottom: 20px;
         font-weight: 500;
     }

     .hero h1 {
         font-size: clamp(2.1rem, 4.4vw, 3.3rem);
         line-height: 1.14;
     }

     .hero h1 .line-b {
         display: block;
         font-style: italic;
         color: var(--teal-2);
         margin-top: 4px;
     }

     .lede {
         font-size: 1.08rem;
         color: var(--ink-soft);
         max-width: 50ch;
         margin-top: 22px;
     }

     .hero-actions {
         display: flex;
         gap: 12px;
         margin-top: 32px;
         flex-wrap: wrap;
     }

     .hero-note {
         margin-top: 20px;
         font-size: .8rem;
         color: var(--ink-soft);
         font-family: 'Space Mono', monospace;
     }

     @keyframes rise {
         from {
             opacity: 0;
             transform: translateY(16px);
         }

         to {
             opacity: 1;
             transform: none;
         }
     }

     .hero .rise {
         animation: rise .8s var(--ease) both;
     }

     .hero .rise:nth-child(2) {
         animation-delay: .1s;
     }

     .hero .rise:nth-child(3) {
         animation-delay: .2s;
     }

     .hero .rise:nth-child(4) {
         animation-delay: .3s;
     }

     /* Diagram */
     .card {
         background: var(--card);
         border: 1px solid var(--line);
         border-radius: 10px;
         padding: 24px;
         box-shadow: var(--shadow);
     }

     .diagram-title {
         font: .78rem 'Space Mono', monospace;
         color: var(--ink-soft);
         display: flex;
         justify-content: space-between;
         margin-bottom: 14px;
     }

     .db-row {
         display: flex;
         flex-direction: column;
         gap: 10px;
     }

     .db-node {
         display: flex;
         align-items: center;
         gap: 12px;
         width: 100%;
         text-align: left;
         font: inherit;
         color: inherit;
         border: 1px solid var(--line);
         border-radius: 6px;
         padding: 12px 14px;
         background: transparent;
         cursor: pointer;
     }

     .db-node:hover,
     .db-node.active {
         border-color: var(--amber);
         background: var(--amber-soft);
         transform: translateX(4px);
     }

     .db-dot {
         width: 10px;
         height: 10px;
         border-radius: 50%;
         flex-shrink: 0;
     }

     .db-node .name {
         font-weight: 600;
         font-size: .93rem;
         display: block;
     }

     .db-node .sub {
         font-size: .8rem;
         color: var(--ink-soft);
     }

     .flow-arrow {
         text-align: center;
         font: .74rem 'Space Mono', monospace;
         color: var(--ink-soft);
         padding: 8px 0;
     }

     .api-box {
         border: 1px dashed var(--teal-2);
         border-radius: 6px;
         padding: 12px;
         text-align: center;
         font-size: .85rem;
         color: var(--teal-2);
         font-weight: 600;
     }

     .api-box.solid {
         border-style: solid;
         background: var(--amber-soft);
         color: var(--ink);
     }

     .detail-panel {
         margin-top: 14px;
         min-height: 64px;
         font-size: .86rem;
         color: var(--ink-soft);
         border-top: 1px solid var(--line);
         padding-top: 12px;
         transition: opacity .25s var(--ease);
     }

     .detail-panel.swap {
         opacity: 0;
     }

     /* Seksi */
     section {
         padding: 80px 0;
         border-top: 1px solid var(--line);
     }

     .section-head {
         max-width: 680px;
         margin-bottom: 44px;
     }

     .section-head h2 {
         font-size: clamp(1.55rem, 2.9vw, 2.15rem);
         line-height: 1.25;
     }

     .section-head p {
         color: var(--ink-soft);
         margin-top: 14px;
     }

     .stat-grid,
     .aud-grid {
         display: grid;
         gap: 1px;
         background: var(--line);
         border: 1px solid var(--line);
         border-radius: 10px;
         overflow: hidden;
     }

     .stat-grid {
         grid-template-columns: repeat(3, 1fr);
     }

     .aud-grid {
         grid-template-columns: 1fr 1fr;
     }

     .stat,
     .aud {
         background: var(--paper);
         padding: 30px 26px;
     }

     .stat:hover,
     .aud:hover {
         background: var(--paper-2);
     }

     .stat .num {
         font-size: 1.9rem;
         color: var(--teal-2);
         display: block;
     }

     .stat p,
     .aud p {
         margin: 8px 0 0;
         font-size: .92rem;
         color: var(--ink-soft);
     }

     .aud h3 {
         font-size: 1.2rem;
     }

     @media (max-width: 760px) {

         .stat-grid,
         .aud-grid {
             grid-template-columns: 1fr;
         }

         section {
             padding: 60px 0;
         }
     }

     .steps {
         border-left: 1px solid var(--line);
     }

     .step {
         display: grid;
         grid-template-columns: 64px 1fr;
         gap: 20px;
         padding: 24px 0;
         border-bottom: 1px solid var(--line);
     }

     .step:first-child {
         padding-top: 0;
     }

     .step:last-child {
         border-bottom: 0;
     }

     .step .idx {
         font: 1.05rem 'Space Mono', monospace;
         color: var(--amber);
         padding-left: 24px;
     }

     .step h3 {
         font-size: 1.15rem;
         margin-bottom: 6px;
     }

     .step p {
         margin: 0;
         color: var(--ink-soft);
         max-width: 60ch;
         font-size: .95rem;
     }

     /* Kalkulator */
     .calc-card {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 36px;
         padding: 32px;
     }

     @media (max-width: 800px) {
         .calc-card {
             grid-template-columns: 1fr;
             padding: 24px;
         }
     }

     .field {
         margin-bottom: 16px;
     }

     .field label,
     .lbl {
         display: block;
         font-size: .82rem;
         color: var(--ink-soft);
         margin-bottom: 6px;
         font-weight: 500;
     }

     .field input,
     .field select {
         width: 100%;
         padding: 11px 12px;
         border: 1px solid var(--line);
         border-radius: 6px;
         background: var(--paper);
         color: var(--ink);
         font: .95rem 'Space Mono', monospace;
     }

     .field input:focus,
     .field select:focus {
         border-color: var(--teal-2);
         outline: 2px solid color-mix(in srgb, var(--teal-2) 30%, transparent);
         outline-offset: 0;
     }

     .field .hint {
         font-size: .78rem;
         color: var(--red-flag);
         margin-top: 4px;
         min-height: 1em;
     }

     .seg {
         display: inline-flex;
         border: 1px solid var(--line);
         border-radius: 6px;
         padding: 3px;
         margin-bottom: 18px;
     }

     .seg button {
         border: 0;
         background: transparent;
         color: var(--ink-soft);
         font: 600 .84rem 'Figtree', sans-serif;
         padding: 7px 14px;
         border-radius: 4px;
         cursor: pointer;
         transition: all .25s var(--ease);
     }

     .seg button.on {
         background: var(--teal);
         color: var(--on-teal);
     }

     .calc-note {
         font-size: .84rem;
         color: var(--ink-soft);
     }

     .calc-result {
         border-left: 1px dashed var(--line);
         padding-left: 32px;
     }

     @media (max-width: 800px) {
         .calc-result {
             border-left: 0;
             border-top: 1px dashed var(--line);
             padding: 20px 0 0;
         }
     }

     .calc-row {
         display: flex;
         justify-content: space-between;
         padding: 7px 0;
         font-size: .92rem;
     }

     .calc-row.total {
         border-top: 1px solid var(--line);
         margin-top: 6px;
         padding-top: 12px;
         font-weight: 600;
     }

     .calc-status {
         margin-top: 14px;
         padding: 13px 15px;
         border-radius: 6px;
         font-size: .88rem;
         font-weight: 600;
         transition: background-color .35s var(--ease), color .35s var(--ease);
     }

     .status-kurang {
         background: var(--amber-soft);
         color: var(--ink);
     }

     .status-lebih {
         background: color-mix(in srgb, var(--red-flag) 18%, transparent);
         color: var(--red-flag);
     }

     .status-nihil {
         background: color-mix(in srgb, var(--sage) 22%, transparent);
         color: var(--teal-2);
     }

     /* Fitur */
     .feat-row {
         display: grid;
         grid-template-columns: 230px 1fr;
         gap: 28px;
         padding: 22px 12px;
         margin: 0 -12px;
         border-bottom: 1px solid var(--line);
         align-items: baseline;
         border-radius: 6px;
         transition: background-color .3s var(--ease);
     }

     .feat-row:first-child {
         border-top: 1px solid var(--line);
     }

     .feat-row:hover {
         background: var(--paper-2);
     }

     .feat-row h3 {
         font: 600 1.02rem 'Figtree', sans-serif;
         color: var(--teal-2);
     }

     .feat-row p {
         margin: 0;
         color: var(--ink-soft);
         font-size: .94rem;
         max-width: 62ch;
     }

     @media (max-width: 700px) {
         .feat-row {
             grid-template-columns: 1fr;
             gap: 4px;
         }
     }

     .cta {
         background: var(--teal);
         color: var(--on-teal);
         border-radius: 12px;
         padding: 60px 40px;
         text-align: center;
     }

     .cta h2 {
         font-size: clamp(1.5rem, 2.8vw, 2.05rem);
     }

     .cta p {
         margin: 12px 0 0;
         opacity: .8;
     }

     .cta .hero-actions {
         justify-content: center;
     }

     .cta .btn-primary {
         background: var(--on-teal);
         border-color: var(--on-teal);
         color: var(--teal);
     }

     .cta .btn-ghost {
         border-color: color-mix(in srgb, var(--on-teal) 40%, transparent);
         color: var(--on-teal);
     }

     footer {
         padding: 32px 0 48px;
         font-size: .84rem;
         color: var(--ink-soft);
         display: flex;
         justify-content: space-between;
         flex-wrap: wrap;
         gap: 12px;
         border-top: 1px solid var(--line);
     }

     /* Reveal saat scroll */
     .js .reveal {
         opacity: 0;
         transform: translateY(18px);
         transition: opacity .7s var(--ease), transform .7s var(--ease);
         transition-delay: var(--d, 0s);
     }

     .js .reveal.in {
         opacity: 1;
         transform: none;
     }

     /* Modal */
     .modal-overlay {
         position: fixed;
         inset: 0;
         z-index: 100;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 20px;
         background: rgba(10, 14, 11, .6);
         backdrop-filter: blur(3px);
         opacity: 0;
         visibility: hidden;
         transition: opacity .3s var(--ease), visibility .3s;
     }

     .modal-overlay.open {
         opacity: 1;
         visibility: visible;
     }

     .modal-box {
         position: relative;
         width: 100%;
         max-width: 540px;
         max-height: 92vh;
         overflow-y: auto;
         background: var(--card);
         border: 1px solid var(--line);
         border-radius: 12px;
         padding: 34px;
         box-shadow: var(--shadow);
         transform: translateY(16px) scale(.98);
         transition: transform .35s var(--ease);
     }

     .modal-overlay.open .modal-box {
         transform: none;
     }

     @media (max-width: 520px) {
         .modal-box {
             padding: 24px 20px;
         }
     }

     .modal-close {
         position: absolute;
         top: 14px;
         right: 14px;
     }

     .modal-eyebrow {
         font-size: .8rem;
         color: var(--amber);
         font-weight: 600;
         margin-bottom: 8px;
     }

     .modal-box h3 {
         font-size: 1.45rem;
         margin-bottom: 6px;
     }

     .modal-sub {
         color: var(--ink-soft);
         font-size: .9rem;
         margin: 0 0 22px;
     }

     .progress {
         display: flex;
         gap: 6px;
         margin-bottom: 24px;
     }

     .progress span {
         height: 3px;
         flex: 1;
         background: var(--line);
         border-radius: 2px;
         transition: background-color .4s var(--ease);
     }

     .progress span.done {
         background: var(--teal-2);
     }

     .form-step {
         display: none;
     }

     .form-step.active {
         display: block;
         animation: rise .45s var(--ease) both;
     }

     .field-row {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 14px;
     }

     @media (max-width: 520px) {
         .field-row {
             grid-template-columns: 1fr;
         }
     }

     .role-grid {
         display: grid;
         grid-template-columns: 1fr 1fr;
         gap: 10px;
         margin-bottom: 20px;
     }

     .role-opt,
     .db-opt {
         display: flex;
         align-items: center;
         gap: 10px;
         border: 1px solid var(--line);
         border-radius: 6px;
         padding: 10px 12px;
         font-size: .9rem;
         cursor: pointer;
     }

     .role-opt:hover,
     .db-opt:hover {
         border-color: var(--teal-2);
     }

     .role-opt:has(input:checked),
     .db-opt:has(input:checked) {
         border-color: var(--teal-2);
         background: var(--amber-soft);
     }

     .db-opt {
         margin-bottom: 8px;
         align-items: flex-start;
     }

     .db-opt small {
         display: block;
         color: var(--ink-soft);
         font-size: .8rem;
     }

     .modal-actions {
         display: flex;
         justify-content: space-between;
         gap: 10px;
         margin-top: 26px;
     }

     .pw {
         position: relative;
     }

     .pw input {
         padding-right: 62px;
     }

     .pw button {
         position: absolute;
         right: 6px;
         top: 50%;
         transform: translateY(-50%);
         border: 0;
         background: none;
         color: var(--teal-2);
         font: 600 .8rem 'Figtree', sans-serif;
         cursor: pointer;
         padding: 6px 8px;
     }

     .login-meta {
         display: flex;
         justify-content: space-between;
         align-items: center;
         font-size: .86rem;
         margin-bottom: 4px;
     }

     .login-meta a {
         color: var(--teal-2);
     }

     .login-foot {
         text-align: center;
         font-size: .87rem;
         color: var(--ink-soft);
         margin: 20px 0 0;
     }

     .login-foot button {
         border: 0;
         background: none;
         color: var(--teal-2);
         font: 600 inherit;
         cursor: pointer;
         text-decoration: underline;
     }

     .form-error {
         color: var(--red-flag);
         font-size: .85rem;
         min-height: 1.2em;
         margin-top: 10px;
     }

     .success-icon {
         width: 46px;
         height: 46px;
         border: 1px solid var(--teal-2);
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-bottom: 16px;
         color: var(--teal-2);
     }

     .status-pill {
         display: inline-block;
         font: .78rem 'Space Mono', monospace;
         background: var(--amber-soft);
         padding: 5px 11px;
         border-radius: 12px;
     }

     .toast {
         position: fixed;
         left: 50%;
         bottom: 24px;
         z-index: 200;
         transform: translate(-50%, 20px);
         background: var(--teal);
         color: var(--on-teal);
         padding: 12px 20px;
         border-radius: 8px;
         font-size: .88rem;
         opacity: 0;
         pointer-events: none;
         transition: all .35s var(--ease);
     }

     .toast.show {
         opacity: 1;
         transform: translate(-50%, 0);
     }

     @media (prefers-reduced-motion: reduce) {

         *,
         *::before,
         *::after {
             animation: none !important;
             transition-duration: .01ms !important;
             scroll-behavior: auto !important;
         }

         .js .reveal {
             opacity: 1;
             transform: none;
         }
     }
 </style>
