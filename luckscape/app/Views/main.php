<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <div class="card p-3 shadow-sm">
        <div>
            <h5 for="date" class="form-label">운세를 확인할 날짜 선택</h5>
            <input type="date" id="date" name="date" class="form-control">
        </div>
        <div>
            <h5 class="form-label">운세 확인 방식 선택</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fortuneType" id="selectIlju" value="ilju" checked>
                <label class="form-check-label" for="selectIlju">일주 선택</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fortuneType" id="selectDob" value="dob">
                <label class="form-check-label" for="selectDob">생년월일 입력</label>
            </div>
        </div>
    </div>

    <!-- 일주 선택 (기본 표시) -->
    <div class="card p-3 shadow-sm mt-3" id="iljuContainer">
        <label for="ilju" class="form-label">일주</label>
        <select id="ilju" name="ilju" class="form-control">
            <option value="">일주를 선택하세요</option>
        </select>
    </div>

    <!-- 생년월일 선택 (기본 숨김) -->
    <div class="card p-3 shadow-sm mt-3 d-none" id="dobContainer">
        <label for="dob" class="form-label">생년월일</label>
        <input type="date" id="dob" name="dob" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-3 w-100" id="checkFortune">운세 보기</button>

    <div id="result" class="mt-4"></div>

    <script src="/js/data.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iljuSelect = document.getElementById("ilju");
            const fortuneTypeRadios = document.querySelectorAll('input[name="fortuneType"]');
            const iljuContainer = document.getElementById("iljuContainer");
            const dobContainer = document.getElementById("dobContainer");

            // 60개 일주 옵션 추가
            ILJU_LIST.forEach(ilju => {
                let option = document.createElement("option");
                option.value = ilju.value;
                option.textContent = ilju.label;
                iljuSelect.appendChild(option);
            });

            // 운세 확인 방식 선택 시, 화면 전환
            fortuneTypeRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    if (this.value === "ilju") {
                        iljuContainer.classList.remove("d-none");
                        dobContainer.classList.add("d-none");
                    } else {
                        iljuContainer.classList.add("d-none");
                        dobContainer.classList.remove("d-none");
                    }
                });
            });

            // TODO: 운세 조회 버튼 클릭 시, 운세 가져오기
            document.getElementById("checkFortune").addEventListener("click", function() {
                console.log("운세 조회");
            });
        });
    </script>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>