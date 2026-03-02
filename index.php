<?php $posts = json_decode(@file_get_contents('posts.json'), true) ?: []; ?>
<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>efe • Gestão Inteligente. Lucro Real.</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap');
        :root { --bg: #05070A; --accent: #7C5CFF; }
        body { background: var(--bg); color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.05); }
        .text-gradient { background: linear-gradient(135deg, #fff, var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        h1, h2 { word-break: break-word; }
        .swiper-pagination-bullet { background: #fff !important; }
    </style>
</head>
<body>

    <nav class="fixed w-full z-50 glass py-3 px-4 md:px-10 flex justify-between items-center">
        <a href="#home"><img src="assets/logo-branco.png" alt="efe Logo" class="h-7 md:h-10"></a> <div class="hidden lg:flex gap-6 text-[9px] font-bold uppercase tracking-[0.2em] text-gray-400">
            <a href="#blog" class="hover:text-white transition">Blog</a>
            <a href="#manifesto" class="hover:text-white transition">Manifesto</a>
            <a href="#diferencial" class="hover:text-white transition">Diferencial</a>
            <a href="#servicos" class="hover:text-white transition">Serviços</a>
            <a href="#abordagem" class="hover:text-white transition">Abordagem</a>
            <a href="#cases" class="hover:text-white transition">Cases</a>
        </div>
        <a href="https://wa.me/5535991531100" target="_blank" class="bg-white text-black px-4 py-2 rounded-full text-[9px] font-bold hover:bg-purple-600 hover:text-white transition-all uppercase">WhatsApp</a> </nav>

    <section id="home" class="min-h-screen flex flex-col justify-center items-center text-center px-6 pt-20">
        <div class="tag mb-6 border border-white/10 px-3 py-1 rounded-full text-[9px] font-bold text-purple-400 uppercase tracking-widest" data-aos="fade-down">Consultoria e Assessoria Empresarial</div>
        <h1 class="text-4xl md:text-8xl font-800 leading-tight mb-8" data-aos="zoom-out">GESTÃO <span class="text-gradient italic">INTELIGENTE.</span><br>LUCRO REAL.</h1>
        <p class="max-w-xl text-gray-400 text-sm md:text-lg mb-10 italic">Experiência de auditor, visão de dono: seu braço forte na gestão pré-contábil.</p>
        
        <div class="grid grid-cols-3 gap-3 w-full max-w-2xl px-4" data-aos="fade-up">
            <div class="glass p-4 rounded-2xl text-center"><span class="block text-xl font-bold text-purple-500">20 Anos</span><p class="text-[8px] text-gray-500 uppercase font-bold">Gestão</p></div>
            <div class="glass p-4 rounded-2xl text-center"><span class="block text-xl font-bold text-emerald-400">10 Anos</span><p class="text-[8px] text-gray-500 uppercase font-bold">Empresário</p></div>
            <div class="glass p-4 rounded-2xl text-center"><span class="block text-xl font-bold text-blue-400">03 Anos</span><p class="text-[8px] text-gray-500 uppercase font-bold">Auditoria</p></div>
        </div>
    </section>

    <section id="blog" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-2xl md:text-4xl font-800 mb-12 uppercase italic text-center">Últimos Insights</h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach(array_slice($posts, 0, 6) as $key => $post): ?>
                <div class="swiper-slide glass rounded-[30px] overflow-hidden p-3 h-full">
                    <div class="relative rounded-[20px] overflow-hidden mb-4 h-40">
                        <?php if(!empty($post['video'])): ?>
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white text-3xl"><i class="fa-solid fa-play"></i></div>
                        <?php endif; ?>
                        <img src="<?= $post['foto'] ?>" class="w-full h-full object-cover opacity-80">
                    </div>
                    <h3 class="text-base font-bold px-2 mb-3 leading-tight"><?= $post['titulo'] ?></h3>
                    <div class="px-2 pb-2 text-center"><a href="post.php?id=<?= $key ?>" class="text-emerald-400 font-bold uppercase text-[9px] tracking-widest border-b border-emerald-400">Ler Conteúdo</a></div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination !-bottom-10"></div>
        </div>
    </section>

    <section id="manifesto" class="py-24 px-6 max-w-4xl mx-auto" data-aos="fade-up">
        <div class="glass p-8 md:p-12 rounded-[40px] text-center border-white/5">
            <h2 class="text-2xl font-800 mb-8 italic uppercase text-gradient">Manifesto</h2>
            <ul class="space-y-6 text-gray-400 text-sm text-left max-w-2xl mx-auto italic">
                <li>• <b>Dados não têm lado:</b> compromisso com a saúde do CNPJ.</li>
                <li>• <b>Transparência Radical:</b> relatórios são a fotografia da realidade.</li>
                <li>• <b>Parceria:</b> o consultor propõe, o líder decide.</li>
                <li>• Não serei pago para dizer o que você quer ouvir, mas o que você precisa saber para não quebrar.</li>
            </ul>
        </div>
    </section>

    <section id="diferencial" class="py-24 px-6 bg-white/[0.02]">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-2xl font-800 mb-12 uppercase italic">Pré-contábil vs Contábil</h2>
            <div class="grid md:grid-cols-2 gap-6 text-left">
                <div class="glass p-6 rounded-3xl border-l-4 border-gray-600">
                    <h4 class="text-xs font-bold mb-3 uppercase text-gray-500">Contador (Compliance)</h4>
                    <p class="text-[10px] text-gray-500 italic">Registra fatos passados e garante conformidade legal.</p>
                </div>
                <div class="glass p-6 rounded-3xl border-l-4 border-emerald-500">
                    <h4 class="text-xs font-bold mb-3 uppercase text-emerald-400">Consultor Pré-Contábil (Lucro)</h4>
                    <p class="text-[10px] text-gray-500 italic">Organiza processos e evita desperdícios antes do fato acontecer.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="servicos" class="py-24 px-6 max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-800 mb-12 uppercase">Nossas Frentes</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="glass p-6 rounded-3xl"><h3 class="font-bold text-xs mb-3 text-purple-400 uppercase tracking-widest">Financeiro</h3><p class="text-[8px] text-gray-500 uppercase">Custos e fluxo de caixa.</p></div>
            <div class="glass p-6 rounded-3xl"><h3 class="font-bold text-xs mb-3 text-emerald-400 uppercase tracking-widest">RH</h3><p class="text-[8px] text-gray-500 uppercase">Gestão e treinamento.</p></div>
            <div class="glass p-6 rounded-3xl"><h3 class="font-bold text-xs mb-3 text-purple-400 uppercase tracking-widest">Logística</h3><p class="text-[8px] text-gray-500 uppercase">Operações e estoque.</p></div>
            <div class="glass p-6 rounded-3xl"><h3 class="font-bold text-xs mb-3 text-emerald-400 uppercase tracking-widest">Tecnologia</h3><p class="text-[8px] text-gray-500 uppercase">Sistemas e segurança.</p></div>
        </div>
    </section>

    <section id="abordagem" class="py-24 px-6 bg-white/[0.02]">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl font-800 mb-12 uppercase italic text-gradient">A Implantação</h2>
            <div class="grid gap-4 text-left">
                <div class="glass p-5 rounded-2xl flex gap-4 items-center border-l-4 border-purple-500">
                    <span class="text-xl font-black opacity-20 italic">01</span>
                    <div><h4 class="font-bold text-xs uppercase">Diagnóstico</h4><p class="text-[9px] text-gray-500 italic">Análise profunda do cenário atual.</p></div>
                </div>
                <div class="glass p-5 rounded-2xl flex gap-4 items-center border-l-4 border-emerald-500">
                    <span class="text-xl font-black opacity-20 italic">02</span>
                    <div><h4 class="font-bold text-xs uppercase">Planejamento</h4><p class="text-[9px] text-gray-500 italic">Objetivos claros e metas mensuráveis.</p></div>
                </div>
                <div class="glass p-5 rounded-2xl flex gap-4 items-center border-l-4 border-purple-500">
                    <span class="text-xl font-black opacity-20 italic">03</span>
                    <div><h4 class="font-bold text-xs uppercase">Execução</h4><p class="text-[9px] text-gray-500 italic">Acompanhamento contínuo e ajustes.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section id="cases" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-2xl font-800 mb-12 uppercase text-center italic">Cases de Sucesso</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="glass p-8 rounded-[40px] border-white/5">
                <span class="text-emerald-400 font-bold text-[10px] uppercase">Indústria</span>
                <h4 class="text-lg font-bold my-4 italic">Economia de R$ 180 mil/ano</h4>
                <p class="text-[10px] text-gray-500 italic leading-relaxed">Redução de rotatividade de 42% para 18% com margens mapeadas.</p>
            </div>
            <div class="glass p-8 rounded-[40px] border-white/5">
                <span class="text-purple-400 font-bold text-[10px] uppercase">Distribuidora</span>
                <h4 class="text-lg font-bold my-4 italic">Fluxo positivo em 90 dias</h4>
                <p class="text-[10px] text-gray-500 italic leading-relaxed">Reorganização pré-contábil e fim da confusão de contas.</p>
            </div>
            <div class="glass p-8 rounded-[40px] border-white/5">
                <span class="text-emerald-400 font-bold text-[10px] uppercase">Serviços TI</span>
                <h4 class="text-lg font-bold my-4 italic">Margem: 8% para 22%</h4>
                <p class="text-[10px] text-gray-500 italic leading-relaxed">Redução de 65% no retrabalho e otimização de lucro.</p>
            </div>
        </div>
    </section>

    <footer class="py-16 border-t border-white/5 px-6 bg-black/20 text-center">
        <div class="text-gray-500 text-[10px] uppercase tracking-[0.2em] mb-10 leading-relaxed">
            2026 &copy; EFE Consultoria e Assessoria Empresarial - 
            Powered by <a href="https://studiorsilhabela.com.br" target="_blank" class="text-white hover:text-purple-400 transition font-bold underline">STUDIO RS ILHABELA</a>
        </div>
        <a href="admin.php" class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-8 py-3 rounded-2xl text-[10px] font-bold text-gray-500 hover:text-white transition uppercase">ADMIN</a>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });
        new Swiper(".mySwiper", { slidesPerView: 1, spaceBetween: 20, pagination: { el: ".swiper-pagination", clickable: true }, breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } } });
    </script>
</body>
</html>