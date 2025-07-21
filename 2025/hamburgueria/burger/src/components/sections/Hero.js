export default function Hero () {
  const [ref, isVisible] = useIntersection(0.3);

  return (
    <section id="home" ref={ref} className="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-orange-50 via-white to-red-50">
      {/* <div className="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f97316" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20" /> */}
      
      <div className="container mx-auto px-4 py-20 relative z-10">
        <div className="grid lg:grid-cols-2 gap-12 items-center">
          <div className={`transition-all duration-1000 ${isVisible ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'}`}>
            <div className="mb-6">
              <span className="bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm font-semibold">
                🔥 Hambúrgueres Artesanais Premium
              </span>
            </div>
            
            <h1 className="text-5xl md:text-7xl font-bold text-gray-800 leading-tight mb-6">
              Sabor
              <span className="bg-gradient-to-r from-orange-500 to-red-500 bg-clip-text text-transparent"> Artesanal</span>
              <br />
              em Cada
              <span className="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent"> Mordida</span>
            </h1>
            
            <p className="text-xl text-gray-600 mb-8 leading-relaxed">
              Descubra a experiência única dos nossos hambúrgueres feitos com ingredientes selecionados, 
              carnes premium e receitas exclusivas que vão despertar todos os seus sentidos.
            </p>
            
            <div className="flex flex-col sm:flex-row gap-4 mb-8">
              <Button size="lg" className="text-lg">
                <span>Ver Menu Completo</span>
                <ChefHat size={20} />
              </Button>
              <Button variant="outline" size="lg" className="text-lg">
                <MapPin size={20} />
                Fazer Pedido
              </Button>
            </div>

            <div className="grid grid-cols-3 gap-6">
              <div className="text-center">
                <div className="text-3xl font-bold text-orange-500 mb-1">50+</div>
                <div className="text-sm text-gray-600">Receitas Únicas</div>
              </div>
              <div className="text-center">
                <div className="text-3xl font-bold text-orange-500 mb-1">4.9★</div>
                <div className="text-sm text-gray-600">Avaliação Média</div>
              </div>
              <div className="text-center">
                <div className="text-3xl font-bold text-orange-500 mb-1">10k+</div>
                <div className="text-sm text-gray-600">Clientes Felizes</div>
              </div>
            </div>
          </div>

          <div className={`relative transition-all duration-1000 delay-300 ${isVisible ? 'translate-x-0 opacity-100' : 'translate-x-10 opacity-0'}`}>
            <div className="relative">
              <div className="absolute -top-4 -right-4 w-72 h-72 bg-gradient-to-br from-orange-200 to-red-200 rounded-full blur-3xl opacity-50" />
              <div className="absolute -bottom-8 -left-8 w-96 h-96 bg-gradient-to-br from-red-100 to-orange-100 rounded-full blur-3xl opacity-30" />
              
              <div className="relative bg-white rounded-3xl shadow-2xl p-8 backdrop-blur-sm border border-white/20">
                <div className="text-center">
                  <div className="text-9xl mb-4">🍔</div>
                  <h3 className="text-2xl font-bold text-gray-800 mb-2">Classic Artisan</h3>
                  <p className="text-gray-600 mb-4">Nosso carro-chefe com blend especial</p>
                  <div className="text-3xl font-bold text-orange-500">R$ 32,90</div>
                </div>
                
                <div className="absolute -top-3 -right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold animate-pulse">
                  Mais Vendido! 🔥
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};