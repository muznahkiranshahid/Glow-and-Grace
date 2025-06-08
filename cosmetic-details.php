<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MakeHub Cosmetics</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" /></head>
<body>
  <div class="container py‑5">
    <div id="productDetail" class="register-card animate"></div>
  </div>

  <script>
    const productData = JSON.parse(`[
      {"id":1,"name":"Velvet Matte Lipstick","brand":"Luxe Beauty","category":"Lipstick","price":"799","image1":"images/lip1a.jpg","image2":"images/lip1b.jpg"},
      {"id":2,"name":"Perfect Match Foundation","brand":"GlowUp","category":"Foundation","price":"1199","image1":"images/found1a.jpg","image2":"images/found1b.jpg"},
      {"id":3,"name":"Soft Touch Face Powder","brand":"Elegance","category":"Face Powder","price":"650","image1":"images/powder1a.jpg","image2":"images/powder1b.jpg"},
      {"id":4,"name":"Jet Black Eyeliner","brand":"EyeArt","category":"Eyeliner","price":"450","image1":"images/eye1a.jpg","image2":"images/eye1b.jpg"},
      {"id":5,"name":"Mega Lash Mascara","brand":"LashQueen","category":"Mascara","price":"799","image1":"images/mascara1a.jpg","image2":"images/mascara1b.jpg"},
      {"id":6,"name":"Rosy Blush","brand":"BlushBloom","category":"Blush","price":"599","image1":"images/blush1a.jpg","image2":"images/blush1b.jpg"},
      {"id":7,"name":"Shimmer Glow Highlighter","brand":"Radiance","category":"Highlighter","price":"899","image1":"images/high1a.jpg","image2":"images/high1b.jpg"}
    ]`);

    function getParameter(name) {
      const params = new URLSearchParams(window.location.search);
      return params.get(name);
    }

    function loadProduct() {
      const id = parseInt(getParameter('id'));
      const p = productData.find(prod => prod.id === id);
      if (!p) {
        document.getElementById('productDetail').innerHTML = `<p>Product not found.</p>`;
        return;
      }
      document.getElementById('productDetail').innerHTML = `
        <h2>${p.name}</h2>
        <div class="row">
          <div class="col-md-6">
            <img src="${p.image1}" class="img-fluid mb-3">
            <img src="${p.image2}" class="img-fluid">
          </div>
          <div class="col-md-6">
            <p><strong>Brand:</strong> ${p.brand}</p>
            <p><strong>Category:</strong> ${p.category}</p>
            <p><strong>Price:</strong> ₹${p.price}</p>
            <button class="btn btn-cart">Proceed to Checkout</button>
          </div>
        </div>`;
    }

    window.onload = loadProduct;
  </script>
</body>
</html>
