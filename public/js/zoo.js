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
	const selects = document.querySelectorAll(".select");
	const results = document.querySelectorAll(".result");
	zooId.selectedIndex = "0";

	selects.forEach(select => {
		if (prefValue == '0') {
			select.classList.remove("hide");
		} else {
			if (select.classList.contains(prefId)) {
				select.classList.remove("hide");
			} else {
				select.classList.add("hide");
			}
		}
	});

	results.forEach(result => {
		if (prefValue == '0') {
			result.classList.remove("hide");
		} else {
			if (result.classList.contains(prefValue)) {
				result.classList.remove("hide");
			} else {
				result.classList.add("hide");
			}
		}
	});
}

const selectZoo = (obj) => {
	const prefValue = document.getElementById("selectPref").value;
	const zooValue = obj.options[obj.selectedIndex].value;
	const results = document.querySelectorAll(".result");

	results.forEach(result => {
		if (zooValue == '0') {
			if (result.classList.contains(prefValue)) {
				result.classList.remove("hide");
			}
		} else {
			if (result.id == zooValue) {
				result.classList.remove("hide");
			} else {
				result.classList.add("hide");
			}
		}
	});
}
