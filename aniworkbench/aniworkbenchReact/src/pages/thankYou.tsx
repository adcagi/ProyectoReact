import { Link } from "react-router-dom";

export default function ThankYou() {
  return (
    <div style={styles.page}>
      <div style={styles.card}>
        <h1>🎉 Order completed!</h1>
        <p>Thanks for your purchase</p>

        <Link to="/products" style={styles.btn}>
          Continue shopping
        </Link>
      </div>
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    height: "100vh",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    color: "#00ff88",
  },
  card: {
    border: "1px solid #00ff88",
    padding: 40,
    textAlign: "center",
    borderRadius: 12,
    background: "rgba(0,255,136,0.05)",
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