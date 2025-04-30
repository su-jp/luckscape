<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <!-- Intro Section -->
    <section class="mt-6 mb-8 text-center">
        <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h2 class="text-xl font-bold text-primary mb-2">일주 기반 운세</h2>
            <p class="text-sm text-gray-700">
                당신의 일주를 선택하고 오늘의 운세를 확인하세요
            </p>
        </div>
    </section>
    <!-- Fortune Selection Form -->
    <section class="mb-8">
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <form id="fortuneForm" action="/fortune" method="post" class="space-y-6">
                <!-- 일주 선택 -->
                <div class="space-y-2">
                    <label for="ilju" class="block text-sm font-medium text-gray-700"
                    >나의 일주 선택</label
                    >
                    <div class="relative">
                        <select
                                id="ilju"
                                name="ilju"
                                class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary rounded bg-gray-50 appearance-none"
                        >
                            <option value="" disabled selected>일주를 선택하세요</option>
                        </select>
                        <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                        >
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-arrow-down-s-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 날짜 선택 -->
                <div class="space-y-2">
                    <label for="date" class="block text-sm font-medium text-gray-700"
                    >운세를 볼 날짜</label
                    >
                    <div class="relative">
                        <input
                                type="date"
                                id="date"
                                name="date"
                                class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary rounded bg-gray-50 date-picker"
                        />
                        <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                        >
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-calendar-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 제출 버튼 -->
                <button
                        type="submit"
                        class="w-full bg-primary text-white py-3 px-4 !rounded-button font-medium hover:bg-primary/90 transition duration-300 cursor-pointer flex items-center justify-center"
                        id="checkFortune"
                >
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-magic-line text-white"></i>
                    </div>
                    운세 보기
                </button>
            </form>
        </div>
    </section>
    <!-- Information Section -->
    <section class="mb-8">
        <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h3 class="text-lg font-medium text-primary mb-3">
                일주란 무엇인가요?
            </h3>
            <p class="text-sm text-gray-700 mb-4">
                일주(日柱)는 사주명리학에서 중요한 요소로, 태어난 날의 천간(天干)과
                지지(地支)의 조합을 의미합니다. 일주는 그 사람의 성격, 기질, 운명의
                흐름을 나타내는 중요한 지표입니다.
            </p>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iljuSelect = document.getElementById("ilju");

            // 60개 일주 옵션 추가
            ILJU_LIST.forEach(ilju => {
                let option = document.createElement("option");
                option.value = ilju.value;
                option.textContent = ilju.label;
                iljuSelect.appendChild(option);
            });

            // Select 검색 추가
            new TomSelect('#ilju', {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });

            // 오늘 날짜를 기본값으로 설정
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, "0");
            const day = String(today.getDate()).padStart(2, "0");
            document.getElementById("date").value = `${year}-${month}-${day}`;

            // 운세 조회 버튼 클릭 시, 운세 가져오기
            document.getElementById("fortuneForm").addEventListener("submit", function(e) {
                let date = document.getElementById("date").value;
                let ilju = document.getElementById("ilju").value;

                if (!date || !ilju) {
                    alert("운세를 확인할 날짜와 일주를 선택해주세요.");
                    e.preventDefault();
                }
            });
        });
    </script>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>