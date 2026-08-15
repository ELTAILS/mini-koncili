{{-- Footer para pessoas autenticadas --}}
<footer id="footer-auth" class="footer-auth mt-10 w-full text-white" x-data="{ showTerms: false }">
    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="grid gap-8 md:grid-cols-[1.5fr_1fr_1fr_1fr]">
            <div class="space-y-4">
                <h2 class="text-3xl font-black tracking-tight text-white sm:text-4xl">
                    Mini Koncili
                </h2>

                <p class="max-w-xs text-sm leading-6 text-slate-300">
                    Soluções para conciliar vendas, repasses e movimentações com mais clareza, segurança e agilidade.
                </p>
            </div>

            <div>
                <h3 class="mb-4 text-base font-semibold uppercase tracking-[0.24em] text-white/80">
                    Navegação
                </h3>

                <ul class="space-y-3 text-sm text-slate-300">
                    <li><a href="{{route('dashboard')}}" class="transition-colors duration-200 hover:text-white">Dashboard</a></li>
                    <li><a href="{{route('sales')}}" class="transition-colors duration-200 hover:text-white">Vendas</a></li>
                    <li><a href="{{route('transfers')}}" class="transition-colors duration-200 hover:text-white">Transfêrencias</a></li>
                    <li><a href="{{route('reconciliation')}}" class="transition-colors duration-200 hover:text-white">Reconciliação</a></li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-base font-semibold uppercase tracking-[0.24em] text-white/80">
                    Informação
                </h3>

                <ul class="space-y-3 text-sm text-slate-300">
                    <li>+55 (11) 4002-8922</li>
                    <li>contato@mini-koncili.com.br</li>
                    <li>Rua ipiranga, 1234 - Paraná/Pr</li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-base font-semibold uppercase tracking-[0.24em] text-white/80">
                    Horário de funcionamento
                </h3>

                <ul class="space-y-3 text-sm text-slate-300">
                    <li>Segunda - terça: 8:00 - 17:00</li>
                    <li>Quarta - quinta: 8:00 - 17:00</li>
                    <li>Sexta: 8:00 - 17:00</li>
                    <li>Sábado: 8:00 - 12:00</li>
                    <li>Domingo: fechado</li>
                </ul>
            </div>
        </div>

        <div class="mt-10 border-t border-white/10 pt-6 text-center text-sm text-slate-300">
            <p>
                Copyright {{ date('Y') }} Todos os direitos reservados. Desenvolvido por <a href="https://github.com/ELTAILS" target="_blank" rel="noopener noreferrer" class="font-semibold text-white hover:underline">Wagner Junior</a>.
            </p>
        </div>

        <div class="mt-6 flex justify-center gap-4 text-white">
            <a href="#" aria-label="Facebook" class="footer-auth__social-link">
                <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true">
                    <path d="M13.5 22v-8h2.7l.4-3h-3.1V7.5c0-.9.3-1.5 1.6-1.5H17V3.1c-.3 0-1.3-.1-2.4-.1-2.4 0-4.1 1.5-4.1 4.2V11H8v3h2.5v8h3Z"/>
                </svg>
            </a>
            <a href="#" aria-label="Twitter" class="footer-auth__social-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                    <path d="M453.2 112L523.8 112L369.6 288.2L551 528L409 528L297.7 382.6L170.5 528L99.8 528L264.7 339.5L90.8 112L236.4 112L336.9 244.9L453.2 112zM428.4 485.8L467.5 485.8L215.1 152L173.1 152L428.4 485.8z"/>
                </svg>
            </a>
            <a href="#" aria-label="Instagram" class="footer-auth__social-link">
                <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true">
                    <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3.2A4.8 4.8 0 1 1 7.2 12 4.8 4.8 0 0 1 12 7.2Zm0 2A2.8 2.8 0 1 0 14.8 12 2.8 2.8 0 0 0 12 9.2Zm5.2-3.1a1.1 1.1 0 1 1-1.1 1.1 1.1 1.1 0 0 1 1.1-1.1Z"/>
                </svg>
            </a>
            <a href="#" aria-label="LinkedIn" class="footer-auth__social-link">
                <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true">
                    <path d="M6.9 8.4A1.8 1.8 0 1 1 6.9 4a1.8 1.8 0 0 1 0 4.4ZM5.2 9.8h3.4V20H5.2V9.8Zm5.8 0h3.2v1.4h.1c.5-.9 1.6-1.9 3.3-1.9 3.5 0 4.2 2.3 4.2 5.3V20h-3.4v-18.7c0-1.3-.1-3-1.8-3-1.8 0-2.1 1.4-2.1 2.9V20h-3.5V9.8Z"/>
                </svg>
            </a>
        </div>

        <div class="mt-7 flex justify-center">
            <a href="#" @click.prevent="showTerms = true" class="footer-auth__badge rounded transition-all duration-500 hover:scale-110">Termos de uso</a>
        </div>

        {{--Modal de termos de uso--}}
        <div x-show="showTerms" x-cloak>
            <x-termos-de-uso />
        </div>
    </div>
</footer>
