document.addEventListener('DOMContentLoaded', function () {
	const collapsible = document.querySelector('.collapsible.expandable');
	M.Collapsible.init(collapsible, {
		accordion: false
	});

	const materialboxed = document.querySelectorAll('.materialboxed');
	M.Materialbox.init(materialboxed, {});

	const select = document.querySelectorAll('select');
	M.FormSelect.init(select, {});

	const modal = document.querySelectorAll('.modal');
	M.Modal.init(modal, {});
});



const selectPref = (obj) => {
	const prefValue = obj.options[obj.selectedIndex].value;
	const prefId = obj.options[obj.selectedIndex].id;
	const zooId = document.getElementById("selectZoo");
	const select = document.querySelectorAll(".select");
	const result = document.querySelectorAll(".result");

	zooId.selectedIndex = "0";

	if (prefValue == '0') {
		select.forEach(function (element) {
			element.classList.remove("hide");
		})
	} else {
		select.forEach(function (element) {
			if (element.classList.contains(prefId)) {
				element.classList.remove("hide");
			} else {
				element.classList.add("hide");
			}
		})
	}

	if (prefValue == '0') {
		result.forEach(function (element) {
			element.classList.remove("hide");
		})
	} else {
		result.forEach(function (element) {
			if (element.classList.contains(prefValue)) {
				element.classList.remove("hide");
			} else {
				element.classList.add("hide");
			}
		})
	}
}

const selectZoo = (obj) => {
	const prefValue = document.getElementById("selectPref").value;
	const zooValue = obj.options[obj.selectedIndex].value;
	const result = document.querySelectorAll(".result");
	if (zooValue == '0') {
		result.forEach(function (element) {
			if (element.classList.contains(prefValue)) {
				element.classList.remove("hide");
			}
		})
	} else {
		result.forEach(function (element) {
			if (element.id == zooValue) {
				element.classList.remove("hide");
			} else {
				element.classList.add("hide");
			}
		})
	}
}
