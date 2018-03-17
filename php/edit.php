<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Hielo by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="../index.html">Home <span> by Bohemian1991</span></a></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
		<nav id="menu">
			<ul class="links">
				<li><a href="../index.html">Home</a></li>
				<li><a href="../sign.html">Sign in</a></li>
				<li><a href="list.php">Post</a></li>
				<li><a href="../generic.html">Developer</a></li>
			</ul>
		</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>레드벳벳 덕질하기...</p>
						<h2>Post</h2>
					</header>
				</div>
			</section>

		<!-- Two -->
		<section id="two" class="wrapper style2">
			<div class="inner">
				<div class="box">
					<div class="content">
            <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form action=update.php?id=<?=$_GET['id']?> method=post>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 align=center bgcolor=#999999>
            <font color=white><B>글 수 정 하 기</B></font>
        </td>
    </tr>
<?
    //데이터 베이스 연결하기
    include "db_info.php";
		$id = isset($_GET['id']) ? $_GET['id'] : '';
    $no = isset($_GET['no']) ? $_GET['no'] : '';

    // 먼저 쓴 글의 정보를 가져온다.
    $result=mysqli_query($conn, "SELECT * FROM board WHERE id=$id");
    $row=mysqli_fetch_array($result);
?>
<!-- 입력 부분 -->
    <tr>
        <td bgcolor=white>&nbsp;
        <table>
            <tr>
                <td width=60 align=left >이름</td>
                <td align=left >
                    <INPUT type=text name=name size=20 value="<?=$row['name']?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >이메일</td>
                <td align=left >
                    <INPUT type=text name=email size=20 value="<?=$row['email']?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >비밀번호</td>
                <td align=left >
                    <INPUT type=password name=pass size=8>
                    (비밀번호가 맞아야 수정가능)
                </td>
            </tr>
            <tr>
                <td width=60 align=left >제 목</td>
                <td align=left >
                    <INPUT type=text name=title size=60
                    value="<?=$row['title']?>">
                </td>
            </tr>
            <tr>
                <td width=60 align=left >내용</td>
                <td align=left >
                    <TEXTAREA name=content cols=65 rows=15><?=$row['content']?></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td colspan=10 align=center>
                    <INPUT type=submit value="글 저장하기">
                    &nbsp;&nbsp;
                    <INPUT type=reset value="다시 쓰기">
                    &nbsp;&nbsp;
                    <INPUT type=button value="되돌아가기"
                    onclick="history.back(-1)">
                </td>
            </tr>
            </TABLE>
        </td>
    </tr>
<!-- 입력 부분 끝 -->
</table>
</form>
				</div>
			</div>
		</section>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>
