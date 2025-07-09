<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>

<section class="relative ">
        <img src="{{ asset('frontend/images/a2.jpg') }}" alt="About Us Background"
            class="w-full h-[85vh] object-cover">
        <div class="absolute inset-0 bg-black opacity-40"></div>
       <div class="absolute left-1/2 top-[70%] transform -translate-x-1/2 -translate-y-1/2 z-10 text-center">
    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 text-white">  
   Sobre nós
    </h1>
</div>


    </section>

     <section class="flex justify-center items-center min-h-[697px] bg-white py-8 sm:py-5">
    <div class="w-full max-w-[1820px] flex flex-col md:flex-row items-center justify-center rounded-lg overflow-hidden">
        
        <!-- Image Side -->
        <div class="md:w-1/2 w-full h-[350px] md:h-[697px] px-4 lg:px-8">
            <img src="{{ asset('frontend/images/a1.jpg') }}" alt="Beautiful Design"
                class="w-full h-full object-cover rounded-xl">
        </div>

        <!-- Content Side -->
        <div class="md:w-1/2 max-w-[1828px] w-full flex flex-col mb-8 md:mb-16 justify-start items-center md:items-start p-10 bg-gradient-to-br from-white to-gray-100">
            <h1 class="text-2xl md:text-4xl text-black mb-6 text-left">Tudo começou com uma ideia simples durante um treino</h1>
            <p class="text-lg md:text-xl text-black mb-4 text-left">
               Depois de anos a frequentar o ginásio diariamente, percebemos que faltava algo no mercado: roupa que fosse realmente pensada para quem leva o treino a sério — que combinasse conforto, estilo, durabilidade e que também representasse a mentalidade de quem vive este estilo de vida.
               <br/>
               <br/>
               A ideia surgiu entre conversas no pós-treino, com o corpo cansado mas a mente cheia de energia:"E se criássemos uma marca que realmente entendesse a linguagem do ginásio?"Não queríamos apenas mais uma marca. Queríamos construir algo com identidade, com propósito, com garra.
               <br/>
               <br/>
               Começámos com esboços simples, a testar tecidos, a falar com pequenas oficinas de produção, a errar e a ajustar. Cada peça foi criada com atenção ao detalhe, pensando em quem dá tudo no treino — e também fora dele<br/><br/> A Nossa Missão <br/>Queremos inspirar uma comunidade de pessoas que valorizam o esforço, a disciplina e a superação. Acreditamos que o que vestes pode ser uma extensão da tua mentalidade — e que o teu compromisso contigo mesmo merece roupa à altura.<br/><br/>Produção com Propósito <br/>Cada peça é produzida com cuidado, em quantidades controladas, para garantir qualidade, durabilidade e menor desperdício. Trabalhamos com fábricas locais que seguem padrões éticos de produção, respeitando quem faz e quem usa.<br/><br/> Valorizamos a produção consciente e estamos constantemente a procurar materiais e soluções mais sustentáveis, sem comprometer a performance.<br/><br/>Esta marca é para quem vive com garra. Para quem entende que o verdadeiro progresso vem da consistência.<br/><br/>Bem-vindo à nossa história — e obrigado por fazer parte dela. </p>
        </div>

    </div>
</section>


  

</x-frontend::layout>
