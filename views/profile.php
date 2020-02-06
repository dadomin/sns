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
                    <img src="<?= $user->img ?>" alt="img">
                    <p><?= $user->nick ?></p>
                    <button>관리</button>
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