
import React, { useState } from 'react';
import { Menu, X, ChefHat } from 'lucide-react';

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const { getTotalItems } = useCart();
  const activeSection = useScrollSpy(['home', 'about', 'menu', 'testimonials', 'contact']);

  const navLinks = [
    { href: "#home", label: "Início" },
    { href: "#about", label: "Sobre" },
    { href: "#menu", label: "Menu" },
    { href: "#testimonials", label: "Avaliações" },
    { href: "#contact", label: "Contato" }
  ];

  return (
    <header className="fixed top-0 w-full bg-white/95 backdrop-blur-md shadow-lg z-50">
      <div className="container mx-auto px-4 py-4">
        <div className="flex items-center justify-between">
          <div className="flex items-center gap-3">
            <div className="bg-gradient-to-r from-orange-500 to-red-500 p-2 rounded-lg">
              <ChefHat className="text-white w-8 h-8" />
            </div>
            <div>
              <h1 className="text-2xl font-bold text-gray-800">Artisan Burger</h1>
              <p className="text-xs text-gray-500">Hambúrgueres Artesanais</p>
            </div>
          </div>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            {navLinks.map(link => (
              <a
                key={link.href}
                href={link.href}
                className={`font-medium transition-colors ${
                  activeSection === link.href.slice(1) 
                    ? 'text-orange-500' 
                    : 'text-gray-700 hover:text-orange-500'
                }`}
              >
                {link.label}
              </a>
            ))}
          </nav>

          <div className="flex items-center gap-4">
            <CartButton />
            
            {/* Mobile menu button */}
            <button
              className="md:hidden p-2"
              onClick={() => setIsMenuOpen(!isMenuOpen)}
            >
              {isMenuOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <nav className="md:hidden mt-4 pb-4">
            {navLinks.map(link => (
              <a
                key={link.href}
                href={link.href}
                className="block py-2 text-gray-700 hover:text-orange-500 font-medium"
                onClick={() => setIsMenuOpen(false)}
              >
                {link.label}
              </a>
            ))}
          </nav>
        )}
      </div>
    </header>
  );
};