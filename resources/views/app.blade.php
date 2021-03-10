<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title')</title>

		<style>
		a{
			font-size:15px;
		}</style>
	</head>
	<body>

	<h2>@yield('header')</h2>
		<a href="employee">Employee</a>
		<a href="company">Company</a>
		<a href="department">Department</a>
		<a href="section">Section</a>
	<hr>
		@yield('content')
	</body>
</html>