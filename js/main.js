if (document.querySelector('.list')) {
const list = document.querySelector('.list');
const list1 = document.querySelector('.list1');
const user_info = document.querySelector('.user_info');
const default1 = document.querySelector('.default');
list.addEventListener('click',e=>{
			e.preventDefault();
			list.style.display = 'none';
			list1.style.display = 'block'
			user_info.classList.add('is_active');
			default1.removeAttribute('disabled');
});
if (list1) {
	list1.addEventListener('click',e=>{
			e.preventDefault();
			list1.style.display = 'none'
			list.style.display = 'block'
			user_info.classList.remove('is_active');
			default1.setAttribute("disabled", "");
});
}
}
function back(){
	window.history.back();
}

function Menu(){
	document.querySelector('.menu_wrap').classList.toggle('dn');
	document.querySelector('.menu_wrap').style.width = '100%';
	let menu = document.querySelectorAll('.menu')
	for (menus of menu) {
		menus.classList.toggle('dn');
	}
}
