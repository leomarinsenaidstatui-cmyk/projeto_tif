<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#80DEEA">
    <meta name="description" content="Entre no AquaControll e continue cuidando de cada gota.">
    <title>Entrar | AquaControll</title>
    @fonts
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/login.js'])

    <style>
        :root {
            --primary: #0dcaf0;
            --primary-dark: #0a8bb9;
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

        .login-page {
            background: var(--surface-1);
            color: var(--text-1);
        }

        .login-page a:focus-visible,
        .login-page button:focus-visible,
        .login-page input:focus-visible {
            outline: 2px solid var(--text-1);
            outline-offset: 4px;
        }

        .login-panel {
            background: var(--panel);
            color: var(--text-light);
        }
    </style>
</head>

<body class="login-page min-h-dvh font-sans antialiased">
    <a href="#conteudo" class="sr-only fixed top-4 left-4 z-50 rounded-lg bg-[var(--text-1)] px-5 py-3 text-[var(--surface-1)] focus:not-sr-only">Pular para o conteúdo</a>

    <main id="conteudo" class="mx-auto grid min-h-dvh w-full max-w-7xl lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]">
        <section class="flex min-h-dvh flex-col px-5 py-6 sm:px-8 lg:px-12" aria-labelledby="login-title">
            <header class="flex items-center justify-between gap-4 border-b border-[var(--line)] pb-5">
                <a href="{{ route('boas-vindas') }}" class="inline-flex items-center gap-2.5 rounded-lg" aria-label="AquaControll — página inicial">
                    <svg class="h-9 w-7 text-[var(--accent-text)]" viewBox="0 0 32 40" fill="none" aria-hidden="true"><path d="M16 2C13 7 3 17 3 25a13 13 0 0 0 26 0C29 17 19 7 16 2Z" fill="currentColor" /><path d="M7 25c4-4 7 4 11 0s6-3 7-2" stroke="var(--surface-1)" stroke-width="2" stroke-linecap="round" /></svg>
                    <span class="text-xl tracking-[-0.055em]"><span class="font-semibold">Aqua</span>Controll<span class="text-[var(--accent-text)]">.</span></span>
                </a>
                <a href="{{ route('boas-vindas') }}" class="text-sm font-medium text-[var(--text-2)] underline decoration-[var(--line)] underline-offset-4 hover:text-[var(--text-1)]">Voltar</a>
            </header>

         

            <div class="flex flex-1 items-center justify-center py-10">
                <div class="w-full max-w-md">
                    <p class="mb-5 inline-flex items-center gap-2.5 text-[10px] font-semibold tracking-[0.18em] text-[var(--accent-text)] uppercase sm:text-xs"><span class="size-2 rounded-full bg-[var(--accent-text)]" aria-hidden="true"></span>Seu espaço de cuidado</p>
                    <h1 id="login-title" class="text-4xl leading-[1.05] font-medium tracking-[-0.06em] sm:text-5xl">Bem-vindo<br><span class="text-[var(--accent-text)]">de volta.</span></h1>
                    <p class="mt-5 max-w-sm text-base leading-7 text-[var(--text-2)]">Entre para acompanhar suas ações e continuar fazendo a diferença, uma gota de cada vez.</p>

                    <form id="login-form" action="{{ url('/api/login') }}" method="POST" class="mt-8 space-y-5">
                        @csrf
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-[var(--text-1)]">E-mail</label>
                            <input type="email" id="email" name="email" autocomplete="username" inputmode="email" autocapitalize="none" spellcheck="false" required placeholder="voce@exemplo.com" class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 text-base text-[var(--text-1)] transition placeholder:text-[var(--text-2)] focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                        </div>
                        <div>
                            <label for="senha" class="mb-2 block text-sm font-medium text-[var(--text-1)]">Senha</label>
                            <div class="relative">
                                <input type="password" id="senha" name="senha" autocomplete="current-password" required placeholder="Digite sua senha" class="h-12 w-full rounded-lg border border-[var(--line)] bg-[var(--surface-3)] px-4 pr-12 text-base text-[var(--text-1)] transition placeholder:text-[var(--text-2)] focus:border-[var(--accent-text)] focus:bg-transparent focus:outline-none sm:text-sm">
                                <button type="button" id="toggle-password" aria-label="Mostrar senha" aria-controls="senha" aria-pressed="false" class="absolute top-1/2 right-1 flex size-10 -translate-y-1/2 cursor-pointer items-center justify-center rounded-lg text-[var(--text-2)] transition hover:text-[var(--accent-text)]">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke-linejoin="round" /><circle cx="12" cy="12" r="3" /><path id="password-slash" d="m3 3 18 18" class="hidden" stroke-linecap="round" /></svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-2 text-[13px]">
                            <label for="lembrar" class="inline-flex cursor-pointer items-center gap-2 text-[var(--text-2)]"><input type="checkbox" id="lembrar" name="lembrar" aria-describedby="remember-description" class="size-4 cursor-pointer rounded border-[var(--line)] accent-[var(--accent-text)]">Lembrar meu e-mail</label>
                            <span id="remember-description" class="sr-only">Lembra apenas seu e-mail neste dispositivo.</span>
                            <a href="#recuperar-senha" data-auth-help="password" aria-haspopup="dialog" class="rounded font-medium text-[var(--accent-text)] hover:underline">Esqueceu a senha?</a>
                        </div>
                        <button type="button" id="entrar" class="group flex h-12 w-full cursor-pointer items-center justify-center gap-3 rounded-full bg-[var(--brand)] px-4 text-sm font-semibold text-[var(--on-brand)] transition hover:brightness-95 focus-visible:ring-4 focus-visible:ring-[var(--brand)]/30 disabled:cursor-wait disabled:opacity-70"><span id="login-button-label">Entrar na minha conta</span><svg class="size-4 transition-transform motion-safe:group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M5 12h14m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round" /></svg></button>
                        <p id="login-feedback" role="status" aria-live="polite" aria-atomic="true" hidden class="rounded-lg border p-3 text-sm leading-6 data-[state=error]:border-red-300 data-[state=error]:text-red-700 data-[state=success]:border-green-300 data-[state=success]:text-green-800"></p>
                    </form>

                    <p class="mt-8 text-center text-sm text-[var(--text-2)]">Ainda não faz parte? <a href="{{ url('/cadastro_usuario') }}" class="font-semibold text-[var(--accent-text)] hover:underline">Cadastre-se</a></p>
                    <noscript><p class="mt-4 text-sm text-red-700">Ative o JavaScript no navegador para entrar na sua conta.</p></noscript>
                </div>
            </div>
            <footer class="mt-6 text-center text-xs text-[var(--text-2)]">&copy; {{ date('Y') }} AquaControll. Cada gota conta.</footer>
        </section>

        <aside class="login-panel relative hidden overflow-hidden px-10 py-12 lg:flex lg:flex-col xl:px-20" aria-labelledby="brand-title">
            <div class="pointer-events-none absolute -top-40 -right-40 size-[520px] rounded-full border border-white/10" aria-hidden="true"><div class="absolute inset-12 rounded-full border border-white/10"></div><div class="absolute inset-24 rounded-full border border-white/10"></div></div>
            <div class="relative inline-flex items-center gap-2.5 self-start rounded-full border border-white/25 px-4 py-2 text-[10px] font-medium tracking-[0.16em] uppercase"><span class="size-1.5 rounded-full bg-cyan-200" aria-hidden="true"></span>Tecnologia a favor da água</div>
            <div class="relative my-auto py-16"><span class="mb-7 block text-xs font-medium tracking-[0.2em] text-cyan-200 uppercase">Mais consciência. Menos desperdício.</span><h2 id="brand-title" class="max-w-lg text-[3.5rem] leading-[1.08] font-medium tracking-[-0.045em] xl:text-[4rem]">Cada gota<br>conta.<br><span class="text-cyan-200">O futuro também.</span></h2><p class="mt-7 max-w-sm text-base leading-7 text-cyan-100">O AquaControll aproxima tecnologia e cuidado com a água para transformar pequenas atitudes em um futuro mais sustentável.</p></div>
            <figure class="relative max-w-lg border-t border-white/20 pt-8"><svg class="mb-4 h-8 w-7 text-cyan-200" viewBox="0 0 32 40" fill="currentColor" aria-hidden="true"><path d="M16 2C13 7 3 17 3 25a13 13 0 0 0 26 0C29 17 19 7 16 2Z" /></svg><blockquote class="text-lg leading-8 font-medium">“Cuidar da água hoje é cuidar de todos os nossos amanhãs.”</blockquote><figcaption class="mt-5 flex items-center gap-3 text-xs text-cyan-200"><span class="h-px w-6 bg-cyan-300" aria-hidden="true"></span>Feito para quem transforma</figcaption></figure>
        </aside>
    </main>

    <dialog id="auth-help-dialog" aria-labelledby="auth-help-title" aria-describedby="auth-help-description" class="m-auto w-[calc(100%_-_3rem)] max-w-sm rounded-2xl border border-[var(--line)] bg-[var(--surface-1)] p-6 text-[var(--text-1)] shadow-xl backdrop:bg-slate-950/40 backdrop:backdrop-blur-sm"><h2 id="auth-help-title" class="text-xl font-semibold tracking-tight"></h2><p id="auth-help-description" class="mt-3 text-sm leading-6 text-[var(--text-2)]"></p><form method="dialog" class="mt-6"><button class="h-11 w-full cursor-pointer rounded-full bg-[var(--brand)] px-4 text-sm font-semibold text-[var(--on-brand)] hover:brightness-95">Entendi</button></form></dialog>
</body>

</html>
