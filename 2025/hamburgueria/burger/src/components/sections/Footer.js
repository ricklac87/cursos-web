export default function Footer () {
  return (
    <footer className="bg-black text-white py-12">
      <div className="container mx-auto px-4">
        <div className="grid md:grid-cols-4 gap-8 mb-8">
          <div>
            <div className="flex items-center gap-3 mb-4">
              <div className="bg-gradient-to-r from-orange-500 to-red-500 p-2 rounded-lg">
                <ChefHat className="text-white w-6 h-6" />
              </div>
              <div>
                <h3 className="text-xl font-bold">Artisan Burger</h3>
                <p className="text-xs text-gray-400">Hambúrgueres Artesanais</p>
              </div>
            </div>
            <p className="text-gray-400 text-sm">
              Criando experiências gastronômicas únicas com ingredientes premium 
              e técnicas artesanais desde 2020.
            </p>
          </div>
          
          <div>
            <h4 className="font-bold mb-4">Menu</h4>
            <ul className="space-y-2 text-sm text-gray-400">
              <li><a href="#menu" className="hover:text-orange-400 transition-colors">Hambúrgueres</a></li>
              <li><a href="#menu" className="hover:text-orange-400 transition-colors">Acompanhamentos</a></li>
              <li><a href="#menu" className="hover:text-orange-400 transition-colors">Bebidas</a></li>
              <li><a href="#menu" className="hover:text-orange-400 transition-colors">Sobremesas</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="font-bold mb-4">Empresa</h4>
            <ul className="space-y-2 text-sm text-gray-400">
              <li><a href="#about" className="hover:text-orange-400 transition-colors">Sobre Nós</a></li>
              <li><a href="#testimonials" className="hover:text-orange-400 transition-colors">Depoimentos</a></li>
              <li><a href="#contact" className="hover:text-orange-400 transition-colors">Contato</a></li>
              <li><a href="#" className="hover:text-orange-400 transition-colors">Trabalhe Conosco</a></li>
            </ul>
          </div>
          
          <div>
            <h4 className="font-bold mb-4">Atendimento</h4>
            <ul className="space-y-2 text-sm text-gray-400">
              <li>📞 (11) 9999-9999</li>
              <li>📧 contato@artisanburger.com</li>
              <li>⏰ Seg-Dom: 18h às 23h</li>
              <li>🚚 Delivery até 00h</li>
            </ul>
          </div>
        </div>
        
        <div className="border-t border-gray-800 pt-8 text-center">
          <p className="text-gray-400 text-sm">
            © 2024 Artisan Burger. Todos os direitos reservados. 
            Desenvolvido com ❤️ para os amantes de hambúrgueres artesanais.
          </p>
        </div>
      </div>
    </footer>
  );
};