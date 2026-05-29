import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { api } from "../api/api";
import { addToCart } from "../utils/cart";

interface Product {
  id: number;
  name: string;
  price: number;
  description?: string;
  image?: string;
  stock?: number;
}

export default function ProductDetail() {
  const { id } = useParams();
  const [product, setProduct] = useState<Product | null>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    api.get<Product>(`/products/${id}`)
      .then((res) => {
        setProduct(res.data);
      })
      .catch((err) => {
        console.error("Error al obtener el producto:", err);
      })
      .finally(() => {
        setLoading(false);
      });
  }, [id]);

  const getImageUrl = (imagePath: string | undefined) => {
    if (!imagePath) return "https://via.placeholder.com/400x600?text=Sin+Imagen";
    if (imagePath.startsWith("http")) return imagePath;
    
    const cleanPath = imagePath.replace(/^public\//, "");
    return `http://localhost:8000/storage/${cleanPath}`;
  };

  const handleAddToCart = () => {
    if (product) {
      addToCart(product);
      alert(`${product.name} añadido al carrito`);
    }
  };

  if (loading) {
    return (
      <div style={styles.page}>
        <p>Cargando detalles del manga...</p>
      </div>
    );
  }

  if (!product) {
    return (
      <div style={styles.page}>
        <p>Producto no encontrado.</p>
        <Link to="/" style={styles.link}>Volver a la tienda</Link>
      </div>
    );
  }

  return (
    <div style={styles.page}>
      <Link to="/" style={styles.backLink}>← Volver a la tienda</Link>

      <div style={styles.container}>
        <div style={styles.imageBox}>
          <img
            src={getImageUrl(product.image)}
            alt={product.name}
            style={styles.image}
            onError={(e) => {
              (e.target as HTMLImageElement).src = "https://via.placeholder.com/400x600?text=Error+al+cargar";
            }}
          />
        </div>

        <div style={styles.info}>
          <h1 style={styles.title}>{product.name}</h1>
          
          <div style={styles.badge}>Manga Original</div>

          <p style={styles.price}>{product.price.toFixed(2)} €</p>

          <div style={styles.descriptionSection}>
            <h4 style={{ color: "#00ff88", marginBottom: "5px" }}>Descripción:</h4>
            <p style={styles.desc}>
              {product.description || "Este manga no tiene una descripción disponible todavía."}
            </p>
          </div>

          <p style={styles.stock}>
            <strong>Stock disponible:</strong> {product.stock ?? 0} unidades
          </p>

          <button
            onClick={handleAddToCart}
            style={styles.button}
            disabled={product.stock === 0}
          >
            {product.stock === 0 ? "Sin Stock" : "Añadir al carrito +"}
          </button>
        </div>
      </div>
    </div>
  );
}

const styles: Record<string, React.CSSProperties> = {
  page: {
    background: "#050505",
    minHeight: "100vh",
    color: "#00ff88",
    fontFamily: "'Segoe UI', Roboto, sans-serif",
    padding: "40px 20px",
  },
  backLink: {
    color: "#00ff88",
    textDecoration: "none",
    display: "inline-block",
    marginBottom: "20px",
    fontSize: "0.9rem",
    opacity: 0.8,
  },
  container: {
    display: "grid",
    gridTemplateColumns: "repeat(auto-fit, minmax(300px, 1fr))",
    gap: "50px",
    maxWidth: "1000px",
    margin: "0 auto",
    background: "rgba(255, 255, 255, 0.02)",
    padding: "30px",
    borderRadius: "20px",
    border: "1px solid rgba(0, 255, 136, 0.1)",
  },
  imageBox: {
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    background: "#111",
    borderRadius: "12px",
    overflow: "hidden",
    boxShadow: "0 10px 30px rgba(0,0,0,0.5)",
  },
  image: {
    width: "100%",
    height: "auto",
    maxHeight: "500px",
    objectFit: "contain",
  },
  info: {
    display: "flex",
    flexDirection: "column",
    justifyContent: "center",
  },
  title: {
    fontSize: "2.5rem",
    margin: "0 0 10px 0",
    color: "#fff",
    textShadow: "0 0 15px rgba(0,255,136,0.3)",
  },
  badge: {
    background: "rgba(0, 255, 136, 0.1)",
    color: "#00ff88",
    padding: "4px 12px",
    borderRadius: "20px",
    fontSize: "0.8rem",
    width: "fit-content",
    marginBottom: "20px",
    border: "1px solid #00ff88",
  },
  price: {
    fontSize: "2rem",
    fontWeight: "bold",
    marginBottom: "20px",
  },
  descriptionSection: {
    borderTop: "1px solid rgba(255,255,255,0.1)",
    paddingTop: "20px",
    marginBottom: "20px",
  },
  desc: {
    lineHeight: "1.6",
    color: "#ccc",
    fontSize: "1.1rem",
  },
  stock: {
    fontSize: "0.9rem",
    opacity: 0.8,
    marginBottom: "30px",
  },
  button: {
    padding: "15px 25px",
    fontSize: "1.1rem",
    fontWeight: "bold",
    border: "none",
    borderRadius: "8px",
    background: "#00ff88",
    color: "#000",
    cursor: "pointer",
    transition: "transform 0.2s, background 0.2s",
  },
  link: {
    color: "#00ff88",
    display: "block",
    marginTop: "20px",
  }
};