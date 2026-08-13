{{--Aqui ficar o termos de uso--}}
<div
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4"
>
    <div class="w-full max-w-2xl rounded-xl bg-white shadow-2xl">

        {{-- Cabeçalho --}}
        <div class="flex items-center justify-between border-b p-5">
            <h2 class="text-xl font-bold text-gray-800">
                Termos de uso
            </h2>

            <button
                type="button"
                @click="showTerms = false"
                class="text-2xl text-gray-500 hover:text-gray-800"
            >
                &times;
            </button>
        </div>

        {{-- Conteúdo --}}
        <div class="max-h-[60vh] overflow-y-auto p-5 text-gray-700">
            {{--Sobre o mini koncili--}}
            <p>
                O <strong>Mini Koncili</strong> é um serviço que oferece uma plataforma para facilitar a conciliação de contas e transações financeiras. Tendo um foco em fornecer uma experiência segura e eficiente para os usuários, garantindo que suas informações financeiras sejam tratadas com confidencialidade e integridade.
            </p>

            {{-- Regras do mini Koncili --}}
            <p class="mt-4">
                Os usuários do <strong>Mini Koncili</strong> devem seguir as seguintes regras:
            </p>
            <ul class="mt-2 list-disc pl-5 text-sm">
                <li>1. Manter suas credenciais de acesso em sigilo;</li>
                <li>2. Não compartilhar suas credenciais com terceiros;</li>
                <li>3. Utilizar o serviço apenas para fins legítimos;</li>
                <li>4. Respeitar os direitos autorais e propriedade intelectual dos materiais disponíveis no serviço.</li>
            </ul>

            {{-- Limitação de responsabilidade --}}
            <p class="mt-4">
                O <strong>Mini Koncili</strong> não se responsabiliza por quaisquer perdas ou danos decorrentes do uso do serviço, incluindo, mas não se limitando a, perda de dados, interrupção do serviço, ou qualquer outro tipo de prejuízo financeiro. O serviço é fornecido "no estado em que se encontra" e sem garantias de qualquer tipo, expressas ou implícitas.
            </p>
            {{--Mudanças nos termos de uso--}}
            <p class="mt-4">
                O <strong>Mini Koncili</strong> reserva-se o direito de modificar estes termos de uso a qualquer momento. As alterações serão comunicadas aos usuários através do serviço, e o uso continuado do serviço após tais alterações constitui aceitação dos novos termos.
            </p>
            {{--Projeto academico--}}
            <p class="mt-4">
                O <strong>Mini Koncili</strong> é um projeto acadêmico desenvolvido com o objetivo de fornecer uma solução prática e educativa para a conciliação de contas e transações financeiras. O serviço é oferecido como uma ferramenta de aprendizado e não deve ser considerado como um substituto para aconselhamento financeiro profissional. Os usuários são incentivados a buscar orientação de profissionais qualificados para quaisquer decisões financeiras importantes.
            </p>
        </div>

        {{-- Rodapé do modal --}}
        <div class="flex justify-end border-t p-4">
            <button
                type="button"
                @click="showTerms = false"
                class="rounded-lg bg-gray-800 px-4 py-2 text-white"
            >
                Fechar
            </button>
        </div>

    </div>
</div>
