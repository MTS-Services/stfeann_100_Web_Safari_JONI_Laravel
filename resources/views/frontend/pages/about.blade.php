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
            <h1 class="text-2xl md:text-4xl text-text-primary mb-6 text-left">A nossa marca</h1>
            <p class="text-lg md:text-xl text-black mb-4 text-left">
                A gente acredita que cada gota de suor que escorre, cada músculo que dói depois de um treino pesado, cada respiração ofegante, tudo isso conta a sua história. Uma história de persistência, de não desistir, de ir buscar mais uma repetição.
                O nome "<span class="font-bold text-text-primary">Valgrit</span>" é mais que uma palavra; é o nosso grito de guerra. Vem de "valor" – o valor que damos a cada repetição, a cada quilómetro, a cada meta que você atinge. E "grit" – aquela garra, aquela coragem que aparece quando você está exausto, mas a sua mente diz: "só mais uma!" E a cor vermelho-sangue do nosso logo? Não é por acaso. É a cor da paixão que arde, da energia que pulsa em cada um de nós quando estamos a dar o nosso melhor.
                <br /><br />
                Nascemos para o ginásio, sim. Mas também para as ruas, para a pista, para aquele momento em que a sua vontade encontra a ação. Cada peça "<span class="font-bold text-text-primary">Valgrit</span>" é feita pensando em você, no atleta que você é. Pra te dar aquele conforto que você precisa pra se mover sem limites, a respirabilidade pros treinos mais puxados e a durabilidade pra aguentar todas as suas batalhas.
                <br /><br />
                A "<span class="font-bold text-text-primary">Valgrit</span>" não é só roupa. É um compromisso. Um compromisso com o seu melhor eu, com os seus objetivos e com a certeza de que, com a garra certa, não existe limite para o que você pode conquistar.
                <br /><br />
                Vista "<span class="font-bold text-text-primary">Valgrit</span>". Sinta a sua força. Conquiste o seu impossível.
            </p>
        </div>

    </div>
</section>


  

</x-frontend::layout>
