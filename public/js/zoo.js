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
	const select = document.getElementsByClassName("select");
	const result = document.getElementsByClassName("result");

	zooId.selectedIndex = "0";

	if (prefValue == '0') {
		for (let i = 0; i < select.length; i++) {
			select[i].classList.remove("hide");
		}
	} else {
		for (let i = 0; i < select.length; i++) {
			if (select[i].classList.contains(prefId)) {
				select[i].classList.remove("hide");
			} else {
				select[i].classList.add("hide");
			}
		}
	}

	if (prefValue == '0') {
		for (let i = 0; i < result.length; i++) {
			result[i].classList.remove("hide");
		}
	} else {
		for (let i = 0; i < result.length; i++) {
			if (result[i].classList.contains(prefValue)) {
				result[i].classList.remove("hide");
			} else {
				result[i].classList.add("hide");
			}
		}
	}
}

const selectZoo = (obj) => {
	const prefValue = document.getElementById("selectPref").value;
	const zooValue = obj.options[obj.selectedIndex].value;
	const result = document.getElementsByClassName("result");
	if (zooValue == '0') {
		for (let i = 0; i < result.length; i++) {
			if (result[i].classList.contains(prefValue)) {
				result[i].classList.remove("hide");
			}
		}
	} else {
		for (let i = 0; i < result.length; i++) {
			if (result[i].id == zooValue) {
				result[i].classList.remove("hide");
			} else {
				result[i].classList.add("hide");
			}
		}
	}
}
