document.addEventListener('DOMContentLoaded', function () {
	var elems = document.querySelectorAll('.sidenav');
	var instances = M.Sidenav.init(elems, {});
});

document.addEventListener('DOMContentLoaded', function () {
	var elems = document.querySelectorAll('.autocomplete');
	var instances = M.Autocomplete.init(elems, {});
});

document.addEventListener('DOMContentLoaded', function () {
	var elems = document.querySelectorAll('.dropdown-trigger');
	var instances = M.Dropdown.init(elems, {});
});
