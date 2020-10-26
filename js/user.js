		const check_box = document.querySelector('.checkbox');
		const list = document.querySelector('.list');
		const mult = document.querySelector('.mult');
		const lim = document.querySelector('#lim');
		const navigation = document.querySelector('.navigation');
		navigation.addEventListener('click',(e)=>{
			if (document.querySelector('.is_used')) {
				let a = document.querySelector('.is_used');
				a.classList.remove("is_used");
			}
			let used = document.querySelector('.sec_'+e.target.dataset.menu);
			used.classList.add("is_used");
		})
		document.querySelector('.sec2_calc_avto').addEventListener(('click'),(e)=>{
			if(e.target.tagName=="INPUT"){
				console.log('A')
			e.target.onblur = function() {
				e.target.classList.remove('input_active');
			};

			e.target.onfocus = function() {
				e.target.classList.add('input_active');
			};
		}
		});
		document.querySelector('.clear_btn_1').addEventListener('click',(e)=>{
			let users = document.querySelectorAll('.input_users');
		});
		const data_list = document.querySelectorAll('.form_btn');
		for (data of data_list) {
			data.addEventListener('click',(e)=>{
				if (e.target.dataset.list) {
					if (e.target.classList[1]=='back_btn') {
						let plus = parseInt(e.target.dataset.list)-1;
						document.querySelector('.sec_'+plus).classList.add('is_used');
						document.querySelector('.sec_'+e.target.dataset.list).classList.remove("is_used");

					}
					else{
						let plus = parseInt(e.target.dataset.list)+1;
						document.querySelector('.sec_'+plus).classList.add("is_used");
						document.querySelector('.sec_'+e.target.dataset.list).classList.remove("is_used");
					}
				}
			})
		}
		const active_users = document.querySelector('.active_users');
		active_users.addEventListener('click',(e)=>{
			if (e.target.dataset.clear) {
				
				if (e.target.classList[1]=='blue') {
					console.log(e.target.classList[1]);
					let plus = parseInt(e.target.dataset.clear)+1;
					document.querySelector('.sec_calc_'+plus).classList.add('active');
					document.querySelector('.blue'+e.target.dataset.clear).style.display = 'none';
					document.querySelector('.blue'+plus).style.display = 'flex';
					document.querySelector('.clear_'+e.target.dataset.clear).style.justifyContent ='center';
					if (document.querySelector('.red'+e.target.dataset.clear)) {
						document.querySelector('.red'+e.target.dataset.clear).style.display = 'flex';
					}

					if (e.target.dataset.clear==6) {
						
						document.querySelector('.red'+plus).style.display = 'flex';
						document.querySelector('.blue'+plus).style.display = 'none';
					}
				}
				else if (e.target.classList[1]=='red') {
					let plus = parseInt(e.target.dataset.clear)-1;
					document.querySelector('.sec_calc_'+e.target.dataset.clear).classList.remove('active');
					document.querySelector('.calc_avto'+plus).style.width="80%";
					document.querySelector('.blue'+plus).style.display = 'flex';
					document.querySelector('.clear_'+plus).style.display = 'flex';


				}
			}
		})
		// const clear_all = document.querySelector('.clear_all');
		// clear_all.addEventListener('click', (e)=>{
		// 	let calc_select = document.querySelectorAll('.calc_select');
		// 	for (var i = 1; i <= 7; i++) {
		// 		let clear = document.querySelector('.clear_'+i);
		// 		clear.style.justifyContent ='flex-end';
		// 	}
		// 	let blue = document.querySelectorAll('.blue');
		// 	for (blue_0 of blue) {
		// 		blue_0.style.display ='flex';
		// 	}
		// 	for (calc1 of calc_select) {
		// 		calc1.value='';
		// 	}
		// 	let sec2_calc_avto = document.querySelectorAll('.sec2_calc_avto');
		// 	for (sec2 of sec2_calc_avto) {
		// 		sec2.classList.remove('active');
		// 	}
		// 	document.querySelector('.sec_calc_1').classList.add('active');
		// 	for (var i = 1; i <= 7; i++) {
		// 		document.querySelector('.calc_avto'+i).style.width="80%";
		// 		document.querySelector('.clear_'+i).style.display = 'flex';
		// 		document.querySelector('.blue'+i).style.display = 'flex';
		// 		document.querySelector('.red'+i).style.display = 'none';
		// 	}
		// });
