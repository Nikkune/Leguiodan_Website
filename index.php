<?php
include 'assets/functions/main_functions.php';
if (isset($_SESSION['userPerm'])) {
	if (!empty($_SESSION['userPerm'])) {
		if ($_SESSION['userPerm'] != "error") {
			$userPerm = $_SESSION['userPerm'];
		} else { ?>
			<script>
				window.location.replace('<?=$baseWebSite?>')
			</script>
			<?php
		}
	} else {
		$userPerm = "deco";
	}
} else {
	$userPerm = "deco";
}

$pages = scandir('pages/');
if (isset($_GET['page']) && !empty(htmlspecialchars($_GET['page']))) {
	$current_page = htmlspecialchars($_GET['page']);
	if (in_array($current_page . '.php', $pages)) {
		$page = $current_page;
	} else {
		$page = "error";
	}
} else {
	$page = "dashboard";
}

if ($page != "login" && !isset($_SESSION['connectedUser'])) {
	header("Location:index.php?page=login");
}

$pages_functions = scandir('assets/functions/');
if (in_array($page . ".functions.php", $pages_functions)) {
	/** @noinspection PhpIncludeInspection */
	include 'assets/functions/' . $page . '.functions.php';
}
?>
<!Doctype HTML>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="assets/css/wbbtheme.css">
		<!-- ===== Javascript ===== -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="assets/scripts/wysibb.min.js"></script>
		<script src="assets/scripts/wysibb_fr.js"></script>
		<?php
		$pages_js = scandir('assets/scripts/');
		if (in_array($page . '.scripts.js', $pages_js)) {
			?>
			<script type="text/javascript" src="assets/scripts/<?= $page . '.scripts.js' ?>"></script>
			<?php
		}
		?>
		<!--suppress HtmlUnknownTarget -->
		<link rel="icon" type="image/png" href="<?= $baseWebSite ?>/uploads/images/base/logo.png">
		<title>Administration <?= $siteName ?></title>
	</head>
	<body>
		<header class="p-3 bg-warning shadow">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
						<!--suppress HtmlUnknownTarget -->
						<img src="<?= $baseWebSite ?>/uploads/images/base/logo.png" class="ratio ratio-1x1" style="width: 40px" alt="">
					</a>

					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<?php
						foreach ($links as ["url" => $url, "name" => $title, "icon" => $icon, "perm" => $min_perm]) {
							if ($userPerm != "deco") {
								if (has_mini_perm($min_perm, $_SESSION['connectedUser'])) {
									?>
									<li>
										<a href="index.php?page=<?= $url ?>" class="nav-link px-2 <?php echo ($page == $url) ? "link-dark" : "link-secondary" ?>"><?= $icon . $title ?></a>
									</li>
									<?php
								}
							} else {
								if ($url == "dashboard") {
									?>
									<li>
										<a href="index.php?page=<?= $url ?>" class="nav-link px-2 <?php echo ($page == $url) ? "link-dark" : "link-secondary" ?>"><?= $icon . $title ?></a>
									</li>
									<?php
								}
							}
						}
						?>
					</ul>
				</div>
			</div>
		</header>
		<div class="container-fluid" style="min-height: calc(100vh - 161px)">
			<?php
			/** @noinspection PhpIncludeInspection */
			include 'pages/' . $page . '.php';
			?>
		</div>
		<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-warning mt-3">
			<div class="col-md-4 d-flex align-items-center">
				<a href="#" class="mx-3 me-2 text-muted text-decoration-none lh-1">
					<!--suppress HtmlUnknownTarget -->
					<img src="<?= $baseWebSite ?>/uploads/images/base/logo.png" class="ratio ratio-1x1" style="width: 40px" alt="">
				</a>
				<span class="text-muted">Copyright © 2021 All rights reserved.</span>
			</div>
		</footer>
	</body>
</html>
