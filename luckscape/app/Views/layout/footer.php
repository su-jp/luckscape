</main>
<!-- Footer -->
<footer
        class="fixed w-full bottom-0 bg-gray-800/90 backdrop-blur-md text-white py-4 px-4"
>
    <div class="flex justify-between items-center text-xs px-4 max-width">
        <a href="/terms" data-readdy="true" class="hover:text-gray-300">이용약관</a>
        <span class="mx-1 text-gray-500">|</span>
        <a href="/privacy-policy" class="hover:text-gray-300">개인정보처리방침</a>
        <span class="mx-1 text-gray-500">|</span>
        <a href="/contact" class="hover:text-gray-300">문의하기</a>
    </div>
    <div class="text-center mt-2 text-xs text-gray-400">
        © 2025 LuckScape. All rights reserved.
    </div>
</footer>
<script src="/js/data.js"></script>
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: { primary: "#5D3FD3", secondary: "#F2D16B" },
                borderRadius: {
                    none: "0px",
                    sm: "4px",
                    DEFAULT: "8px",
                    md: "12px",
                    lg: "16px",
                    xl: "20px",
                    "2xl": "24px",
                    "3xl": "32px",
                    full: "9999px",
                    button: "8px",
                },
            },
        },
    };
</script>
</body>
</html>
