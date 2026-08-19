{{-- Footer para pessoas não autenticadas --}}
<footer id="footer-guest" class="footer-guest relative mt-12 w-full overflow-hidden text-white" x-data="{ showTerms: false }">
    <div class="relative mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid gap-8 md:grid-cols-4">
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full border border-white/20 bg-white/5 backdrop-blur-sm">
                        <span class="text-lg font-bold text-white">M</span>
                    </div>
                    <div>
                        <p class="text-xl font-semibold tracking-wide text-white">Mini Koncili</p>
                        <p class="text-xs uppercase tracking-[0.25em] text-white/60">Financeiro</p>
                    </div>
                </div>

                <p class="max-w-xs text-sm leading-6 text-white/75">
                    Soluções para conciliar vendas, repasses e movimentações com mais clareza, segurança e agilidade.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-white/70">
                    Redes sociais
                </h3>
                <ul class="space-y-3 text-sm text-white/80">
                    <li>
                        <a href="https://www.instagram.com/wagner_da_silva_junior67/" target="_blank" rel="noopener noreferrer" class="footer-guest__social-link">
                            Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/wagner-da-silva-junior/" target="_blank" rel="noopener noreferrer" class="footer-guest__social-link">
                            LinkedIn
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/ELTAILS" target="_blank" rel="noopener noreferrer" class="footer-guest__social-link">
                            GitHub
                        </a>
                    </li>
                    <li>
                        <a href="https://gitlab.com/ELTAILS" target="_blank" rel="noopener noreferrer" class="footer-guest__social-link">
                            GitLab
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-white/70">
                    Contato
                </h3>
                <ul class="space-y-3 text-sm text-white/80">
                    <li>
                        <a href="mailto:wagner.discord368@gmail.com" class="transition-colors duration-200 hover:text-white" target="_blank" rel="noopener noreferrer">
                            wagner.discord368@gmail.com
                        </a>
                    </li>
                    <li class="pt-2 text-base font-semibold text-white">
                        Mini Koncili
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-[0.25em] text-white/70">
                    Navegação
                </h3>
                <ul class="space-y-3 text-sm text-white/80">
                    <li>
                        <a href="/" class="transition-colors duration-200 hover:text-white">
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="/login" class="transition-colors duration-200 hover:text-white">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="/register" class="transition-colors duration-200 hover:text-white">
                            Cadastro
                        </a>
                    </li>
                    <li>
                        <a href="#" class="transition-colors duration-200 hover:text-white" @click.prevent="showTerms = true">
                            Termos de uso
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{--Modal de termos de uso--}}
        <div x-show="showTerms" x-cloak>
            <x-termos-de-uso />
        </div>

        <div class="mt-10 border-t border-white/15 pt-6">
            <div class="flex flex-col gap-3 text-sm text-white/70 sm:flex-row sm:items-center sm:justify-between">
                <p>© {{ date('Y') }} Mini Koncili. Todos os direitos reservados.</p>
                <a href="#" class="font-medium text-white transition-colors duration-200 hover:text-white/80" @click.prevent="showTerms = true">
                    Termos de uso
                </a>
            </div>
        </div>
    </div>
</footer>
