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
            <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. 이때 post 방식을 사용하는 것을 -->
            <form action=del.php?id=<?=isset($_GET['id']) ? $_GET['id'] : ''?> method=post>
              <table width=300 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
                <tr>
                  <td height=20 align=center bgcolor=#999999>
                    <font color=white><B>비 밀 번 호 확 인</B></font>
                  </td>
                </tr>
                <tr>
                  <td align=center >
                    <font color=white><B>비밀번호 : </b>
                    <INPUT type=password name=pass size=8>
                    <INPUT type=submit value="확 인">
                    <INPUT type=button value="취 소" onclick="history.back(-1)">
                  </td>
                </tr>
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
