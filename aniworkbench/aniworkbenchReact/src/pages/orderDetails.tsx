import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { api } from "../api/api";

interface OrderItem {
  id: number;
  product: {
    name: string;
  };
  quantity: number;
  price: number;
}

interface Order {
  id: number;
  total: number;
  items: OrderItem[];
}

export default function OrderDetail() {
  const { id } = useParams();
  const [order, setOrder] = useState<Order | null>(null);

  useEffect(() => {
    api.get(`/orders/${id}`).then((res) => {
      setOrder(res.data);
    });
  }, [id]);

  if (!order) return <p>Cargando pedido...</p>;

  return (
    <div style={styles.page}>
      <h1>Pedido #{order.id}</h1>

      <h2>Total: {order.total} €</h2>

      {order.items?.map((item) => (
        <div key={item.id} style={styles.item}>
          <strong>{item.product?.name}</strong>
          <p>{item.quantity} x {item.price} €</p>
        </div>
      ))}

      <Link to="/" style={styles.btn}>
        🛍 Volver a productos
      </Link>
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    color: "#00ff88",
    minHeight: "100vh",
    padding: 30,
    fontFamily: "Arial",
  },

  item: {
    border: "1px solid #00ff88",
    padding: 10,
    margin: "10px 0",
    borderRadius: 10,
  },

  btn: {
    display: "inline-block",
    marginTop: 20,
    padding: 10,
    border: "1px solid #00ff88",
    color: "#00ff88",
    textDecoration: "none",
  },
};