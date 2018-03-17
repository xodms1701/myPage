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
            <?
    //데이터 베이스 연결하기
    include "db_info.php";

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $no = isset($_GET['no']) ? $_GET['no'] : '';
    // 글 정보 가져오기
    $result=mysqli_query($conn, "SELECT * FROM board WHERE id=$id");
    $row=mysqli_fetch_array($result);
?>
<table class="tbl04" border=0 cellpadding=2 cellspacing=1
bgcolor=#777777>
<colgroup>
	<col style="width: 25%">
	<col style="width: 25%">
	<col style="width: 25%">
	<col style="width: 25%">
	<col style="width: 25%">
</colgroup>
<tr>
	<th scope="row">제목</th>
    <td height=20 colspan=3 bgcolor="white">
        <?=$row['title']?>
    </td>
</tr>
<tr>
    <th scope="row">글쓴이</th>
    <td width=240 bgcolor=white><?=$row['name']?></td>
    <th scope="row">이메일</th>
    <td width=240 bgcolor=white><?=$row['email']?></td>
</tr>
<tr>
    <th scope="row">
    날&nbsp;&nbsp;&nbsp;짜</th><td width=240
    bgcolor=white><?=$row['wdate']?></td>
    <th scope="row">조회수</th>
    <td width=240 bgcolor=white><?=$row['view']?></td>
</tr>
<tr>
    <td bgcolor=white colspan=4>
    <font color=black>
    <pre><?=$row['content']?></pre>
    </font>
    </td>
</tr>
<!-- 기타 버튼 들 -->
<tr>
    <td colspan=4 bgcolor=#999999>
    <table width=100%>
        <tr>
            <td width=200 align=left height=20>
                <a href=list.php?no=<?=$no?>><font color=white>
                [목록보기]</font></a>
                <a href=../post.html><font color=white>
                [글쓰기]</font></a>
                <a href=edit.php?id=<?=$id?>><font color=white>
                [수정]</font></a>
                <a href=predel.php?id=<?=$id?>>
                <font color=white>[삭제]</font></a>
            </td>
            <!-- 기타 버튼 끝 -->
            <!-- 이전 다음 표시 -->
            <td align=right>
<?
    // 현재 글보다 id 값이 큰 글 중 가장 작은 것을 가져온다. 삭제됬을때를 생각해서 이렇게 구현함
    // 즉 바로 이전 글 ORDER BY id ASC가 함축됨 즉 오름차순으로 정렬되있음
    $query=mysqli_query($conn, "SELECT id FROM board WHERE id >$id LIMIT 1");
    $prev_id=mysqli_fetch_array($query);

    if ($prev_id['id']) // 이전 글이 있을 경우
    {
        echo "<a href=read.php?id=$prev_id[id]>
        <font color=white>[이전]</font></a>";
    }
    else
    {
        echo "[이전]";
    }

    //내림차순으로 정렬하고 작은 것 한개 가져옴
    $query=mysqli_query($conn, "SELECT id FROM board WHERE id <$id ORDER BY id DESC LIMIT 1");
    $next_id=mysqli_fetch_array($query);

    if ($next_id['id'])
    {
        echo "<a href=read.php?id=$next_id[id]>
        <font color=white>[다음]</font></a>";
    }
    else
    {
        echo "[다음]";
    }
?>
            </td>
        </tr>
    </table>
    </b></font>
    </td>
</tr>
</table>
</center>
</body>
</html>

<?
    // 조회수 업데이트
    $result=mysqli_query($conn, "UPDATE board SET view=view+1 WHERE id=$id");

    mysqli_close($conn);
?>
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
