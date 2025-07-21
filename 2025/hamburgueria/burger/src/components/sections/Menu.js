export default function MenuSection () {
  const [ref, isVisible] = useIntersection(0.2);
  const [activeCategory, setActiveCategory] = useState('all');
  const { addToCart } = useCart();
  const menu = menuService.getMenuData();

  const categories = [
    { id: 'all', label: 'Todos', icon: '🍽️' },
    { id: 'classic', label: 'Clássicos', icon: '🍔' },
    { id: 'premium', label: 'Premium', icon: '⭐' },
    { id: 'gourmet', label: 'Gourmet', icon: '👑' },
    { id: 'veggie', label: 'Vegetariano', icon: '🥬' }
  ];

  const getFilteredItems = () => {
    if (activeCategory === 'all') {
      return [...menu.burgers, ...menu.sides, ...menu.drinks];
    }
    return menu.burgers.filter(item => item.category === activeCategory);
  };

  return (
    <section id="menu" ref={ref} className="py-20 bg-white">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <span className="text-orange-500 font-semibold text-lg">Nosso Menu</span>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-800 mt-2 mb-6">
            Delícias Artesanais
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">
            Explore nossa seleção cuidadosamente elaborada de hambúrgueres gourmet, 
            acompanhamentos especiais e bebidas artesanais.
          </p>
        </div>

        {/* Category Filters */}
        <div className="flex flex-wrap justify-center gap-4 mb-12">
          {categories.map(category => (
            <button
              key={category.id}
              onClick={() => setActiveCategory(category.id)}
              className={`px-6 py-3 rounded-full font-semibold transition-all duration-300 flex items-center gap-2 ${
                activeCategory === category.id
                  ? 'bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-lg transform -translate-y-1'
                  : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
              }`}
            >
              <span>{category.icon}</span>
              {category.label}
            </button>
          ))}
        </div>

        {/* Menu Items */}
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          {getFilteredItems().map((item, index) => (
            <Card 
              key={item.id} 
              className={`overflow-hidden transition-all duration-700 delay-${index * 100} ${
                isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'
              }`}
            >
              <div className="relative">
                <div className="bg-gradient-to-br from-orange-50 to-red-50 p-8 text-center">
                  <div className="text-6xl mb-4">{item.image}</div>
                  {item.category === 'gourmet' && (
                    <div className="absolute top-4 right-4 bg-yellow-400 text-yellow-900 px-2 py-1 rounded-full text-xs font-bold">
                      PREMIUM ✨
                    </div>
                  )}
                </div>
                <div className="p-6">
                  <h3 className="text-xl font-bold text-gray-800 mb-2">{item.name}</h3>
                  <p className="text-gray-600 mb-4 text-sm leading-relaxed">{item.description}</p>
                  
                  <div className="flex items-center justify-between">
                    <span className="text-2xl font-bold text-orange-500">
                      R$ {item.price.toFixed(2)}
                    </span>
                    <Button
                      onClick={() => addToCart(item)}
                      size="sm"
                      className="text-sm"
                    >
                      Adicionar
                    </Button>
                  </div>
                </div>
              </div>
            </Card>
          ))}
        </div>

        <div className="text-center mt-12">
          <Button size="lg" variant="outline">
            Ver Menu Completo
            <ChefHat size={20} />
          </Button>
        </div>
      </div>
    </section>
  );
};