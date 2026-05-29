import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

export default function Cart() {
  const [cart, setCart] = useState<any[]>([]);

  useEffect(() => {
    setCart(JSON.parse(localStorage.getItem("cart") || "[]"));
  }, []);

  const clearCart = () => {
    localStorage.removeItem("cart");
    setCart([]);
  };
  return (
    <div style={styles.page}>
      <h1>Carrito</h1>

      {cart.length === 0 && <p>Carrito Vacío</p>}

      {cart.map((item, i) => (
        <div key={i} style={styles.card}>
          <h3>{item.name}</h3>
          <p>{item.quantity} x {item.price} €</p>
        </div>
      ))}
    {cart.length > 0 && (
      <button style={styles.emptyCartBtn} onClick={clearCart}>
        Vaciar carrito
      </button>
    )}

    {cart.length > 0 && (
      <Link to="/checkout" style={styles.checkoutBtn}>
        Finalizar compra
      </Link>
    )}
    </div>
    
  );
}

const styles: Record<string, React.CSSProperties> = {
  checkoutBtn: {
  display: "block",
  marginTop: 20,
  padding: 12,
  border: "1px solid #00ff88",
  color: "#00ff88",
  textDecoration: "none",
  textAlign: "center",
},
  page: {
    background: "#050505",
    minHeight: "100vh",
    padding: 30,
    color: "#00ff88",
  },
  card: {
    border: "1px solid #00ff88",
    margin: "10px 0",
    padding: 10,
    borderRadius: 8,
  },
  emptyCartBtn: {
    fontSize:"1rem",
    width:"100%",
    display: "block",
    background: "#050505",
    margin:"20px auto 0",
    padding: 12,
    border: "1px solid #00ff88",
    color: "#00ff88",
    textDecoration: "none",
    textAlign: "center",
  },
};