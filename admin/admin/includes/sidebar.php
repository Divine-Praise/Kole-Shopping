<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6f42c1;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Kole <sup>str</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Core
</div>

<!-- Nav Item - Order Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orders"
        aria-expanded="true" aria-controls="orders">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Orders</span>
    </a>
    <div id="orders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Create/View Orders:</h6>
            <a class="collapse-item" href="order-create.php">Create Orders</a>
            <a class="collapse-item" href="today-orders.php">View Today Orders</a>
            <a class="collapse-item" href="orders.php">View All Orders</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link" href="billing.php">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Billings</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="message.php">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Enquiries</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Category Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
        aria-expanded="true" aria-controls="category">
        <i class="fas fa-fw fa-cog"></i>
        <span>Categories</span>
    </a>
    <div id="category" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Create/View Categories:</h6>
            <a class="collapse-item" href="categories-create.php">Create Category</a>
            <a class="collapse-item" href="categories.php">View Categories</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products"
        aria-expanded="true" aria-controls="products">
        <i class="fas fa-fw fa-cog"></i>
        <span>Products</span>
    </a>
    <div id="products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Create/view products:</h6>
            <a class="collapse-item" href="products-create.php">Create Product</a>
            <a class="collapse-item" href="products.php">View Products</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Manage Users
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customers"
        aria-expanded="true" aria-controls="customers">
        <i class="fas fa-fw fa-user"></i>
        <span>Customers</span>
    </a>
    <div id="customers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">create/view customers:</h6>
            <a class="collapse-item" href="customers-create.php">Create Customers</a>
            <a class="collapse-item" href="customers.php">View Customers</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->