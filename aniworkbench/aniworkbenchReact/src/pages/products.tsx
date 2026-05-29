import { useEffect, useState, type ChangeEvent } from "react";
import { api } from "../api/api";
import { Link } from "react-router-dom";
import { addToCart } from "../utils/cart";

interface Product {
  id: number;
  name: string;
  price: number;
  image?: string;
  description?: string;
  stock?: number;
}

export default function Products() {
  const [products, setProducts] = useState<Product[]>([]);
  const [search, setSearch] = useState("");
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    api.get<Product[]>("/products")
      .then((res) => {
        setProducts(res.data);
      })
      .catch((err) => {
        console.error("Error cargando productos:", err);
      })
      .finally(() => {
        setLoading(false);
      });
  }, []);

  const filtered = products.filter((p) =>
    p.name.toLowerCase().includes(search.toLowerCase())
  );

  const getImageUrl = (imagePath: string | undefined) => {
    if (!imagePath) return null;
    if (imagePath.startsWith("http")) {
      return imagePath;
    }
    return `http://localhost:8000/storage/${imagePath}`;
  };

  const handleAddToCart = (product: Product) => {
    addToCart(product);
    alert(`${product.name} añadido al carrito`);
  };

  if (loading) return <div style={styles.page}>Cargando productos...</div>;

  return (
    <div style={styles.page}>
      <h1 style={styles.title}>Mangas Físicos</h1>

      <input
        style={styles.search}
        placeholder="Buscar manga..."
        value={search}
        onChange={(e: ChangeEvent<HTMLInputElement>) => setSearch(e.target.value)}
      />

      <div style={styles.grid}>
        {filtered.length > 0 ? (
          filtered.map((p) => (
            <div key={p.id} style={styles.card}>
              
              <div style={styles.imageBox}>
                {p.image ? (
                  <img
                    src={getImageUrl(p.image)!}
                    alt={p.name}
                    style={styles.image}
                  />
                ) : (
                  <span style={{ color: "#666" }}>Sin imagen</span>
                )}
              </div>

              <div style={styles.info}>
                <h3 style={styles.productName}>{p.name}</h3>
                <p style={styles.price}>{p.price.toFixed(2)} €</p>
              </div>

              <div style={styles.actions}>
                <Link to={`/product/${p.id}`} style={styles.link}>
                  Ver detalles
                </Link>

                <button
                  onClick={() => handleAddToCart(p)}
                  style={styles.button}
                >
                  Añadir +
                </button>
              </div>
            </div>
          ))
        ) : (
          <p>No se encontraron productos.</p>
        )}
      </div>
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    minHeight: "100vh",
    padding: "40px 20px",
    color: "#00ff88",
    fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
  },
  title: {
    textShadow: "0 0 15px rgba(0,255,136,0.5)",
    textAlign: "center",
    marginBottom: "30px",
    fontSize: "2.5rem",
  },
  search: {
    display: "block",
    width: "100%",
    maxWidth: "400px",
    margin: "0 auto 40px auto",
    padding: "12px 15px",
    borderRadius: "8px",
    border: "2px solid #00ff88",
    background: "rgba(0,0,0,0.5)",
    color: "#00ff88",
    outline: "none",
    fontSize: "16px",
  },
  grid: {
    display: "grid",
    gridTemplateColumns: "repeat(auto-fill, minmax(220px, 1fr))",
    gap: "25px",
    maxWidth: "1200px",
    margin: "0 auto",
  },
  card: {
    border: "1px solid rgba(0,255,136,0.3)",
    padding: "20px",
    borderRadius: "15px",
    background: "rgba(0,255,136,0.03)",
    display: "flex",
    flexDirection: "column",
    transition: "transform 0.2s",
    boxShadow: "0 4px 15px rgba(0,0,0,0.5)",
  },
  imageBox: {
    height: "200px",
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    marginBottom: "15px",
    overflow: "hidden",
    borderRadius: "8px",
    background: "#111",
  },
  image: {
    height: "100%",
    width: "100%",
    objectFit: "cover",
  },
  info: {
    flexGrow: 1,
  },
  productName: {
    fontSize: "1.1rem",
    margin: "0 0 10px 0",
    height: "2.4em",
    overflow: "hidden",
    color: "#fff",
  },
  price: {
    fontSize: "1.3rem",
    fontWeight: "bold",
    color: "#00ff88",
    margin: "5px 0",
  },
  actions: {
    display: "flex",
    justifyContent: "space-between",
    alignItems: "center",
    marginTop: "15px",
    paddingTop: "15px",
    borderTop: "1px solid rgba(0,255,136,0.1)",
  },
  link: {
    color: "#aaa",
    textDecoration: "none",
    fontSize: "0.9rem",
    transition: "color 0.2s",
  },
  button: {
    border: "1px solid #00ff88",
    background: "#00ff88",
    color: "#000",
    fontWeight: "bold",
    cursor: "pointer",
    padding: "8px 15px",
    borderRadius: "5px",
    transition: "all 0.3s",
  },
};