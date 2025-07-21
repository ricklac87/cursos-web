

export default function About () {
  const [ref, isVisible] = useIntersection(0.3);

  const features = [
    {
      icon: <Award className="text-orange-500" size={32} />,
      title: "Ingredientes Premium",
      description: "Selecionamos apenas os melhores ingredientes do mercado, garantindo qualidade excepcional em cada hambúrguer."
    },
    {
      icon: <Heart className="text-red-500" size={32} />,
      title: "Feito com Amor",
      description: "Cada hambúrguer é preparado artesanalmente com dedicação e paixão pela gastronomia de qualidade."
    },
    {
      icon: <Truck className="text-green-500" size={32} />,
      title: "Delivery Rápido",
      description: "Entregamos seu pedido quentinho e fresquinho no conforto da sua casa em até 30 minutos."
    }
  ];

  return (
    <section id="about" ref={ref} className="py-20 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <span className="text-orange-500 font-semibold text-lg">Nossa História</span>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-800 mt-2 mb-6">
            Tradição e Inovação
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">
            Nascida da paixão pela gastronomia artesanal, nossa hamburgueria combina técnicas tradicionais
            com toques modernos para criar experiências gastronômicas inesquecíveis.
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-8 mb-16">
          {features.map((feature, index) => (
            <Card key={index} className={`p-8 text-center transition-all duration-700 delay-${index * 200} ${isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'}`}>
              <div className="mb-4 flex justify-center">{feature.icon}</div>
              <h3 className="text-xl font-bold text-gray-800 mb-4">{feature.title}</h3>
              <p className="text-gray-600 leading-relaxed">{feature.description}</p>
            </Card>
          ))}
        </div>

        <div className="grid lg:grid-cols-2 gap-12 items-center">
          <div className={`transition-all duration-1000 ${isVisible ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'}`}>
            <h3 className="text-3xl font-bold text-gray-800 mb-6">
              A Arte de Fazer o Hambúrguer Perfeito
            </h3>
            <p className="text-gray-600 mb-6 text-lg leading-relaxed">
              Nossa jornada começou com uma simples pergunta: como criar o hambúrguer perfeito? 
              Depois de anos aperfeiçoando receitas e técnicas, descobrimos que a resposta está 
              na combinação harmoniosa entre ingredientes de qualidade superior e preparo artesanal.
            </p>
            <p className="text-gray-600 mb-8 text-lg leading-relaxed">
              Cada blend é cuidadosamente temperado, cada pão é assado diariamente em nosso forno, 
              e cada molho é preparado com receitas secretas desenvolvidas exclusivamente para 
              proporcionar uma explosão de sabores únicos.
            </p>
            <Button size="lg">
              Conheça Nosso Menu
              <ChefHat size={20} />
            </Button>
          </div>

          <div className={`relative transition-all duration-1000 delay-300 ${isVisible ? 'translate-x-0 opacity-100' : 'translate-x-10 opacity-0'}`}>
            <div className="grid grid-cols-2 gap-4">
              <div className="bg-gradient-to-br from-orange-100 to-orange-200 p-6 rounded-2xl">
                <div className="text-4xl mb-2">👨‍🍳</div>
                <div className="text-2xl font-bold text-gray-800">Chef</div>
                <div className="text-sm text-gray-600">Especializado</div>
              </div>
              <div className="bg-gradient-to-br from-red-100 to-red-200 p-6 rounded-2xl mt-8">
                <div className="text-4xl mb-2">🥩</div>
                <div className="text-2xl font-bold text-gray-800">Carne</div>
                <div className="text-sm text-gray-600">Premium</div>
              </div>
              <div className="bg-gradient-to-br from-yellow-100 to-yellow-200 p-6 rounded-2xl -mt-4">
                <div className="text-4xl mb-2">🧄</div>
                <div className="text-2xl font-bold text-gray-800">Temperos</div>
                <div className="text-sm text-gray-600">Secretos</div>
              </div>
              <div className="bg-gradient-to-br from-green-100 to-green-200 p-6 rounded-2xl mt-4">
                <div className="text-4xl mb-2">🥬</div>
                <div className="text-2xl font-bold text-gray-800">Vegetais</div>
                <div className="text-sm text-gray-600">Frescos</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};