<!-- 내 정보 관리 -->
<section id="profile-page">
    <div class="size">
        <ul id="profile-left-menu">
            <li><a href="/profile" class="profile-left-click">내 정보 <i class="fas fa-angle-right"></i></a></li>
            <li><a href="">내 페이지 <i class="fas fa-angle-right"></i></a></li>
            <li><a href="">내가 쓴 글 <i class="fas fa-angle-right"></i></a></li>
            <li><a href="">북마크 <i class="fas fa-angle-right"></i></a></li>
        </ul>

        <div id="my-profiles">
            <div class="my-profile-top">내 정보</div>
            
            <div class="my-profile">
                <div class="my-profile-title">
                    <p>사용 중인 프로필</p>
                </div>
                <div class="my-profile-main">
                    <img src="<?= $user->img ?>" alt="img" class="closeup-img">
                    <p><?= $user->nick ?></p>
                    <button class="change-id-img">관리</button>
                </div>
                
            </div>
            
            <div class="my-profile">
                <div class="my-profile-title">
                    <p>개인 정보</p>
                </div>
                
                <div class="my-profile-sub">
                    <div>
                        <span>생일</span>
                        <p><?= dateToString($user->birth) ?></p>
                        <button>변경</button>
                    </div>

                    <div>
                        <span>성별</span>
                        <p><?= sexToString($user->sex) ?></p>
                        <button>변경</button>
                    </div>
                </div>
            </div>

        </div>
            
    </div>
</section>

<!-- js -->
<script>
    $(".closeup-img").on("click", (e)=>{
        let div = document.createElement("div");
        div.id = 'pop-up';
        let temp = `
            <div class="pop-up-bg">
                
            </div>
            <div class="up">
                <img src="" class="up-img">
            </div>
        `;
        div.innerHTML = temp;
        $("body").append(div);
        div.querySelector('.up-img').src = e.target.src;

        $(".pop-up-bg").on("click", (e)=>{
            let p = e.target.parentNode;
            document.querySelector("body").removeChild(p);
        });
    });
    
    // 아이디&사진 변경관리
    $(".change-id-img").on("click", ()=>{
        let div = document.createElement("div");
        div.id = 'pop-up';
        let temp = `
            <div class="pop-up-bg">
                
            </div>
            <form action="/profile/change" method="POST" class="up change-up" enctype="multipart/form-data">
                <h3>프로필 수정</h3>
                <img src="<?= $user->img ?>" alt="img" class="change-img">
                <label for="change-file" class="change-profile-img"><i class="fas fa-camera"></i></label>
                <input type="file" id="change-file" name="file">
                <input type="text" class="change-profile-name" name="nick">
                <button>확인</button>
            </form>
        `;
        div.innerHTML = temp;

        $("body").append(div);
        
        $(".change-profile-name").val('<?= $user->nick ?>');

        $(".pop-up-bg").on("click", (e)=>{
            let p = e.target.parentNode;
            document.querySelector("body").removeChild(p);
        });

        // 이미지 그려주기
        $("#change-file").on("change", (e)=>{
            let file = e.target.files[0];
            if(!file.type.match("image.*")) {
                alert("확장자는 이미지 확장자만 가능합니다.");
                return;
            }

            let reader = new FileReader();
            reader.onload = function(e) {
                $(".change-img").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        });
    })

</script>