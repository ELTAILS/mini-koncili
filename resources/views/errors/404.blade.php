<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Erro 404</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-100 font-sans text-slate-900 antialiased">
        <main class="flex min-h-screen items-center justify-center p-6">
            <div class="w-full max-w-xl rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-xl shadow-slate-200/80">
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-amber-100 text-4xl shadow-inner shadow-amber-200/80">
                    🔎
                </div>

                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-amber-500">Erro 404</p>
                <h1 class="mt-4 text-4xl font-bold text-slate-900">Página não encontrada</h1>
                <p class="mt-4 text-base leading-7 text-slate-600">
                    O endereço acessado não existe ou foi movido. Confira a URL ou volte para a página inicial.
                </p>

                <a href="/" class="mt-8 inline-flex items-center justify-center rounded-xl bg-brand-primary px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2">
                    Voltar para o início
                </a>
            </div>
        </main>
    </body>
</html>
