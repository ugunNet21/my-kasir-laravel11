{{-- <script src="{{ asset('Assets/dist/js/bootstrap.min.js') }}"></script> --}}
<script>
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
</script>
