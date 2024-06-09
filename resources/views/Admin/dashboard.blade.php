{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cashier Dashboard</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        />
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
                height: 100vh;
            }

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
            }

            .sidebar-nav a:hover {
                background-color: #333333;
            }

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
        </style>
    </head>
    <body> --}}
        @extends('Admin.layouts.app')
        @section('title', 'Dashboard')
        @section('content')
        {{-- <div class="container"> --}}
            <!-- sidebar -->
            {{-- <aside class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <h2>Kasir App</h2>
                </div>
                <nav class="sidebar-nav">
                    <ul>
                        <li><a href="#dashboard"> <i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="#sales"><i class="fas fa-shopping-cart"></i> Sales</a></li>
                        <li><a href="#inventory"><i class="fas fa-boxes"></i> Inventory</a></li>
                        <li><a href="#reports"><i class="fas fa-chart-line"></i> Reports</a></li>
                        <li><a href="#settings"><i class="fas fa-cogs"></i> Settings</a></li>
                    </ul>
                </nav>
            </aside> --}}
            <!-- end sidebar -->

            <!-- main content -->
            <main class="main-content">
                <!--header -->
                {{-- <header class="header">
                    <div class="search-bar">
                        <input type="text" placeholder="Search..." />
                    </div>
                    <div class="profile">
                        <img
                            src="https://img.freepik.com/free-vector/isolated-young-handsome-man-different-poses-white-background-illustration_632498-859.jpg"
                            alt="Profile Picture"
                        />
                        <span class="profile-name">John Doe</span>
                    </div>
                    <div class="theme-toggle">
                        <div class="hamburger" id="hamburger">&#9776;</div>
                        <select id="theme-select">
                            <option value="light">Light Mode</option>
                            <option value="dark">Dark Mode</option>
                            <option value="system">System Mode</option>
                        </select>
                    </div>
                </header> --}}

                {{-- <nav class="breadcrumb">
                    <ul>
                        <li><a href="#dashboard">Dashboard</a></li>
                    </ul>
                </nav> --}}

                {{-- <section id="dashboard">
                    <h1>Dashboard</h1>
                    <p>Welcome to the cashier dashboard.</p>
                </section> --}}
            </main>
            <!-- end main content -->
        {{-- </div> --}}
        @endsection

        <!--bottom nav-->
        {{-- <div class="card">
            <nav class="bottom-nav" id="bottom-nav">
                <ul>
                    <li>
                        <a href="#dashboard"
                            ><i class="fas fa-tachometer-alt"></i> Dashboard</a
                        >
                    </li>
                    <li>
                        <a href="#sales"
                            ><i class="fas fa-shopping-cart"></i> Sales</a
                        >
                    </li>
                    <li>
                        <a href="#inventory"
                            ><i class="fas fa-boxes"></i> Inventory</a
                        >
                    </li>
                    <li>
                        <a href="#reports"
                            ><i class="fas fa-chart-line"></i> Reports</a
                        >
                    </li>
                    <li>
                        <a href="#settings"
                            ><i class="fas fa-cogs"></i> Settings</a
                        >
                    </li>
                </ul>
            </nav>
        </div> --}}
        <!-- end bottom nav -->
        {{-- <script>
            document.addEventListener("DOMContentLoaded", () => {
                const themeSelect = document.getElementById("theme-select");
                const hamburger = document.getElementById("hamburger");
                const sidebar = document.getElementById("sidebar");

                // Load saved theme
                const savedTheme = localStorage.getItem("theme") || "system";
                themeSelect.value = savedTheme;
                applyTheme(savedTheme);

                themeSelect.addEventListener("change", () => {
                    const selectedTheme = themeSelect.value;
                    localStorage.setItem("theme", selectedTheme);
                    applyTheme(selectedTheme);
                });

                hamburger.addEventListener("click", () => {
                    sidebar.classList.toggle("active");
                });

                function applyTheme(theme) {
                    if (theme === "dark") {
                        document.documentElement.style.setProperty(
                            "--background-light",
                            "#1e1e1e"
                        );
                        document.documentElement.style.setProperty(
                            "--background-dark",
                            "#f0f0f0"
                        );
                        document.documentElement.style.setProperty(
                            "--text-light",
                            "#ffffff"
                        );
                        document.documentElement.style.setProperty(
                            "--text-dark",
                            "#000000"
                        );
                    } else if (theme === "light") {
                        document.documentElement.style.setProperty(
                            "--background-light",
                            "#f0f0f0"
                        );
                        document.documentElement.style.setProperty(
                            "--background-dark",
                            "#1e1e1e"
                        );
                        document.documentElement.style.setProperty(
                            "--text-light",
                            "#000000"
                        );
                        document.documentElement.style.setProperty(
                            "--text-dark",
                            "#ffffff"
                        );
                    } else {
                        const systemPrefersDark = window.matchMedia(
                            "(prefers-color-scheme: dark)"
                        ).matches;
                        if (systemPrefersDark) {
                            document.documentElement.style.setProperty(
                                "--background-light",
                                "#1e1e1e"
                            );
                            document.documentElement.style.setProperty(
                                "--background-dark",
                                "#f0f0f0"
                            );
                            document.documentElement.style.setProperty(
                                "--text-light",
                                "#ffffff"
                            );
                            document.documentElement.style.setProperty(
                                "--text-dark",
                                "#000000"
                            );
                        } else {
                            document.documentElement.style.setProperty(
                                "--background-light",
                                "#f0f0f0"
                            );
                            document.documentElement.style.setProperty(
                                "--background-dark",
                                "#1e1e1e"
                            );
                            document.documentElement.style.setProperty(
                                "--text-light",
                                "#000000"
                            );
                            document.documentElement.style.setProperty(
                                "--text-dark",
                                "#ffffff"
                            );
                        }
                    }
                }
            });
        </script> --}}
    {{-- </body>
</html> --}}
