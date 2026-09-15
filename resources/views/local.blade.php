<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#80DEEA">
    <meta name="description" content="Cadastre um local no AquaControll.">
    <title>Cadastrar local | AquaControll</title>
    @fonts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/local.js'])

    <style>
        :root {
            --primary: #0dcaf0;
            --background: #80DEEA;
            --surface: #4DD0E1;
            --text-light: #ffffff;
            --border: #bdbdbd;
        }

        :root,
        :root[data-theme="light"] {
            color-scheme: light;
            --brand: var(--primary);
            --on-brand: #073747;
            --text-1: #073747;
            --text-2: #285966;
            --surface-1: var(--background);
            --surface-3: color-mix(in srgb, var(--surface) 40%, var(--text-light));
            --line: color-mix(in srgb, var(--text-1) 18%, transparent);
            --accent-text: #07566f;
            --panel: #073747;
        }

        @media (prefers-color-scheme: dark) {
            :root:not([data-theme]) {
                color-scheme: dark;
                --text-1: var(--text-light);
                --text-2: #bbc0c1;
                --surface-1: #071f2a;
                --surface-3: #164c5c;
                --line: color-mix(in srgb, var(--border) 22%, transparent);
                --accent-text: var(--primary);
                --panel: #041720;
            }
        }

        :root[data-theme="dark"] {
            color-scheme: dark;
            --text-1: var(--text-light);
            --text-2: #bbc0c1;
            --surface-1: #071f2a;
            --surface-3: #164c5c;
            --line: color-mix(in srgb, var(--border) 22%, transparent);
            --accent-text: var(--primary);
            --panel: #041720;
        }

        :root[data-theme="dim"] {
            color-scheme: dark;
            --brand: #fb923c;
            --on-brand: #431407;
            --text-1: #e2e8f0;
            --text-2: #cbd5e1;
            --surface-1: #334155;
            --surface-3: #64748b;
            --line: color-mix(in srgb, var(--text-2) 25%, transparent);
            --accent-text: #fdba74;
            --panel: #1e293b;
        }

        :root[data-theme="grape"] {
            color-scheme: light;
            --brand: #8b5cf6;
            --on-brand: #1f0d3a;
            --text-1: #4c1d95;
            --text-2: #7e22ce;
            --surface-1: #faf5ff;
            --surface-3: #e9d5ff;
            --line: #d8b4fe;
            --accent-text: #7e22ce;
            --panel: #30115e;
        }

        :root[data-theme="choco"] {
            color-scheme: dark;
            --brand: #f59e0b;
            --on-brand: #451a03;
            --text-1: #fef3c7;
            --text-2: #fcd34d;
            --surface-1: #29180f;
            --surface-3: #713f12;
            --line: #92400e;
            --accent-text: #fcd34d;
            --panel: #1c0c05;
        }

        .local-page {
            background: var(--surface-1);
            color: var(--text-1);
        }

        .local-page a:focus-visible,
        .local-page button:focus-visible,
        .local-page input:focus-visible,
        .local-page textarea:focus-visible,
        .local-page select:focus-visible {
            outline: 2px solid var(--text-1);
            outline-offset: 4px;
        }

        .local-panel {
            background: var(--panel);
            color: var(--text-light);
        }
    </style>
</head>

<body class="local-page min-h-dvh font-sans antialiased">
    <a href="#conteudo" class="sr-only fixed top-4 left-4 z-50 rounded-lg bg-[var(--text-1)] px-5 py-3 text-[var(--surface-1)] focus:not-sr-only">Pular para o conteúdo</a>

    <main id="conteudo" class="mx-auto grid min-h-dvh w-full max-w-7xl lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
        <section class="flex min-h-dvh flex-col px-5 py-6 sm:px-8 lg:px-12" aria-labelledby="local-title">
            <header class="flex items-center justify-between gap-4 border-b border-[var(--line)] pb-5">
                <a href="{{ route('boas-vindas') }}" class="inline-flex items-center gap-2.5 rounded-lg" aria-label="AquaControll — página inicial">
                    <svg class="h-9 w-7 text-[var(--accent-text)]" viewBox="0 0 32 40" fill="none" aria-hidden="true"><path d="M16 2C13 7 3 17 3 25a13 13 0 0 0 26 0C29 17 19 7 16 2Z" fill="currentColor" /><path d="M7 25c4-4 7 4 11 0s6-3 7-2" stroke="var(--surface-1)" stroke-width="2" stroke-linecap="round" /></svg>
                    <span class="text-xl tracking-[-0.055em]"><span class="font-semibold">Aqua</span>Controll<span class="text-[var(--accent-text)]">.</span></span>
                </a>
                <a href="{{ url('/login') }}" class="text-sm font-medium text-[var(--text-2)] underline decoration-[var(--line)] underline-offset-4 hover:text-[var(--text-1)]">Sair</a>
            </header>

            <form id="theme-switcher" class="py-4" aria-label="Escolha o tema da página">
                <fieldset class="flex min-w-0 flex-wrap items-center justify-between gap-x-4 gap-y-2">
                    <legend class="sr-only">Esquema de cores</legend>
                    <span class="text-xs text-[var(--text-2)]" aria-hidden="true">Do seu jeito</span>
                    <div class="flex flex-wrap justify-end gap-1">
                        @foreach (['auto' => 'Automático', 'light' => 'Claro', 'dark' => 'Escuro', 'dim' => 'Suave', 'grape' => 'Uva', 'choco' => 'Chocolate'] as $theme => $label)
                            <div>
                                <input class="peer sr-only" type="radio" id="theme-{{ $theme }}" name="theme" value="{{ $theme }}" @checked($theme === 'auto')>
                                <label for="theme-{{ $theme }}" class="inline-flex min-h-8 cursor-pointer items-center rounded-full border border-transparent px-2.5 py-1.5 text-[11px] font-medium text-[var(--text-2)] transition-colors hover:border-[var(--line)] peer-checked:bg-[var(--text-1)] peer-checked:text-[var(--surface-1)] peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-[var(--text-1)]">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
            </form>

            <div class="flex flex-1 items-center justify-center py-8">
                <div class="w-full max-w-2xl">
                    <p class="mb-5 inline-flex items-center gap-2.5 text-[10px] font-semibold tracking-[0.18em] text-[var(--accent-text)] uppercase sm:text-xs"><span class="size-2 rounded-full bg-[var(--accent-text)]" aria-hidden="true"></span>Organize seu cuidado</p>
                    <h1 id="local-title" class="text-4xl leading-[1.05] font-medium tracking-[-0.06em] sm:text-5xl">Cadastre um<br><span class="text-[var(--accent-text)]">novo local.</span></h1>
                    <p class="mt-5 max-w-lg text-base leading-7 text-[var(--text-2)]">Registre espaços e pontos de atenção para manter o cuidado com a água mais próximo da rotina.</p>

                    <div class="mt-8 grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="nome" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Nome do local</label>
                            <input type="text" id="nome" name="nome" required placeholder="Ex.: Cozinha principal" class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 text-base text-[var(--text-1)] transition placeholder:text-[var(--text-2)] focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                        </div>
                        <div>
                            <label for="setor" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Setor</label>
                            <input type="text" id="setor" name="setor" required placeholder="Ex.: Operações" class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 text-base text-[var(--text-1)] transition placeholder:text-[var(--text-2)] focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                        </div>
                        <div>
                            <label for="tipo" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Tipo de local</label>
                            <select id="tipo" name="tipo" required class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 text-base text-[var(--text-1)] transition focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                                <option value="" selected disabled>Selecione um tipo</option>
                                <option value="residencial">Residencial</option>
                                <option value="comercial">Comercial</option>
                                <option value="publico">Público</option>
                                <option value="industrial">Industrial</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div>
                            <label for="status" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Status</label>
                            <select id="status" name="status" required class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 text-base text-[var(--text-1)] transition focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                                <option value="1" selected>Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="descricao" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Descrição <span class="font-normal text-[var(--text-2)]">(opcional)</span></label>
                            <textarea id="descricao" name="descricao" rows="4" placeholder="Adicione detalhes que ajudem a identificar este local..." class="w-full resize-y rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 py-3 text-base text-[var(--text-1)] transition placeholder:text-[var(--text-2)] focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm"></textarea>
                        </div>
                    </div>

                    <button id="cadastro_local" type="button" class="group mt-7 flex h-12 w-full cursor-pointer items-center justify-center gap-3 rounded-full bg-[var(--brand)] px-4 text-sm font-semibold text-[var(--on-brand)] transition hover:brightness-95 focus-visible:ring-4 focus-visible:ring-[var(--brand)]/30"><span>Salvar local</span><svg class="size-4 transition-transform motion-safe:group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" /></svg></button>
                </div>
            </div>

            <footer class="mt-6 text-center text-xs text-[var(--text-2)]">&copy; {{ date('Y') }} AquaControll. Cada gota conta.</footer>
        </section>

        <aside class="local-panel relative hidden overflow-hidden px-10 py-12 lg:flex lg:flex-col xl:px-20" aria-labelledby="brand-title">
            <div class="pointer-events-none absolute -top-40 -right-40 size-[520px] rounded-full border border-white/10" aria-hidden="true"><div class="absolute inset-12 rounded-full border border-white/10"></div><div class="absolute inset-24 rounded-full border border-white/10"></div></div>
            <div class="relative inline-flex items-center gap-2.5 self-start rounded-full border border-white/25 px-4 py-2 text-[10px] font-medium tracking-[0.16em] uppercase"><span class="size-1.5 rounded-full bg-cyan-200" aria-hidden="true"></span>Dados que fazem diferença</div>
            <div class="relative my-auto py-16"><span class="mb-7 block text-xs font-medium tracking-[0.2em] text-cyan-200 uppercase">Cada espaço conta uma história.</span><h2 id="brand-title" class="max-w-lg text-[3.5rem] leading-[1.08] font-medium tracking-[-0.045em] xl:text-[4rem]">Conheça<br>seus<br><span class="text-cyan-200">pontos de cuidado.</span></h2><p class="mt-7 max-w-sm text-base leading-7 text-cyan-100">Com os locais organizados, fica mais simples observar, agir e reduzir desperdícios onde eles acontecem.</p></div>
            <figure class="relative max-w-lg border-t border-white/20 pt-8"><svg class="mb-4 h-8 w-7 text-cyan-200" viewBox="0 0 32 40" fill="currentColor" aria-hidden="true"><path d="M16 2C13 7 3 17 3 25a13 13 0 0 0 26 0C29 17 19 7 16 2Z" /></svg><blockquote class="text-lg leading-8 font-medium">“Quando sabemos onde olhar, cada ação pode cuidar melhor.”</blockquote><figcaption class="mt-5 flex items-center gap-3 text-xs text-cyan-200"><span class="h-px w-6 bg-cyan-300" aria-hidden="true"></span>Feito para quem transforma</figcaption></figure>
        </aside>
    </main>
</body>

</html>
