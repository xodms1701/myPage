<?
//데이터 베이스 연결하기
include "db_info.php";

# LIST 설정
# 1. 한 페이지에 보여질 게시물의 수
$page_size=10;

# 2. 페이지 나누기에 표시될 페이지의 수
// $no는 페이지가 시작되는 첫 글의 순번이다.
$page_list_size = 10;
$no = isset($_GET['no']) ? $_GET['no'] : '';
if (!$no || $no <0) $no=0;

// 데이터베이스에서 페이지의 첫번째 글($no)부터
// $page_size 만큼의 글을 가져온다.
$query = "SELECT * FROM board ORDER BY id DESC LIMIT $no, $page_size";
$result = mysqli_query($conn,$query);

// 총 게시물 수 를 구한다.
$result_count=mysqli_query($conn,"SELECT count(*) FROM board");
$result_row=mysqli_fetch_row($result_count);
$total_row = $result_row[0];
//결과의 첫번째 열이 count(*) 의 결과다.
//mysql_fetch_row 쓰면 $result_row[0] 처럼 숫자를 써서 접근을 해야한다.

# 총 페이지 계산
# ceil는 올림이다.
if ($total_row <= 0) $total_row = 0;
$total_page = ceil($total_row / $page_size);//1개면

# 현재 페이지 계산
# no 변수는 0부터 시작해서 +1을 해줌.
$current_page = ceil(($no+1)/$page_size);
?>
<html>
	<head>
		<title>Hielo by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<style type="text/css">
		@media only screen and (max-width: 800px) {

	/* Force table to not be like tables anymore */
	#no-more-tables table,
	#no-more-tables thead,
	#no-more-tables tbody,
	#no-more-tables th,
	#no-more-tables td,
	#no-more-tables tr {
		display: block;
	}

	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr {
		position: absolute;
		top: -9999px;
		left: -9999px;
	}

	#no-more-tables tr { border: 1px solid #ccc; }

	#no-more-tables td {
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee;
		position: relative;
		padding-left: 50%;
		white-space: normal;
		text-align:left;
	}

	#no-more-tables td:before {
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%;
		padding-right: 10px;
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}

	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}
		</style>
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
            <!-- 게시판 타이틀 -->
						<header class="align-center">
						<p>아무말이나 하고 갑시다</p>
						<h2>방명록 겸 게시판</h2>
					</header>
<!-- 게시물 리스트를 보이기 위한 테이블 -->
<table id="list" border=0 cellpadding=2 cellspacing=1
bgcolor=#777777>
<!-- 리스트 타이틀 부분 -->
<tr bgcolor=#999999>
    <th class="numeric" align=center>
        <font color=white>번호</font>
    </th>
    <th align=center>
        <font color=white>제 목</font>
    </th>
    <th align=center>
        <font color=white>글쓴이</font>
    </th>
    <th class="numeric" align=center>
        <font color=white>날 짜</font>
    </th>
    <th class="numeric" align=center>
        <font color=white>조회수</font>
    </th>
</tr>
<!-- 리스트 타이틀 끝 -->
<!-- 리스트 부분 시작 -->
<?
while($row=mysqli_fetch_array($result))
{

?>
<!-- 행 시작 -->
<tr>
    <!-- 번호 -->
    <td data-title="Code" class="numeric" height=20 bgcolor=white align=center>
        <a href="read.php?id=<?=$row['id']?>&no=<?=$no?>">
        <?=$row['id']?></a>
    </td>
    <!-- 번호 끝 -->
    <!-- 제목 -->
    <td data-title="Title" height=20 bgcolor=white>&nbsp;
        <a href="read.php?id=<?=$row['id']?>&no=<?=$no?>">
        <?=strip_tags($row['title'], '<b><i>');?></a>
    </td>
    <!-- 제목 끝 -->
    <!-- 이름 -->
    <td data-title="name" align=center height=20 bgcolor=white>
        <font color=black>
        <a href="mailto:<?=$row['email']?>"><?=$row['name']?></a>
        </font>
    </td>
    <!-- 이름 끝 -->
    <!-- 날짜 -->
    <td data-title="date" class="numeric" align=center height=20 bgcolor=white>
        <font color=black><?=$row['wdate']?></font>
    </td>
    <!-- 날짜 끝 -->
    <!-- 조회수 -->
    <td data-title="Views" class="numeric" align=center height=20 bgcolor=white>
        <font color=black><?=$row['view']?></font>
    </td>
    <!-- 조회수 끝 -->
</tr>
<!-- 행 끝 -->
<?
} // end While
//데이터베이스와의 연결을 끝는다.
mysqli_close($conn);
?>
</table>
<!-- 게시물 리스트를 보이기 위한 테이블 끝-->
<!-- 페이지를 표시하기 위한 테이블 -->
<table border=0>
<tr>
    <td width=600 height=20 align=center rowspan=4>
    <font color=gray>
    &nbsp;
<?
$start_page = floor(($current_page - 1) / $page_list_size) * $page_list_size + 1;
# floor 함수는 소수점 이하는 버림

# 페이지 리스트의 마지막 페이지가 몇 번째 페이지인지 구하는 부분이다.
$end_page = $start_page + $page_list_size - 1;

if ($total_page <$end_page) $end_page = $total_page;

if ($start_page >= $page_list_size) {
    # 이전 페이지 리스트값은 첫 번째 페이지에서 한 페이지 감소하면 된다.
    # $page_size 를 곱해주는 이유는 글번호로 표시하기 위해서이다.

    $prev_list = ($start_page - 2)*$page_size;
    echo "<a href='$PHP_SELF?no=$prev_list'>◀</a> ";
}

# 페이지 리스트를 출력
for ($i=$start_page;$i <= $end_page;$i++) {
    $page= ($i-1) * $page_size;// 페이지값을 no 값으로 변환.
    if ($no!=$page){ //현재 페이지가 아닐 경우만 링크를 표시
        echo "<a href='$PHP_SELF?no=$page'>";
    }

    echo " $i "; //페이지를 표시

    if ($no!=$page){ //현재 페이지가 아닐 경우만 링크를 표시하기 위해서
        echo "</a>";
    }
}

# 다음 페이지 리스트가 필요할때는 총 페이지가 마지막 리스트보다 클 때이다.
# 리스트를 다 뿌리고도 더 뿌려줄 페이지가 남았을때 다음 버튼이 필요할 것이다.
if($total_page >$end_page)
{
    $next_list = $end_page * $page_size;
    echo "<a href=$PHP_SELF?no=$next_list>▶</a><p>";
}
?>
    </font>
    </td>
</tr>
</table>
<a href=../post.html>글쓰기</a>
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
