import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./components/Navbar";
import Products from "./pages/products";
import ProductDetail from "./pages/productDetail";
import Cart from "./pages/cart";
import Checkout from "./pages/checkout";
import ThankYou from "./pages/thankYou";
import OrderDetail from "./pages/orderDetails";
import Orders from "./pages/orders";



function App() {
  return (
    <BrowserRouter>
    <Navbar />
      <Routes>
        <Route path="/" element={<Products />} />
        <Route path="/product/:id" element={<ProductDetail />} />
        <Route path="/cart" element={<Cart />} />
        <Route path="/checkout" element={<Checkout />} />
        <Route path="/thank-you" element={<ThankYou />} />
        <Route path="/order/:id" element={<OrderDetail />} />
        <Route path='/orders' element={<Orders />}/>

      </Routes>
    </BrowserRouter>
  );
}

export default App;