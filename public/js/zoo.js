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

	const collapsible2 = document.querySelectorAll('.collapsible');
	const instances = M.Collapsible.init(collapsible2, {});
});

// ----- sp search -----
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

// ----- pc search -----
const searchPrefForm = () => {
	sessionStorage.clear();
	const prefs = document.querySelectorAll('.pref');
	const results = document.querySelectorAll('.result');
	const zoonames = document.querySelectorAll('.zooname');
	let counter = 0;


	prefs.forEach(pref => {
		pref.addEventListener('change', () => {
			counterZooname = 0;
			if (pref.checked === true) {
				sessionStorage.setItem(pref.value, pref.checked);
				counter++;
			} else {
				sessionStorage.removeItem(pref.value);
				counter--;
			}

			zoonames.forEach(zooname => {
				zooname.checked = false;
				sessionStorage.removeItem(zooname.dataset.zooname);
			})
			console.log(counterZooname);
			results.forEach(result => {
				if (counter === 0) {
					result.classList.remove("hide");
				} else {
					if (sessionStorage.getItem(result.dataset.pref)) {
						result.classList.remove("hide");
					} else {
						result.classList.add("hide");
					}
				}
			})

		})
	})
}
searchPrefForm();

const searchZoonameForm = () => {
	const prefs = document.querySelectorAll('.pref');
	const results = document.querySelectorAll('.result');
	const zoonames = document.querySelectorAll('.zooname');
	let counter = 0;

	zoonames.forEach(zooname => {
		zooname.addEventListener('change', () => {

			prefs.forEach(pref => {
				pref.checked = false;
				sessionStorage.removeItem(pref.dataset.pref);
			})

			if (zooname.checked === true) {
				sessionStorage.setItem(zooname.dataset.zooname, zooname.dataset.pref);
				counter++;
			} else {
				sessionStorage.removeItem(zooname.dataset.zooname);
				counter--;
			}

			results.forEach(result => {
				if (counter === 0) {
					result.classList.remove("hide");
				} else {
					if (sessionStorage.getItem(result.dataset.zooname)) {
						result.classList.remove("hide");
					} else {
						result.classList.add("hide");
					}
				}
			})

		})
	})
}
searchZoonameForm();
