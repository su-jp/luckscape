    </div> <!-- .container 끝 -->
    <footer class="text-muted text-center py-3">
        <p>© 2025 Luckscape - 운세 사이트</p>
        <p>
            <a href="/contact">Contact Us</a> |
            <a href="/privacy-policy">개인정보 처리방침</a> |
            <a href="/terms">이용약관</a>
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const alertBox = document.querySelector('.fade-message');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = 'opacity 1s';
                    alertBox.style.opacity = '0';

                    setTimeout(() => {
                        alertBox.remove();
                    }, 1000);
                }, 3000);
            }
        })
    </script>
</body>
</html>
