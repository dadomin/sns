<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="/img/logo.ico">
	<link rel="stylesheet" href="/fontawesome/css/all.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/main.css">
	<script src="/js/jquery-3.3.1.js"></script>
	<script src="/js/script.js"></script>
	<title>LINK U</title>
</head>
<body>

<!-- 
USER-DB
1. 인덱스
2. 아이디
3. 닉네임
4. 비밀번호
5. 생년월일
6. 성별
7. 속해있는 밴드
8. 구독중인 페이지
9. 프로필사진


로그인 전 메인 화면 
1. 로그인
2. 회원가입
3. 사이트소개

로그인 후 메인 화면

헤더
1. 밴드,페이지,게시글 검색
2. 새글피드
3. 찾기
4. 알림
5. 채팅
6. 내정보

새글피드
1. 내밴드 목록
2. 밴드 모든 글

찾기(나중에)

각 밴드별 화면
1. 밴드설정
2. 전체글(기본) -글/#태그/@작성자 검색 -새소식 남기기 -글보기
3. 사진첩 -전체사진 -앨범별 보기(4개사진 대표)
4. 일정관리 -클릭하면 등록 -밑에 일정모두보기
5. 멤버 -멤버검색 -모두보기 -초대하기


밴드 설정
1. 밴드종류(비공개, 밴드명 공개, 공개)
2. 대표사진
3. 밴드이름
4. 방장
5. 회원
6. 사진 관리
7. 밴드 안 프로필(이름/사진/상메)

페이지(나중에)

 -->

<?php if(isset($_SESSION['user'])) : ?>
	<h3>헤더</h3>
	<form action="/logout" method="POST">
		<button>logout</button>
	</form>
<?php else : ?>
	<header>
		<div class="size">
			<a href="/">
				<img src="/img/logo.png" alt="logo">
				LINK U
			</a>

			<div class="right-menu">
				<ul id="main-menu">
					<li class="home">HOME<span></span></li>
					<li class="about">ABOUT US<span></span></li>
					<li class="services">SERVICES<span></span></li>
					<li class="pages">PAGES<span></span></li>
					<li class="register">REGISTER<span></span></li>
				</ul>
				<button class="login">LOGIN</button>
			</div>
		</div>
	</header>
<?php endif; ?>