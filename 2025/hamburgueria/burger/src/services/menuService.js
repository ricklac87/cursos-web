const menuData = {
  burgers: [
    {
      id: 1,
      name: "Classic Artisan",
      description: "Blend artesanal 180g, queijo cheddar, alface, tomate, cebola roxa e molho especial",
      price: 32.90,
      image: "🍔",
      category: "classic"
    },
    {
      id: 2,
      name: "BBQ Smoky",
      description: "Blend 200g, queijo gouda, bacon crocante, cebola caramelizada e molho BBQ defumado",
      price: 38.90,
      image: "🍔",
      category: "premium"
    },
    {
      id: 3,
      name: "Truffle Deluxe",
      description: "Blend wagyu 180g, brie francês, rúcula, tomate seco e maionese trufada",
      price: 45.90,
      image: "🍔",
      category: "gourmet"
    },
    {
      id: 4,
      name: "Veggie Supreme",
      description: "Hambúrguer de quinoa e cogumelos, queijo vegano, abacate e molho tahine",
      price: 29.90,
      image: "🥬",
      category: "veggie"
    }
  ],
  sides: [
    {
      id: 5,
      name: "Batata Rústica",
      description: "Batatas artesanais com ervas finas e sal grosso",
      price: 16.90,
      image: "🍟"
    },
    {
      id: 6,
      name: "Onion Rings",
      description: "Anéis de cebola empanados na cerveja artesanal",
      price: 18.90,
      image: "🧅"
    }
  ],
  drinks: [
    {
      id: 7,
      name: "Craft Cola",
      description: "Cola artesanal com especiarias secretas",
      price: 12.90,
      image: "🥤"
    },
    {
      id: 8,
      name: "Milkshake Premium",
      description: "Sorvete artesanal com calda especial",
      price: 19.90,
      image: "🥛"
    }
  ]
};

const menuService = {
  getMenuData: () => menuData,
  getBurgersByCategory: (category) => menuData.burgers.filter(b => b.category === category),
  getAllBurgers: () => menuData.burgers,
  getSides: () => menuData.sides,
  getDrinks: () => menuData.drinks
};