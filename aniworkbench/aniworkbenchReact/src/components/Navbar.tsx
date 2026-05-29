import { useState } from "react";
import { Link } from "react-router-dom";

function NavItem({ to, children }: { to: string; children: React.ReactNode }) {
  const [isHover, setIsHover] = useState(false);

  return (
    <Link
      to={to}
      onMouseEnter={() => setIsHover(true)}
      onMouseLeave={() => setIsHover(false)}
      style={{
        ...styles.link,
        ...(isHover ? styles.linkHover : {}), 
      }}
    >
      {children}
    </Link>
  );
}

export default function Navbar() {
  return (
    <nav style={styles.nav}>
      <Link to="/" style={styles.logo}>AniWorkBench</Link>

      <div style={styles.links}>
        <NavItem to="/">Productos</NavItem>
        <NavItem to="/cart">Carrito</NavItem>
        <NavItem to="/orders">Pedidos</NavItem>
      </div>
    </nav>
  );
}

const styles: Record<string, React.CSSProperties> = {
  nav: {
    display: "flex",
    justifyContent: "space-between",
    alignItems: "center",
    padding: "15px 30px",
    borderBottom: "1px solid #00ff88",
    background: "#050505",
  },
  logo: {
    color: "#00ff88",
    textDecoration: "none",
    fontWeight: "bold",
    fontSize: "1.2rem",
    textShadow: "0 0 10px rgba(0,255,136,0.3)",
  },
  links: {
    display: "flex",
    gap: "20px",
  },
  link: {
    textDecoration: "none",
    color: "#888", 
    transition: "all 0.3s ease",
    fontSize: "1rem",
    fontWeight: "500",
  },
  linkHover: {
    color: "#00ff88", 
    textShadow: "0 0 8px #00ff88",
    transform: "translateY(-2px)",
  },
};