export function getCart() {
  return JSON.parse(localStorage.getItem("cart") || "[]");
}

export function addToCart(product: any) {
  const cart = getCart();

  const existing = cart.find((p: any) => p.id === product.id);

  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({
      id: product.id,
      name: product.name,
      price: product.price,
      quantity: 1,
    });
  }

  localStorage.setItem("cart", JSON.stringify(cart));
}