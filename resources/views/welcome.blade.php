<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conheça o AquaControll: um projeto dedicado à gestão e ao uso consciente da água. Mais cuidado hoje, um futuro mais sustentável amanhã.">
    <meta name="theme-color" content="#80DEEA">
    <title>AquaControll | Cada gota conta</title>
    @fonts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #0dcaf0;
            --primary-dark: #0a8bb9;
            --background: #80DEEA;
            --surface: #4DD0E1;
            --text: #ffeeee;
            --text-secondary: #bbc0c1;
            --text-light: #ffffff;
            --border: #bdbdbd;
            --error: #FF5252;
            --warning: #26C6DA;
            --info: #0097A7;
            --success: #4CAF50;
        }

        :root,
        :root[data-theme="light"] {
            color-scheme: light;
            --brand: var(--primary);
            --brand-strong: var(--primary-dark);
            --on-brand: #073747;
            --text-1: #073747;
            --text-2: #285966;
            --surface-1: var(--background);
            --surface-2: var(--surface);
            --surface-3: color-mix(in srgb, var(--surface) 40%, var(--text-light));
            --surface-4: var(--primary-dark);
            --line: color-mix(in srgb, var(--text-1) 18%, transparent);
            --accent-text: #07566f;
            --panel: #073747;
            --surface-shadow: 7 55 71;
        }

        @media (prefers-color-scheme: dark) {
            :root:not([data-theme]) {
                color-scheme: dark;
                --brand: var(--primary);
                --brand-strong: var(--primary-dark);
                --on-brand: #073747;
                --text-1: var(--text);
                --text-2: var(--text-secondary);
                --surface-1: #071f2a;
                --surface-2: #0c3543;
                --surface-3: #164c5c;
                --surface-4: var(--primary-dark);
                --line: color-mix(in srgb, var(--border) 22%, transparent);
                --accent-text: var(--primary);
                --panel: #041720;
                --surface-shadow: 0 10 18;
            }
        }

        :root[data-theme="dark"] {
            color-scheme: dark;
            --brand: var(--primary);
            --brand-strong: var(--primary-dark);
            --on-brand: #073747;
            --text-1: var(--text);
            --text-2: var(--text-secondary);
            --surface-1: #071f2a;
            --surface-2: #0c3543;
            --surface-3: #164c5c;
            --surface-4: var(--primary-dark);
            --line: color-mix(in srgb, var(--border) 22%, transparent);
            --accent-text: var(--primary);
            --panel: #041720;
            --surface-shadow: 0 10 18;
        }

        :root[data-theme="dim"] {
            color-scheme: dark;
            --brand: #fb923c;
            --brand-strong: #ea580c;
            --on-brand: #431407;
            --text-1: #e2e8f0;
            --text-2: #cbd5e1;
            --surface-1: #334155;
            --surface-2: #475569;
            --surface-3: #64748b;
            --surface-4: #94a3b8;
            --line: color-mix(in srgb, var(--text-2) 25%, transparent);
            --accent-text: #fdba74;
            --panel: #1e293b;
            --surface-shadow: 15 23 42;
        }

        :root[data-theme="grape"] {
            color-scheme: light;
            --brand: #8b5cf6;
            --brand-strong: #7c3aed;
            --on-brand: #1f0d3a;
            --text-1: #4c1d95;
            --text-2: #7e22ce;
            --surface-1: #faf5ff;
            --surface-2: #f3e8ff;
            --surface-3: #e9d5ff;
            --surface-4: #d8b4fe;
            --line: #d8b4fe;
            --accent-text: #7e22ce;
            --panel: #30115e;
            --surface-shadow: 59 7 100;
        }

        :root[data-theme="choco"] {
            color-scheme: dark;
            --brand: #f59e0b;
            --brand-strong: #d97706;
            --on-brand: #451a03;
            --text-1: #fef3c7;
            --text-2: #fcd34d;
            --surface-1: #29180f;
            --surface-2: #422006;
            --surface-3: #713f12;
            --surface-4: #92400e;
            --line: #92400e;
            --accent-text: #fcd34d;
            --panel: #1c0c05;
            --surface-shadow: 28 12 5;
        }

        .theme-page {
            background: var(--surface-1);
            color: var(--text-1);
        }

        .theme-page a:focus-visible {
            outline: 2px solid var(--text-1);
            outline-offset: 5px;
        }

        .water-scene {
            background: radial-gradient(ellipse at center, var(--surface-3), transparent 68%);
        }

        .water-drop {
            filter: drop-shadow(0 24px 20px rgb(var(--surface-shadow) / 0.18));
        }

        .mission-panel {
            background: var(--panel);
            color: var(--text);
        }

        .mission-panel a:focus-visible {
            outline-color: var(--text-light);
        }

        @media (prefers-reduced-motion: no-preference) {
            html {
                scroll-behavior: smooth;
            }

            .theme-page {
                transition: background-color 180ms ease, color 180ms ease;
            }
        }
    </style>
</head>

<body class="theme-page min-h-dvh font-sans antialiased">
    <a href="#conteudo" class="sr-only fixed top-4 left-4 z-50 rounded-lg bg-[var(--text-1)] px-5 py-3 text-[var(--surface-1)] focus:not-sr-only">
        Pular para o conteúdo
    </a>

    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8 lg:px-12">
        <header>
            <div class="flex flex-wrap items-center justify-between gap-x-6 gap-y-5 border-b border-[var(--line)] py-6">
                <a href="{{ route('boas-vindas') }}" class="inline-flex items-center gap-2.5 rounded-lg" aria-label="AquaControll — página inicial">
                    <svg class="h-10 w-8 text-[var(--accent-text)]" viewBox="0 0 32 40" fill="none" aria-hidden="true">
                        <path d="M16 2C13 7 3 17 3 25a13 13 0 0 0 26 0C29 17 19 7 16 2Z" fill="currentColor" />
                        <path d="M7 25c4-4 7 4 11 0s6-3 7-2" stroke="var(--surface-1)" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-xl tracking-[-0.055em] sm:text-2xl"><span class="font-semibold">Aqua</span>Controll<span class="text-[var(--accent-text)]">.</span></span>
                </a>

                <nav class="order-3 flex w-full items-center justify-center gap-7 text-sm font-medium text-[var(--text-2)] md:order-none md:w-auto" aria-label="Navegação principal">
                   
                </nav>

                <a href="{{ url('/login') }}" class="inline-flex min-h-11 items-center gap-3 rounded-full border border-[var(--text-1)] px-5 py-2.5 text-sm font-semibold transition-colors hover:bg-[var(--text-1)] hover:text-[var(--surface-1)]">
                    Entrar
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                        <path d="M5 12h14m-5-5 5 5-5 5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <form id="theme-switcher" class="py-4" aria-label="Escolha o tema da página">
                <fieldset class="flex min-w-0 flex-wrap items-center justify-end gap-x-4 gap-y-2">
                    <legend class="sr-only">Esquema de cores</legend>
                    <span class="text-xs text-[var(--text-2)]" aria-hidden="true">Do seu jeito</span>
                    <div class="flex flex-wrap gap-1">
                        @foreach ([
                            'auto' => 'Automático',
                            'light' => 'Claro',
                            'dark' => 'Escuro',
                            'dim' => 'Suave',
                            'grape' => 'Uva',
                            'choco' => 'Chocolate',
                        ] as $theme => $label)
                            <div>
                                <input class="peer sr-only" type="radio" id="theme-{{ $theme }}" name="theme" value="{{ $theme }}" @checked($theme === 'auto')>
                                <label for="theme-{{ $theme }}"
                                    class="inline-flex min-h-9 cursor-pointer items-center rounded-full border border-transparent px-3 py-2 text-xs font-medium text-[var(--text-2)] transition-colors hover:border-[var(--line)] peer-checked:bg-[var(--text-1)] peer-checked:text-[var(--surface-1)] peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-[var(--text-1)]">
                                    {{ $label }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </form>
        </header>

        <main id="conteudo">
            <section id="projeto" class="grid scroll-mt-8 items-center gap-6 pt-8 pb-12 sm:pt-12 lg:grid-cols-[1.08fr_1fr] lg:gap-4 lg:pt-10 lg:pb-16" aria-labelledby="project-title">
                <div class="relative z-10 flex flex-col items-start gap-7 lg:gap-8">
                    <p class="inline-flex items-center gap-2.5 text-[10px] font-semibold tracking-[0.18em] text-[var(--accent-text)] uppercase sm:text-xs">
                        <span class="size-2 rounded-full bg-[var(--accent-text)]" aria-hidden="true"></span>
                        Tecnologia a favor da água
                    </p>
                    <h1 id="project-title" class="text-5xl leading-[1.04] font-medium tracking-[-0.065em] sm:text-7xl lg:text-[5.2rem]">
                        Cada gota<br>
                        conta. <span class="text-[var(--accent-text)]">O futuro<br>também.</span>
                    </h1>
                    <p class="max-w-md text-base leading-7 text-[var(--text-2)] sm:text-lg sm:leading-8">
                        O AquaControll nasce para aproximar tecnologia e cuidado com a água. Um projeto dedicado à gestão consciente desse recurso, para transformar pequenas atitudes em um futuro mais sustentável.
                    </p>
                    <div class="flex flex-wrap items-center gap-5 pt-1 sm:gap-7">
                        <a href="{{ url('/cadastro_usuario') }}" class="group inline-flex min-h-13 items-center justify-center gap-5 rounded-full bg-[var(--brand)] px-7 py-3.5 text-sm font-semibold text-[var(--on-brand)] transition hover:brightness-95">
                            Fazer parte
                            <svg class="size-5 transition-transform motion-safe:group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path d="M5 12h14m-5-5 5 5-5 5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="#missao" class="inline-flex min-h-11 items-center gap-2 rounded-sm text-sm font-medium underline decoration-[var(--line)] underline-offset-8 hover:decoration-current">
                            Conheça nossa missão
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                                <path d="M6 18 18 6M6 6h12v12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <p class="flex items-center gap-2 text-xs text-[var(--text-2)]">
                        <svg class="size-4 text-[var(--accent-text)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <path d="M20 4c-9-1-15 3-15 9a6 6 0 0 0 6 6c6 0 10-6 9-15ZM4 21 15 10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Mais consciência. Menos desperdício.
                    </p>
                </div>

                <figure class="water-scene relative isolate mx-auto flex aspect-square w-full max-w-xl items-center justify-center" aria-labelledby="water-caption">
                    <div class="absolute inset-[8%] rounded-full border border-[var(--line)]" aria-hidden="true"></div>
                    <div class="absolute inset-[18%] rounded-full border border-dashed border-[var(--line)]" aria-hidden="true"></div>
                    <div class="absolute inset-[28%] rounded-full border border-[var(--line)]" aria-hidden="true"></div>
                    <span class="absolute top-[17%] right-[19%] size-3 rounded-full bg-[var(--brand-strong)]" aria-hidden="true"></span>
                    <span class="absolute bottom-[22%] left-[14%] size-2 rounded-full bg-[var(--accent-text)]" aria-hidden="true"></span>

                    <svg class="water-drop relative w-[70%] overflow-visible" viewBox="0 0 360 440" fill="none" aria-hidden="true">
                        <defs>
                            <linearGradient id="drop-body" x1="80" y1="100" x2="290" y2="370" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--surface-3)" />
                                <stop offset="0.46" stop-color="var(--brand)" />
                                <stop offset="1" stop-color="var(--brand-strong)" />
                            </linearGradient>
                            <linearGradient id="drop-water" x1="180" y1="245" x2="180" y2="408" gradientUnits="userSpaceOnUse">
                                <stop stop-color="var(--brand-strong)" stop-opacity="0.55" />
                                <stop offset="1" stop-color="var(--panel)" stop-opacity="0.85" />
                            </linearGradient>
                            <linearGradient id="drop-shine" x1="135" y1="123" x2="70" y2="297" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" stop-opacity="0.75" />
                                <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                            <clipPath id="drop-shape">
                                <path d="M180 27C165 61 50 185 50 267a130 130 0 0 0 260 0C310 185 195 61 180 27Z" />
                            </clipPath>
                        </defs>
                        <path d="M180 27C165 61 50 185 50 267a130 130 0 0 0 260 0C310 185 195 61 180 27Z" fill="url(#drop-body)" />
                        <g clip-path="url(#drop-shape)">
                            <path d="M35 258c57-40 95 37 155 4s88-20 135 3v143H35Z" fill="var(--surface-3)" opacity="0.4" />
                            <path d="M30 280c69 33 109-42 179-15s78 34 119 2v150H30Z" fill="url(#drop-water)" />
                            <path d="M34 281c70 33 107-43 177-16s78 34 113 5" stroke="var(--text-light)" stroke-opacity="0.45" stroke-width="1.5" />
                            <circle cx="240" cy="312" r="5" fill="var(--text-light)" opacity="0.3" />
                            <circle cx="116" cy="331" r="3" fill="var(--text-light)" opacity="0.4" />
                            <circle cx="223" cy="343" r="2" fill="var(--text-light)" opacity="0.45" />
                        </g>
                        <path d="M149 113c-37 46-76 101-76 151" stroke="url(#drop-shine)" stroke-width="12" stroke-linecap="round" />
                        <path d="M180 27C165 61 50 185 50 267a130 130 0 0 0 260 0C310 185 195 61 180 27Z" stroke="var(--text-light)" stroke-opacity="0.3" />
                    </svg>

                    <div class="absolute top-[13%] left-[2%] flex items-center gap-2 rounded-full border border-[var(--line)] bg-[var(--surface-2)] px-3 py-2 text-xs font-medium sm:left-[5%] sm:px-4">
                        <svg class="size-3.5 text-[var(--accent-text)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M12 3 4 7v5c0 5 8 9 8 9s8-4 8-9V7l-8-4Z" stroke-linejoin="round" />
                            <path d="m8 12 3 3 5-6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Cuidar hoje
                    </div>
                    <figcaption id="water-caption" class="absolute right-0 bottom-[8%] max-w-48 border-l-2 border-[var(--brand-strong)] bg-[var(--surface-1)] py-2 pl-4 text-sm leading-5 sm:right-[1%]">
                        Um recurso essencial.<br>
                        <span class="font-semibold">Um compromisso de todos.</span>
                    </figcaption>
                    <span class="absolute bottom-[2%] left-[7%] text-[9px] tracking-[0.2em] text-[var(--text-2)] uppercase" aria-hidden="true">Água é vida. Preserve.</span>
                </figure>
            </section>

          
        <footer class="flex flex-col gap-5 border-t border-[var(--line)] py-7 text-xs text-[var(--text-2)] sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-col gap-2">
                <span class="text-sm font-semibold tracking-tight text-[var(--text-1)]">AquaControll.</span>
                <span>&copy; {{ date('Y') }} AquaControll. Todos os direitos reservados.</span>
            </div>
            <div class="flex flex-col gap-2 sm:items-end">
                <span>Feito para cuidar do que é essencial.</span>
                <span>Seu tema fica salvo neste navegador.</span>
            </div>
        </footer>
    </div>
</body>

</html>
