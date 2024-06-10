<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
{{-- <link rel="stylesheet" href="{{ asset('Assets/dist/css/bootstrap.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('Assets/font/css/all.css') }}"> --}}
<style>
    :root {
        --background-light: #f0f0f0;
        --background-dark: #1e1e1e;
        --text-light: #000000;
        --text-dark: #ffffff;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        transition: background-color 0.3s, color 0.3s;
    }

    .container {
        display: flex;
        height: 120vh;
    }

    /* sidebar */
    .sidebar {
        width: 250px;
        background-color: var(--background-dark);
        color: var(--text-dark);
        transition: background-color 0.3s, color 0.3s, transform 0.3s;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 1000;
        overflow-y: auto;
    }

    .sidebar-header {
        padding: 1rem;
        text-align: center;
    }

    .sidebar-nav ul {
        list-style: none;
        padding: 0;
    }

    .sidebar-nav li {
        padding: 1rem;
    }

    .sidebar-nav a {
        color: var(--text-dark);
        text-decoration: none;
        display: block;
        padding: 1rem;
        transition: background-color 0.3s;
    }

    .sidebar-nav a:hover,
    .sidebar-nav a.active {
        background-color: #333333;
    }


    /* .sidebar-nav ul.collapse {
        display: none;
        padding-left: 1rem;
    } */
    /* main content */
    .main-content {
        flex-grow: 1;
        margin-left: 250px;
        background-color: var(--background-light);
        color: var(--text-light);
        transition: background-color 0.3s, color 0.3s;
        padding: 1rem;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background-color: var(--background-light);
        border-bottom: 1px solid #cccccc;
        transition: background-color 0.3s;
    }

    .hamburger {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }

    .search-bar input {
        padding: 0.5rem;
        width: 300px;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 1rem;
    }

    .theme-toggle {
        display: flex;
        align-items: center;
    }

    .breadcrumb ul {
        list-style: none;
        padding: 0;
        margin: 1rem 0;
        display: flex;
        gap: 5px;
    }

    .breadcrumb li {
        display: inline;
    }

    .breadcrumb a {
        text-decoration: none;
        color: var(--text-light);
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    /* bottom navigation bar */
    .bottom-nav {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: var(--background-dark);
        color: var(--text-dark);
        border-top: 1px solid #cccccc;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .bottom-nav ul {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        justify-content: space-around;
    }

    .bottom-nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .bottom-nav a {
        color: var(--text-dark);
        text-decoration: none;
        padding: 1rem;
        display: block;
        text-align: center;
    }

    .bottom-nav a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .hamburger {
            display: block;
        }

        .main-content {
            margin-left: 0;
        }

        .bottom-nav {
            display: block;
        }

        .search-bar input {
            width: 150px;
        }
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
    }

    .bottom-nav li {
        flex: 1;
        text-align: center;
    }

    .bottom-nav a:hover {
        background-color: #f0f0f0;
    }

    .bottom-nav i {
        display: block;
        font-size: 24px;
        margin-bottom: 5px;
    }

    /* end bottom navigation */

    /* pages invoices */
    body {
        background-color: #f8f9fa;
    }

    h1 {
        margin: 20px 0;
    }

    .card {
        margin-top: 20px;
        border: none;
        border-radius: 0.75rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }

    .btn-sm {
        margin: 2px;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .bottom-nav .nav-link {
        color: #000;
    }

    .bottom-nav .nav-link:hover {
        color: #007bff;
    }

    .bottom-nav .nav-item {
        flex: 1;
        text-align: center;
    }

    /* end pages invoices */
</style>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
