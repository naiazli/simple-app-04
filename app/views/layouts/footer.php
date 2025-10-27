        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2025 Task System.</strong> All rights reserved.
        </footer>
    </div>

    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js"></script>

    <script>
    function toggleMode() {
        const html = document.documentElement;
        const isDark = html.classList.contains('dark-mode');
        if (isDark) {
            html.classList.remove('dark-mode');
            document.cookie = 'dark_mode=false; path=/; max-age=31536000';
            document.querySelector('.toggle-icon').className = 'fas fa-moon';
        } else {
            html.classList.add('dark-mode');
            document.cookie = 'dark_mode=true; path=/; max-age=31536000';
            document.querySelector('.toggle-icon').className = 'fas fa-sun';
        }
    }
    </script>
</body>
</html>
