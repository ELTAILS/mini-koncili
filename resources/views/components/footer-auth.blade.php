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
                    <li>
                        <a href="https://github.com/ELTAILS" target="_blank" rel="noopener noreferrer" class="transition-colors duration-200 hover:text-white">
                            Github
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/wagner-da-silva-junior/" target="_blank" rel="noopener noreferrer" class="transition-colors duration-200 hover:text-white">
                            LinkedIn
                        </a>
                    </li>
                    <li>wagner.discord368@gmail.com</li>
                    <li>Maria Helena/umuarama - Paraná/Pr</li>
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
            <a href="https://gitlab.com/ELTAILS" aria-label="Facebook" class="footer-auth__social-link" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M568 268.6L567.3 266.8L497.6 85C496.2 81.4 493.7 78.4 490.4 76.4C488 74.8 485.3 73.9 482.4 73.6C479.5 73.3 476.7 73.7 474 74.7C471.3 75.7 468.9 77.4 466.9 79.5C465 81.6 463.6 84.2 462.8 86.9L415.8 230.9L225.3 230.9L178.2 86.9C177.4 84.1 176 81.6 174.1 79.5C172.1 77.4 169.7 75.8 167 74.7C164.4 73.7 161.5 73.3 158.6 73.6C155.7 73.9 153 74.8 150.6 76.4C147.4 78.4 144.8 81.5 143.4 85L73.8 266.8L73 268.6C63 294.8 61.7 323.6 69.5 350.6C77.2 377.5 93.5 401.3 115.9 418.2L116.2 418.4L116.8 418.8L222.8 498.3C261.3 527.4 289.5 548.6 307.4 562.2C311.1 564.1 315.7 566.5 320.4 566.5C325.1 566.5 329.7 564.1 333.4 562.2C351.3 548.7 379.5 527.3 418 498.3L524.7 418.4L525 418.1C547.4 401.2 563.7 377.5 570.6 350.6C579.2 323.6 578 294.8 568 268.6z"/></svg>
            </a>
            <a href="https://github.com/ELTAILS" aria-label="Twitter" class="footer-auth__social-link" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M266.1 392.7C266.1 413.6 255.2 447.8 229.4 447.8C203.6 447.8 192.7 413.6 192.7 392.7C192.7 371.8 203.6 337.6 229.4 337.6C255.2 337.6 266.1 371.8 266.1 392.7zM560 342.2C560 374.1 556.8 407.9 542.5 437.2C504.6 513.8 400.4 512 325.8 512C250 512 139.6 514.7 100.2 437.2C85.6 408.2 80 374.1 80 342.2C80 300.3 93.9 260.7 121.5 228.6C116.3 212.8 113.8 196.2 113.8 179.8C113.8 158.3 118.7 147.5 128.4 128C173.7 128 202.7 137 237.2 164C266.2 157.1 296 154 325.9 154C352.9 154 380.1 156.9 406.3 163.2C440.3 136.5 469.3 128 514.1 128C523.9 147.5 528.7 158.3 528.7 179.8C528.7 196.2 526.1 212.5 521 228C548.5 260.4 560 300.3 560 342.2zM495.7 392.7C495.7 348.8 469 310.1 422.2 310.1C403.3 310.1 385.2 313.5 366.2 316.1C351.3 318.4 336.4 319.3 321.1 319.3C305.9 319.3 291 318.4 276 316.1C257.3 313.5 239 310.1 220 310.1C173.2 310.1 146.5 348.8 146.5 392.7C146.5 480.5 226.9 494 296.9 494L345.1 494C415.4 494 495.7 480.6 495.7 392.7zM413.1 337.6C387.3 337.6 376.4 371.8 376.4 392.7C376.4 413.6 387.3 447.8 413.1 447.8C438.9 447.8 449.8 413.6 449.8 392.7C449.8 371.8 438.9 337.6 413.1 337.6z"/></svg>
            </a>
            <a href="https://www.instagram.com/wagner_da_silva_junior67/" aria-label="Instagram" class="footer-auth__social-link" target="_blank">
                <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current" aria-hidden="true">
                    <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3.2A4.8 4.8 0 1 1 7.2 12 4.8 4.8 0 0 1 12 7.2Zm0 2A2.8 2.8 0 1 0 14.8 12 2.8 2.8 0 0 0 12 9.2Zm5.2-3.1a1.1 1.1 0 1 1-1.1 1.1 1.1 1.1 0 0 1 1.1-1.1Z"/>
                </svg>
            </a>
            <a href="https://www.linkedin.com/in/wagner-da-silva-junior/" aria-label="LinkedIn" class="footer-auth__social-link" target="_blank">
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
