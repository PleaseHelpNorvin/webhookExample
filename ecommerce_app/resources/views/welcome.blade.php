<!-- to test cors on get request -->

<!-- <!DOCTYPE html>
<html>
<body>
<script>
fetch("http://localhost:8000/api/v1/products/all", {
  method: "GET",
  headers: {
    "Content-Type": "application/json",
    "Authorization": "Bearer 4|SZ5nXLxRyjIt0JM64oQRaOUetODoWuS0uvea3uvx3b0eac16"
  }
})
.then(response => {
  if (!response.ok) throw new Error("Network response was not ok");
  return response.json();
})
.then(data => console.log("✅ Success:", data))
.catch(error => console.error("❌ CORS or Auth error:", error));
</script>
</body>
</html> -->

<!-- to test cors on put request -->

<!-- <!DOCTYPE html>
<html>
<body>
<script>
    fetch("http://127.0.0.1:8000/api/v1/products/1", {
    method: "PUT",
    headers: {
        "Content-Type": "application/json",
        "Authorization": "Bearer 4|SZ5nXLxRyjIt0JM64oQRaOUetODoWuS0uvea3uvx3b0eac16"
    },
    body: JSON.stringify({
        name: "Test Product",
        price: 99.99
    })
    })
    .then(res => res.toString()) // <-- Change to text to read raw HTML if any
    .then(data => console.log("✅ Response Body:", data.data))
    .catch(err => console.error("❌ Error:", err));
</script>
</body>
</html> -->