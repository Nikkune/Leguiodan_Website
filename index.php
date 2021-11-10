<?php
include 'assets/functions/main_functions.php';

$pages = scandir('pages/');
if (isset($_GET['page']) && !empty(htmlspecialchars($_GET['page']))){
	$current_page = htmlspecialchars($_GET['page']);
	if (in_array($current_page.'.php',$pages)){
		$page = $current_page;
	}else{
		$page = "error";
	}
}else{
	$page = "home";
}

$pages_functions = scandir('assets/functions/');
if(in_array($page . ".functions.php",$pages_functions)){
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
		<link rel="icon" type="image/png" href="uploads/images/base/logo.png">
		<title>Leguiodan</title>
	</head>
	<body>
		<header class="p-3 bg-dark shadow">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
						<img src="uploads/images/base/logo.png" class="ratio ratio-1x1" style="width: 40px" alt="">
					</a>

					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<?php
						foreach ($links as ["url" => $url, "name" => $title, "icon" => $icon]) {
							?>
							<li>
								<a href="index.php?page=<?= $url ?>" class="nav-link px-2 <?php echo($page==$url)?"link-light" : "link-secondary" ?>"><?= $icon . $title ?></a>
							</li>
							<?php
						}
						?>
					</ul>

					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" data-dashlane-rid="3f6e9c797e8cfae8" data-form-type="">
						<input type="search" class="form-control" placeholder="Search..." aria-label="Search" data-dashlane-rid="9fb70ce8e7ae4abc" data-form-type="">
					</form>

					<div class="dropdown text-end">
						<a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
						</a>
						<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
							<li><a class="dropdown-item" href="#">New project...</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Sign out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<div class="container-fluid" style="min-height: calc(100vh - 161px)">
			<?php
			/** @noinspection PhpIncludeInspection */
			include 'pages/'.$page.'.php';
			?>
		</div>
		<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-dark mt-3">
			<div class="col-md-4 d-flex align-items-center">
				<a href="#" class="mx-3 me-2 text-muted text-decoration-none lh-1">
					<img src="uploads/images/base/logo.png" class="ratio ratio-1x1" style="width: 40px" alt="">
				</a>
				<span class="text-muted">Copyright © 2021 All rights reserved.</span>
			</div>
		</footer>
		<!-- ===== Javascript ===== -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php
		$pages_js = scandir('assets/scripts/');
		if (in_array($page.'.scripts.js',$pages_js)){
			?>
			<script type="text/javascript" src="assets/scripts/<?=$page.'.scripts.js'?>"></script>
		<?php
		}
		?>
	</body>
</html>
