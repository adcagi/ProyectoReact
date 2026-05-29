import { useEffect, useState } from "react";
import { api } from "../api/api";
import { Link } from "react-router-dom";

interface Order {
  id: number;
  total: number;
  status: string;
  created_at: string;
}

export default function Orders() {
  const [orders, setOrders] = useState<Order[]>([]);

  useEffect(() => {
    api.get("/orders").then(res => setOrders(res.data));
  }, []);

  return (
    <div style={styles.page}>
      <h1>Mis pedidos</h1>

      {orders.length === 0 ? (
        <p>No hay pedidos</p>
      ) : (
        orders.map(order => (
          <div key={order.id} style={styles.card}>
            <h3>Pedido #{order.id}</h3>
            <p>Total: {order.total} €</p>
            <p>Estado: {order.status}</p>

            <Link to={`/order/${order.id}`} style={styles.btn}>
              Ver detalle
            </Link>
          </div>
        ))
      )}
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    color: "#00ff88",
    minHeight: "100vh",
    padding: 30,
  },
  card: {
    border: "1px solid #00ff88",
    padding: 15,
    margin: "10px 0",
    borderRadius: 10,
  },
  btn: {
    display: "inline-block",
    marginTop: 10,
    padding: 8,
    border: "1px solid #00ff88",
    color: "#00ff88",
    textDecoration: "none",
  },
};