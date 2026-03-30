<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">




<div class="container">

   <h1 class="dashboard-title">WELCOME TO ADMIN DASHBOARD</h1>

<style>
.dashboard-title {
    text-align: center;
    font-size: 48px;
    font-weight: bold;
    color: #ffffff;
    margin-top: 30px;
    margin-bottom: 20px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

/* Optional: add a nice underline effect */
.dashboard-title::after {
    content: "";
    display: block;
    width: 120px;
    height: 4px;
    background-color: #fb0c0c;
    margin: 10px auto 0;
    border-radius: 2px;
}
</style>


    <h2>Product Form</h2>

    <form id="productForm">
        
        <input type="hidden" id="id">
        <input type="text" id="product_name" class="form-control mb-2" placeholder="Product Name" required>
        <input type="number" id="price" class="form-control mb-2" placeholder="Price" required>
        <textarea id="description" class="form-control mb-2" placeholder="Description"></textarea>

<div class="btn-container">
    <button class="btn">Add Product</button>
</div>
<style>
            .btn-container {
    display: flex;
    justify-content: center;
}
</style>

    </form>

    <hr>
    

    <h2>Product List</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTable"></tbody>
    </table>

</div>

<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
}
body {
    background: linear-gradient(
        rgba(0,0,0,0.5),
        rgba(0,0,0,0.5)
    ),
    url('https://th.bing.com/th/id/OIP.KyrPqWI_5a21wisY8-9_uQHaEJ?w=282&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


/* Main */
.main-content {
    flex: 1;
}

.btn:hover {
    background: #535fe8;
}

/* edit delete botton */
table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    border-bottom: 1px solid #5aa2a0;
    text-align: center;
}

table th {
    background: #000000;
}


/* Form group */
.form-group {
    margin-bottom: 15px;
}

/* Labels */
.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 5px;
    color: #000000;
}

/* products form border*/
.form-control {
    width: 100%;
    padding: 12px;
    border: 2px solid #000000;
    border-radius: 8px;
    font-size: 14px;
    transition: 0.3s;
    outline: none;
}

/* description resize box*/
textarea.form-control {
    min-height: 100px;
    resize: none;
}

/* Button upgrade */
.btn {
    width: 50%;
    padding: 12px;
    background: linear-gradient(135deg, #1abc9c, #16a085);
    border: 10px;
    border-radius: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    padding: 10px;
    color: white;
    font-size: 11px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    text-align: center;

}

.btn:hover {
    transform: scale(1.03);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

/* Card title */
.card-title {
    margin-bottom: 15px;
    color: #ffffff;
}
</style>

<script src="script.js"></script>
</body>
</html>
