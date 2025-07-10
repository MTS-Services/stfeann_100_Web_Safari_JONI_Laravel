<x-frontend::layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="page_slug">home</x-slot>

    <section class="relative sm:w-full">
        <img src="{{ asset('frontend/images/Correr2.png') }}" alt="About Us Background"
            class="w-full lg:h-[450px] h-full object-cover ">
        <div class="absolute inset-0  opacity-40"></div>
        <div class="absolute left-1/2 top-[70%] transform -translate-x-1/2 -translate-y-1/2 z-10 text-center">
            <h1 class="xl:text-3xl sm:text-5xl md:text-6xl font-bold mb-4 text-white uppercase dark:text-white">
                Sobre nós
            </h1>
        </div>
    </section>

   <section class="flex justify-center items-center min-h-[697px] bg-white py-2 sm:py-2">
    <div class="w-full max-w-[1500px] flex flex-col md:flex-row items-center justify-center rounded-lg overflow-hidden">
        <!-- Image Side -->
        

        <!-- Content Side -->
        <div class="md:w-1/2 w-full h-[300px] sm:h-[400px] md:h-[550px] px-4 lg:px-8">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-semibold mb-4 text-text-primary dark:text-white">Tudo começou com uma ideia simples durante um treino.</h1>
            <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
                Depois de anos a frequentar o ginásio diariamente, percebemos que faltava algo no mercado: roupa que fosse realmente pensada para quem leva o treino a sério — que combinasse conforto, estilo, durabilidade e que também representasse a mentalidade de quem vive este estilo de vida.<br/><br/>
                A ideia surgiu entre conversas no pós-treino, com o corpo cansado mas a mente cheia de energia:"E se criássemos uma marca que realmente entendesse a linguagem do ginásio?"<br/>
                Não queríamos apenas mais uma marca. Queríamos construir algo com identidade, com propósito, com garra.Começámos com esboços simples, a testar tecidos, a falar com pequenas oficinas de produção, a errar e a ajustar.<br/> Cada peça foi criada com atenção ao detalhe, pensando em quem dá tudo no treino — e também fora dele.
            </p>
        </div>
        <div class="md:w-1/2 w-full h-[300px] sm:h-[400px] md:h-[550px] px-4 lg:px-8 ">
            <img src="{{ asset('frontend/images/a1.jpg') }}" alt="Beautiful Design"
                class="w-full h-full object-cover rounded-xl pb-4">
        </div>
    </div>
    </section>



<section class="flex justify-center items-center bg-white py-2 sm:py-2 sm:pb-20 ">
    <div class="w-full max-w-[1500px] flex flex-col md:flex-row items-center justify-center rounded-lg overflow-hidden gap-6 px-4">

        <!-- Left Side with 2 Cards -->
       <div class="md:w-1/2 w-full grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Card 1 -->
    <div class="bg-gray-100 p-4 sm:p-6 rounded-xl shadow-md">
        <h2 class="text-lg sm:text-xl font-semibold mb-2 text-text-primary dark:text-white">A Nossa Missão</h2>
        <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
            Queremos inspirar uma comunidade de pessoas que valorizam o esforço, a disciplina e a superação.
            Acreditamos que o que vestes pode ser uma extensão da tua mentalidade — e que o teu compromisso
            contigo mesmo merece roupa à altura.
        </p>
    </div>
    <!-- Card 2 -->
    <div class="bg-gray-100 p-4 sm:p-6 rounded-xl shadow-md">
        <h2 class="text-lg sm:text-xl font-semibold mb-2 text-text-primary dark:text-white">Produção com Propósito</h2>
        <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
            Cada peça é produzida com cuidado, em quantidades controladas, para garantir qualidade,
            durabilidade e menor desperdício. Trabalhamos com fábricas locais que seguem padrões éticos,
            respeitando quem faz e quem usa.
        </p>
    </div>
</div>


        <!-- Right Side with Full Card -->
        <div class="md:w-1/2 w-full flex flex-col justify-start items-center md:items-start p-6 sm:p-8 bg-gradient-to-br  rounded-xl ">
            <h2 class="text-lg sm:text-xl font-semibold mb-3 text-text-primary dark:text-white">Compromisso Sustentável</h2>
            <p class="text-base sm:text-lg text-gray-800 font-bold dark:text-white">
                Valorizamos a produção consciente e estamos constantemente a procurar materiais e soluções mais
                sustentáveis, sem comprometer a performance.<br><br>
                Esta marca é para quem vive com garra. Para quem entende que o verdadeiro progresso vem da
                consistência.<br><br>
                Bem-vindo à nossa história — e obrigado por fazer parte dela.
            </p>
        </div>
    </div>
</section>

</x-frontend::layout>
