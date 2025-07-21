import Header from './components/Navigation/Header'
import Hero from './components/sections/Hero'
import MenuSection from './components/sections/Menu'

export default function App () {
  return (
    <CartProvider>
      <div className="min-h-screen">
        <Header />
        <main>
          <Hero />
          <About />
          <MenuSection />
          <Testimonials />
          <Contact />
        </main>
        <Footer />
        <CartSidebar />
      </div>
    </CartProvider>
  );
};
