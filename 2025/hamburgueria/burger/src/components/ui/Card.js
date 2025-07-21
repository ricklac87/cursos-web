const Card = ({ children, className = "", hover = true }) => {
  return (
    <div className={`bg-white rounded-xl shadow-lg border border-gray-100 ${hover ? 'hover:shadow-2xl hover:-translate-y-2' : ''} transition-all duration-300 ${className}`}>
      {children}
    </div>
  );
};