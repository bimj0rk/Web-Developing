const prodDiv = document.getElementById("products");
const addProductButton = document.getElementById("addProductButton");
document.addEventListener('DOMContentLoaded', function() {
    const prodDiv = document.getElementById("products");
    populateSelectWithProducts();
    refreshProducts();

    document.getElementById('addProductButton').addEventListener('click', function() {
        const name = document.getElementById('addName').value;
        const price = document.getElementById('addPrice').value;
        const product = { name, price: Number(price) };
        addProduct(product);
    });

    document.getElementById('deleteProductButton').addEventListener('click', function() {
        const id = document.getElementById('deleteSelect').value;
        deleteProduct(id);
    });

    document.getElementById('modifyProductButton').addEventListener('click', function() {
        const id = document.getElementById('modifySelect').value;
        const name = document.getElementById('modifyName').value;
        const price = document.getElementById('modifyPrice').value;
        const product = { name, price: Number(price) };
        modifyProduct(id, product);
    });

    document.getElementById('modifySelect').addEventListener('change', function() {
        loadProductDetails(this.value);
    });
});

function refreshProducts(){
    fetch('/api/v1/products/')
        .then(response => response.json())
        .then(data => showProducts(data))
        .catch(error => console.error('Error fetching products:', error));
}

function showProducts(products){
    prodDiv.innerHTML = "";
    if (Array.isArray(products) && products.length) {
        products.forEach(product => {
            let productDiv = document.createElement("div");
            productDiv.innerHTML = `${product.id} ${product.name} ${product.price}`;
            prodDiv.appendChild(productDiv);
        });
    } else {
        prodDiv.innerHTML = "<p>No products available</p>";
    }
}

function addProduct(product) {
    fetch('/api/v1/products/', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(product)
    })
        .then(checkResponseStatus)
        .then(() => {
            alert('Product added successfully.');
            document.getElementById('addName').value = '';
            document.getElementById('addPrice').value = '';
            populateSelectWithProducts(); // Repopulate selects to include new product
        })
        .catch(error => console.error('Error adding product:', error));
}

function deleteProduct(id) {
    fetch(`/api/v1/products/${id}`, { method: 'DELETE' })
        .then(response => {
            if (response.ok) {
                alert('Product deleted successfully. Refresh the page to see changes.');
            } else {
                throw new Error('Failed to delete product. ' + response.statusText);
            }
        })
        .catch(error => {
            console.error('Error deleting product:', error);
            alert('Failed to delete product: ' + error.message);
        });
}

function modifyProduct(id, product) {
    fetch(`/api/v1/products/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(product)
    })
        .then(checkResponseStatus)
        .then(() => {
            alert('Product modified successfully. Refresh the page to see the changes.');
        })
        .catch(error => console.error('Error modifying product:', error));
}

function populateSelectWithProducts() {
    fetch('/api/v1/products/')
        .then(response => response.json())
        .then(products => {
            const deleteSelect = document.getElementById('deleteSelect');
            const modifySelect = document.getElementById('modifySelect');
            deleteSelect.innerHTML = '';
            modifySelect.innerHTML = '';
            products.forEach(product => {
                const option = new Option(`ID ${product.id}: ${product.name}`, product.id);
                deleteSelect.add(option.cloneNode(true));
                modifySelect.add(option);
            });
        })
        .catch(error => console.error('Error loading products:', error));
}

function loadProductDetails(productId) {
    fetch(`/api/v1/products/${productId}`)
        .then(response => response.json())
        .then(product => {
            const detailsDiv = document.getElementById('productDetails');
            detailsDiv.innerHTML = `
            Name: <input type="text" id="modifyName" value="${product.name}"><br>
            Price: <input type="number" id="modifyPrice" value="${product.price}">
        `;
        })
        .catch(error => {
            console.error('Error fetching product:', error);
            document.getElementById('productDetails').innerHTML = 'Failed to load product details.';
        });
}

function checkResponseStatus(response) {
    if (response.ok) {
        return response.json();
    } else {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
}
