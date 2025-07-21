

const CartButton = () => {
  const { getTotalItems, setIsOpen } = useCart();
  const totalItems = getTotalItems();

  return (
    <button
      onClick={() => setIsOpen(true)}
      className="relative bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-lg transition-colors"
    >
      <Menu size={20} />
      {totalItems > 0 && (
        <span className="absolute -top-2 -right-2 bg-red-500 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center">
          {totalItems}
        </span>
      )}
    </button>
  );
};