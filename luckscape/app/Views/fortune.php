<?php include(APPPATH . 'Views/layout/header.php'); ?>
    <div id="fortuneResult">
        <section class="mt-6 mb-8 text-center">
            <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
                <h2 class="text-xl font-bold text-primary mb-2">오늘의 운세</h2>
                <p class="text-sm text-gray-700">
                    <?= $ilju ?? '일주 정보 없음' ?> 일주의 🗓️ <?= $date ?? '선택된 날짜 없음' ?> 운세
                </p>
            </div>
        </section>
        <section class="mb-8 text-center">
            <div class="bg-white/90 backdrop-blur-md rounded-lg p-5 shadow-lg">
                <h3 class="text-lg font-medium text-primary mb-3">
                    <?= $fortune ?? '운세 데이터 없음' ?>
                </h3>
                <p class="text-sm text-gray-700 mb-4">
                    💡 <?= $tip ?? '팁 데이터 없음' ?>
                </p>
            </div>
        </section>
    </div>
    <section class="mt-6 mb-8 text-center">
        <div class="bg-white/80 backdrop-blur-md rounded-lg p-5 shadow-lg">
            <h3 class="text-lg font-medium text-primary mb-3" id="shareTitle">
            </h3>
            <p class="text-sm text-gray-700 mb-4" id="shareContents">
            </p>
            <div class="flex justify-between items-center max-width">
                <button class="w-full bg-primary text-white py-3 px-4 mr-2 !rounded-button font-medium hover:bg-primary/90 transition duration-300 cursor-pointer flex items-center justify-center"
                        id="downloadBtn"
                >
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-save-line text-white"></i>
                    </div>
                    저장하기
                </button>
                <button class="w-full bg-primary text-white py-3 px-4 ml-2 !rounded-button font-medium hover:bg-primary/90 transition duration-300 cursor-pointer flex items-center justify-center"
                        id="shareBtn"
                >
                    <div class="w-5 h-5 flex items-center justify-center mr-2">
                        <i class="ri-stackshare-line text-white"></i>
                    </div>
                    공유하기
                </button>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const { title, contents } = getRandomShareMessage();
            document.querySelector('#shareTitle').innerText = title;
            document.querySelector('#shareContents').innerText = contents;
        });

        document.getElementById('downloadBtn').addEventListener('click', function() {
            const target = document.getElementById('fortuneResult');

            html2canvas(target).then(function(canvas) {
                const link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = 'fortune.png';
                link.click();
            });
        });

        document.getElementById('shareBtn').addEventListener('click', function () {
            if (navigator.share && typeof navigator.share === 'function') {
                const canvas = document.getElementById('fortuneResult');
                html2canvas(canvas).then(cvs => {
                    cvs.toBlob(blob => {
                        const file = new File([blob], 'fortune.png', { type: 'image/png' });

                        if (navigator.canShare && navigator.canShare({ files: [file] })) {
                            navigator.share({
                                files: [file],
                                title: 'Luckscape 운세',
                                text: '<?= getenv('APP_URL') ?>'
                            })
                            .then(() => console.log('공유 완료'))
                            .catch(error => console.error('공유 실패', error));
                        } else {
                            alert('이미지 공유를 지원하지 않는 기기입니다.\n저장하기 기능을 이용해주세요.');
                        }
                    });
                });
            } else {
                alert('공유하기 기능을 지원하지 않는 기기입니다.\n저장하기 기능을 이용해주세요.');
            }
        });

        function getRandomShareMessage() {
            const titleIndex = Math.floor(Math.random() * SHARE_TITLES.length);
            const contentsIndex = Math.floor(Math.random() * SHARE_CONTENTS.length);
            return {
                title: SHARE_TITLES[titleIndex],
                contents: SHARE_CONTENTS[contentsIndex]
            };
        }
    </script>
<?php include(APPPATH . 'Views/layout/footer.php'); ?>