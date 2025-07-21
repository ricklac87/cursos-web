export default function Contact () {
  const [ref, isVisible] = useIntersection(0.3);

  const contactInfo = [
    {
      icon: <MapPin className="text-orange-500" size={24} />,
      title: "Endereço",
      info: "Rua das Delícias, 123 - Centro",
      subInfo: "São Paulo, SP - CEP: 01234-567"
    },
    {
      icon: <Phone className="text-green-500" size={24} />,
      title: "Telefone",
      info: "(11) 9999-9999",
      subInfo: "WhatsApp disponível"
    },
    {
      icon: <Clock className="text-blue-500" size={24} />,
      title: "Horário",
      info: "Seg - Dom: 18h às 23h",
      subInfo: "Delivery até 00h"
    }
  ];

  return (
    <section id="contact" ref={ref} className="py-20 bg-gray-900 text-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <span className="text-orange-400 font-semibold text-lg">Entre em Contato</span>
          <h2 className="text-4xl md:text-5xl font-bold mt-2 mb-6">
            Faça Seu Pedido
          </h2>
          <p className="text-xl text-gray-300 max-w-3xl mx-auto">
            Estamos prontos para atender você! Entre em contato conosco através 
            dos nossos canais ou faça seu pedido diretamente pelo nosso sistema.
          </p>
        </div>

        <div className="grid lg:grid-cols-2 gap-12 items-start">
          {/* Contact Info */}
          <div className={`transition-all duration-1000 ${isVisible ? 'translate-x-0 opacity-100' : '-translate-x-10 opacity-0'}`}>
            <div className="space-y-8 mb-8">
              {contactInfo.map((item, index) => (
                <div key={index} className="flex items-start gap-4">
                  <div className="bg-gray-800 p-3 rounded-lg">
                    {item.icon}
                  </div>
                  <div>
                    <h3 className="text-xl font-bold mb-1">{item.title}</h3>
                    <p className="text-lg text-gray-300">{item.info}</p>
                    <p className="text-sm text-gray-400">{item.subInfo}</p>
                  </div>
                </div>
              ))}
            </div>

            {/* Social Media */}
            <div className="bg-gray-800 p-6 rounded-2xl">
              <h3 className="text-xl font-bold mb-4">Siga-nos nas Redes</h3>
              <div className="flex gap-4">
                <button className="bg-gradient-to-r from-pink-500 to-purple-500 p-3 rounded-lg hover:scale-110 transition-transform">
                  <Instagram size={24} />
                </button>
                <button className="bg-blue-600 p-3 rounded-lg hover:scale-110 transition-transform">
                  <Facebook size={24} />
                </button>
              </div>
              <p className="text-gray-400 text-sm mt-4">
                @artisanburger - Acompanhe nossas novidades e promoções!
              </p>
            </div>
          </div>

          {/* Order Form */}
          <div className={`transition-all duration-1000 delay-300 ${isVisible ? 'translate-x-0 opacity-100' : 'translate-x-10 opacity-0'}`}>
            <Card className="bg-white text-gray-800 p-8">
              <h3 className="text-2xl font-bold mb-6 text-center">Fazer Pedido Rápido</h3>
              
              <form className="space-y-6">
                <div>
                  <label className="block text-sm font-semibold mb-2">Nome Completo</label>
                  <input 
                    type="text" 
                    className="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                    placeholder="Seu nome"
                  />
                </div>
                
                <div>
                  <label className="block text-sm font-semibold mb-2">Telefone/WhatsApp</label>
                  <input 
                    type="tel" 
                    className="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                    placeholder="(11) 99999-9999"
                  />
                </div>
                
                <div>
                  <label className="block text-sm font-semibold mb-2">Endereço de Entrega</label>
                  <textarea 
                    className="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                    rows="3"
                    placeholder="Rua, número, bairro, CEP"
                  ></textarea>
                </div>
                
                <div>
                  <label className="block text-sm font-semibold mb-2">Observações</label>
                  <textarea 
                    className="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors"
                    rows="3"
                    placeholder="Alguma observação especial?"
                  ></textarea>
                </div>
                
                <Button size="lg" className="w-full">
                  <Phone size={20} />
                  Enviar Pedido via WhatsApp
                </Button>
              </form>
            </Card>
          </div>
        </div>

        {/* Map Section */}
        <div className="mt-16">
          <div className="bg-gray-800 rounded-2xl p-8 text-center">
            <h3 className="text-2xl font-bold mb-4">Nossa Localização</h3>
            <div className="bg-gray-700 rounded-lg p-12">
              <div className="text-6xl mb-4">📍</div>
              <p className="text-lg text-gray-300">
                Estamos localizados no coração da cidade, com fácil acesso e estacionamento disponível.
              </p>
              <Button variant="outline" className="mt-4 text-white border-white hover:bg-white hover:text-gray-800">
                Ver no Google Maps
              </Button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
