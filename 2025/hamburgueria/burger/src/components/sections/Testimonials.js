import React, {useIntersection} from 'react';
import Card from '../ui/Card'
import { Star } from 'lucide-react';


export default function Testimonials () {
  const [ref, isVisible] = useIntersection(0.3);
  
  const testimonials = [
    {
      id: 1,
      name: "Maria Silva",
      avatar: "👩‍💼",
      rating: 5,
      comment: "Simplesmente o melhor hambúrguer que já comi! A qualidade dos ingredientes é notável e o sabor é incrível. Virei cliente fiel!",
      location: "São Paulo, SP"
    },
    {
      id: 2,
      name: "João Santos",
      avatar: "👨‍💻",
      rating: 5,
      comment: "A entrega foi super rápida e o hambúrguer chegou quentinho. O BBQ Smoky é uma obra de arte culinária. Recomendo demais!",
      location: "Rio de Janeiro, RJ"
    },
    {
      id: 3,
      name: "Ana Costa",
      avatar: "👩‍🎨",
      rating: 5,
      comment: "Como vegetariana, fiquei surpresa com o Veggie Supreme. Sabor incrível e muito bem temperado. Finalmente um lugar que entende nossa necessidade!",
      location: "Belo Horizonte, MG"
    },
    {
      id: 4,
      name: "Carlos Oliveira",
      avatar: "👨‍🍳",
      rating: 5,
      comment: "Sou chef e posso afirmar: a qualidade é excepcional. Técnicas perfeitas, ingredientes premium. Parabéns pela excelência!",
      location: "Salvador, BA"
    }
  ];

  return (
    <section id="testimonials" ref={ref} className="py-20 bg-gradient-to-br from-gray-50 to-orange-50">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <span className="text-orange-500 font-semibold text-lg">Depoimentos</span>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-800 mt-2 mb-6">
            O Que Nossos Clientes Dizem
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">
            A satisfação dos nossos clientes é nossa maior conquista. 
            Veja o que eles têm a dizer sobre nossa experiência gastronômica.
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          {testimonials.map((testimonial, index) => (
            <Card 
              key={testimonial.id}
              className={`p-6 transition-all duration-700 delay-${index * 150} ${
                isVisible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'
              }`}
            >
              <div className="text-center mb-4">
                <div className="text-4xl mb-2">{testimonial.avatar}</div>
                <h4 className="font-bold text-gray-800">{testimonial.name}</h4>
                <p className="text-sm text-gray-500">{testimonial.location}</p>
              </div>
              
              <div className="flex justify-center mb-4">
                {[...Array(testimonial.rating)].map((_, i) => (
                  <Star key={i} className="text-yellow-400 fill-current" size={16} />
                ))}
              </div>
              
              <p className="text-gray-600 text-sm leading-relaxed italic">
                "{testimonial.comment}"
              </p>
            </Card>
          ))}
        </div>

        <div className="text-center mt-12">
          <div className="bg-white rounded-2xl shadow-lg p-8 max-w-4xl mx-auto">
            <div className="grid md:grid-cols-3 gap-8">
              <div className="text-center">
                <div className="text-4xl font-bold text-orange-500 mb-2">4.9/5</div>
                <div className="flex justify-center mb-2">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} className="text-yellow-400 fill-current" size={20} />
                  ))}
                </div>
                <p className="text-gray-600">Avaliação Geral</p>
              </div>
              
              <div className="text-center">
                <div className="text-4xl font-bold text-orange-500 mb-2">1.2k+</div>
                <p className="text-gray-600">Avaliações Positivas</p>
              </div>
              
              <div className="text-center">
                <div className="text-4xl font-bold text-orange-500 mb-2">98%</div>
                <p className="text-gray-600">Clientes Satisfeitos</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};
