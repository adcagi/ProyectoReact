import { useEffect, useState } from "react";
import { api } from "../api/api";
import { useNavigate } from "react-router-dom";

interface CartItem {
  id: number;
  name: string;
  price: number;
  quantity: number;
}

export default function Checkout() {
  const navigate = useNavigate();
  const [cart, setCart] = useState<CartItem[]>([]);

  useEffect(() => {
    const storedCart = localStorage.getItem("cart");
    const parsed = storedCart ? JSON.parse(storedCart) : [];
    setCart(parsed);
  }, []);

  const total = cart.reduce(
    (acc, item) => acc + item.price * item.quantity,
    0
  );

const sendOrder = async () => {
  if (cart.length === 0) {
    alert("Carrito vacío");
    return;
  }

  try {
    console.log('CART: ', cart)
    const res = await api.post("/orders", { cart });
    

    localStorage.removeItem("cart");

    navigate(`/order/${res.data.id}`);

  } catch (err) {
    console.error(err);
    alert("Error al crear pedido");
  }
};

  return (
    <div style={styles.page}>
      <h1>Checkout</h1>

      {cart.length === 0 ? (
        <p>Carrito vacío</p>
      ) : (
        <>
          {cart.map((item) => (
            <div key={item.id} style={styles.item}>
              <strong>{item.name}</strong>
              <p>
                {item.quantity} x {item.price} €
              </p>
            </div>
          ))}

          <h2>Total: {total} €</h2>

          <button onClick={sendOrder} style={styles.btn}>
            Confirmar pedido
          </button>
        </>
      )}
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    minHeight: "100vh",
    color: "#00ff88",
    padding: 30,
    textAlign: "center",
  },

  item: {
    border: "1px solid #00ff88",
    margin: "10px auto",
    padding: 10,
    maxWidth: 400,
    borderRadius: 10,
  },

  btn: {
    marginTop: 20,
    padding: 12,
    border: "1px solid #00ff88",
    background: "transparent",
    color: "#00ff88",
    cursor: "pointer",
  },
};