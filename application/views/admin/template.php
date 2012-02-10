<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
	<link rel="stylesheet" href="/css/bootstrap.min.responsive.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
    <link rel="stylesheet" href="/lib/codemirror.css">
    <script src="/lib/codemirror.js"></script>
    <script src="/mode/xml/xml.js"></script>
    <script src="/mode/markdown/markdown.js"></script>
	<style type="text/css" media="screen">
		.header h1{
			padding:15px 0;
		}
      .CodeMirror {border: 1px solid black;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12 header">
				<h1 id="">Admin Control Panel</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav">
						<li><?= anchor('admin', 'Overview'); ?></li>
						<li><?= anchor('admin/addpage', 'Add Page'); ?></li>
						<li><?= anchor('admin/addtemplate', 'Add Template'); ?></li>
						<li><a href="#">Add Media</a></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	{body}
    <script>
      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        mode: 'markdown',
        lineNumbers: true,
        matchBrackets: true,
        theme: "default"
      });
    </script>
</body>
</html>