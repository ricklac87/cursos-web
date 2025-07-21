const Button = ({ children, variant = "primary", size = "md", className = "", ...props }) => {
  const baseClasses = "font-semibold rounded-lg transition-all duration-300 flex items-center justify-center gap-2";
  const variants = {
    primary: "bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1",
    secondary: "bg-white text-gray-800 border-2 border-gray-200 hover:border-orange-500 hover:text-orange-500",
    outline: "border-2 border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white"
  };
  const sizes = {
    sm: "px-4 py-2 text-sm",
    md: "px-6 py-3 text-base",
    lg: "px-8 py-4 text-lg"
  };

  return (
    <button 
      className={`${baseClasses} ${variants[variant]} ${sizes[size]} ${className}`}
      {...props}
    >
      {children}
    </button>
  );
};